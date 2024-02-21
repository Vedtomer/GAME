<?php


namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\Result;
use App\Models\Transaction;
use App\Models\TicketPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\Barcode;
use function Ramsey\Uuid\v1;

class AgentController extends Controller
{
    public function ViewBarcode($barcod_id)
    {
        Barcode::with('ticketPurchases')->where('id', $barcod_id)->first();
    }

    public function login(Request $request)
    {
        if (Auth::guard('agent')->check()) {
            return redirect()->route('dashboard');
        }

        if ($request->isMethod('get')) {
            return view('login');
        }
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('agent')->attempt($credentials)) {
                return redirect()->intended(route('dashboard'));
            }

            return redirect()->route('login')
                ->with('error', 'Invalid login credentials');
        }
        return redirect()->route('login')->with('error', 'Invalid login credentials');
    }
    public function logout()
    {
        Auth::guard('agent')->logout();
        return redirect()->route('login');
    }

    public function dashboard($number = null)
    {
        if (!$number) {
            $number = 6000;
        }
        $agent = Auth::guard('agent')->user();

        $currentTime = now()->format('H:i');
        $data = Result::whereDate('created_at', now()->toDateString())
            ->where('timesloat', '<=', $currentTime)
            ->orderBy('timesloat', 'desc')
            ->get();
        // return     $data;
        return view('agent.dashboard', compact('agent', 'number', 'data'));
    }

    public function dashview(Request $request, $number = null)
    {
        $agent = Auth::guard('agent')->user();
        $currentDate = Carbon::now()->format('Y-m-d');

        $data = Barcode::with('ticketPurchases')->where('user_id', Auth::user()->id)
        ->whereDate('created_at', $currentDate)->orderBy('id', 'desc')
            ->get();

        return view('agent.dashview', compact('agent', 'number', 'data'));
    }

    public function savedashboard(Request $request)
    {
        $currentTime = now();
        $ticketWindowOpenTime = now()->setTime(8, 45); // Set the opening time to 8:45 AM
        $ticketWindowCloseTime = now()->setTime(21, 30); // Set the closing time to 9:30 PM
    
        if ($currentTime->lt($ticketWindowOpenTime) || $currentTime->gte($ticketWindowCloseTime)) {
            // Ticket window is not open
            $openingTime = $ticketWindowOpenTime->format('h:i A');
            return back()->with('error', "Ticket window is not open. Please try again after $openingTime.");
        }
        $startTime = now()->setHour(9)->setMinute(0)->setSecond(0); // Set your start time
        $endTime = now()->setHour(21)->setMinute(30)->setSecond(0);   // Set your end time
    
        if ($currentTime >= $startTime && $currentTime <= $endTime) {
       
            if ($currentTime->minute % 15 === 0 && $currentTime->minute !== 0) {
                return back()->with('error', 'Please wait for 1 minute');
            }
        }
        $data = $request->all();
        $balance = Auth::user()->balance;
        $user_id = Auth::user()->id;
        if ($balance <= 0) {
            return back()->with('error', 'Please recharge your account.');
        }
        $totalPts = 0;
        $totalQty = 0;
        foreach ($data as $key => $value) {
            $keyInt = (int)$key;

            if (($keyInt >= 7000 && $keyInt <= 7099) || ($keyInt >= 6000 && $keyInt <= 6099)) {
                if (!empty($value)) {
 $notempty = true;
                    $pts = (int)$value * 1.1;
                    $totalPts += $pts;
                    $totalQty += $value;
                }
            }
        }
if(empty($notempty)){
    return back()->with('error', 'Please Purchase at least One Ticket');
}
        if ($totalPts > $balance) {

            return back()->with('error', 'Insufficient points. Please recharge your account.');
        }
        $currentTime = strtotime(date("H:i"));
        $drawtime = ceil($currentTime / (15 * 60)) * (15 * 60);
       
        if(empty($data['timeslots'])){
            $data['timeslots'][0] = date("H:i", $drawtime);
        }
        // $drawtimeFormatted now contains the formatted drawtime like 9:15, 9:30, 9:45, 10:00, etc.
        foreach ($data['timeslots'] as  $timeslots) {
        $barcode = new Barcode();
        $barcode->drawtime = $timeslots;
        $barcode->user_id = $user_id;
        $barcode->requestid = mt_rand(100000000000, 999999999999);
        $barcode->qty = $totalQty;
        $barcode->points = $totalPts;
        $barcode->status = "ACTIVE";
        $barcode->barcode = mt_rand(1000000000000, 9999999999999);
        $barcode->save();
        $savedId = $barcode->id;
       
        foreach ($data as $key => $value) {
            $keyInt = (int)$key;
            if (($keyInt >= 7000 && $keyInt <= 7099) || ($keyInt >= 6000 && $keyInt <= 6099)) {
                if (!empty($value)) {
                    $pts = (int)$value * 1.1;
                    $balance -= $pts;

                    DB::transaction(function () use ($keyInt, $value, $pts, $user_id, $savedId, $timeslots) {
                        $TicketPurchase = new TicketPurchase();
                        $TicketPurchase->drawtime = $timeslots;
                        $TicketPurchase->ticket_number = $keyInt;
                        $TicketPurchase->qty = (int)$value;
                        $TicketPurchase->points = $pts;
                        $TicketPurchase->user_id = $user_id;
                        $TicketPurchase->barcode_id = $savedId;
                        $TicketPurchase->save();
                    });
                    DB::table('transaction')->insert([
                        'user_id' => $user_id,
                        'action' => 'purchase',
                        'amount' => $pts,
                        'balance' => $balance,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
        Auth::user()->update(['balance' => $balance]);
        return back()->with('success', 'Ticket purchased successfully.');
    }

    public function userdata()
    {
        $userdata = DB::table('users')->get();
        return view('agent.userdata', ['data' => $userdata]);
    }

    public function userstore(Request $request)
    {
        $validate = $request->validate([

            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);
        $userdata = new User();
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->password = $request->password;
        $userdata->save();
        return redirect()->route('userdata');
    }

    public function newview(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->get();
        return view('agent.newview', ['data' => $userdata]);
    }

    public function edit(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->first();
        return view('agent.newedit', ['data' => $userdata]);
    }

    public function newupdate(Request $request, $id)
    {
        $USER = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('userdata')->with('error', 'update successfully.');
        // ]);
    }

    public function header()
    {
        return view('agent.header');
    }

    public function delete(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->delete();
        return redirect()->route('userdata');
    }
    public function showChangePasswordForm()
    {
        return view('agent.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|',
            'new_password' => 'required|min:8|confirmed',
        ]);

        return redirect()->route('userdata')->with('success', 'Password changed successfully.');
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }
        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect()->route('userdata')->with('success', 'Password changed successfully.');
    }

    public function newheader()
    {
        return view('agent.layout.main');
    }
    public function user()
    {
        return view('agent.user');
    }

    public function usersave(Request $request)
    {
        $validate = $request->validate([

            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);
        $userdata = new User();
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->password = $request->password;
        $userdata->save();
        return redirect()->route('user');
    }


    public function result()
    {
      
        $currentTime = now()->format('H:i');
        $data = Result::whereDate('created_at', now()->toDateString())
            ->where('timesloat', '<=', $currentTime)
            ->orderBy('timesloat', 'desc')
            ->get();
    
        return view('agent.result', ['data' => $data]);
    }

    public function getFilteredData(Request $request)
    {
        $date = $request->date;
        $data = Result::whereDate('created_at', $date)->get();
        $dataTransaction = Transaction::whereDate('created_at', $date)->get();
        return response()->json(['data' => $data, 'dataTransaction' => $dataTransaction]);
    }

    public function resultsave(Request $request)
    {
        $validate = $request->validate([
            'number_70' => 'required|int|',
            'number_60' => 'required||int:result',
            'timesloat' => 'required|',
        ]);

        $userdata = new Result();
        $userdata->number_70 = $request->number_70;
        $userdata->number_60 = $request->number_60;
        $userdata->timesloat = $request->timesloat;
        $userdata->save();
        session()->flash('success', 'User created successfully.');
        return redirect()->route('result');
    }

    public function resultedit(string $id)
    {
        $userData = Result::find($id);
        if (!$userData) {
            abort(404);
        }
        return view('agent.resultedit', ['data' => $userData]);
    }

    public function resultupdate(Request $request, $id)
    {
        $USER = DB::table('result')->where('id', $id)->update([
            'number_70' => $request->number_70,
            'number_60' => $request->number_60,
            'timesloat' => $request->timesloat,
        ]);
        return redirect()->route('result')->with('success', 'update successfully.');
    }
    public function resultdelete(string $id)
    {
        $userdata = DB::table('result')->where('id', $id)->delete();
        return redirect()->route('result')->with('error', 'Delete successfully.');
    }
    public function profile()
    {
        return view('agent.profile');
    }
    public function transaction()
    {
        $user = Auth::user();
        if ($user) {
            $transactions = Transaction::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            return view('agent.transaction', ['data' => $transactions]);
        } else {
            return view('agent.user');
        }
    }

    public function  home()
    {
        return view('agent.homes');
    }

    public function tes()
    {
        return view('agent.tes');
    }

    public function tessave(Request $request)
    {
        $numValue = $request->input('num');
        if (!empty($numValue)) {
            $request->merge(['nums' => $numValue]);
        } else {

            $request->merge(['nums' => 'default_value']);
        }
        $numsValue = $request->input('nums');
        return redirect()->route('agent.tes');
    }

    public function agentshowChangePassword()
    {

        return view('agent.agentchangepassword');
    }

    public function agentchangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);
        $auth = Auth::user();
        $newPassword = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        if ($newPassword === $confirm_password) {
            DB::table('users')->where('id', $auth->id)->update([
                'password' => Hash::make($newPassword),
            ]);
        } else {
            return redirect()->back()->with('error', 'The  password is not match.');
        }
        return redirect()->route('result')->with('success', 'Password updated successfully!');
    }


    public function  subhank()
    {
        $currentTime = now()->format('H:i');
        $users = Result::whereDate('created_at', now()->toDateString())
        ->where('timesloat', '<=', $currentTime)->orderBy('timesloat', 'desc')->get();
        return view('subhank', ['data' => $users]);
    }

    public function report(Request $request)
    {
        if (Auth::guard('agent')->check()) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            if (empty($start_date)) {
                $start_date = now()->startOfDay();
            } else {
                $start_date = Carbon::parse($start_date)->startOfDay();
            }
            if (empty($end_date)) {
                $end_date = now()->endOfDay();
            } else {
                $end_date = Carbon::parse($end_date)->endOfDay();
            }
            
            $data = Barcode::whereBetween('created_at', [$start_date, $end_date])->get();
            $sumQty = $data->sum('qty');
            $sumpoints = $data->sum('points');
            $winpoints = $data->sum('winpoints');
    
            $cancelCount = $data->where(function ($item) {
                return strcasecmp($item->status, 'CANCEL') === 0;
            })->count();
            $netAmt = $sumQty - $cancelCount;
            $netplus = $netAmt * 1.1;
            $Claimqty = $data->filter(function ($item) {
                return !empty($item->winpoints);
            });
            $sumQtyWinpoints = $Claimqty->sum('claimQty');
            $Netpay = $netplus - $data->sum('winpoints');  
            return view('agent.report', compact('data', 'start_date', 'end_date', 'sumQty', 'sumpoints', 'cancelCount', 'netAmt', 'netplus', 'sumQtyWinpoints', 'Netpay', 'winpoints'));
        } else {
            return redirect()->route('agent.login');
        }
    }
    
    public function filtereddata(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        if (empty($start_date)) {
            $start_date = now()->startOfDay();
        } else {
            $start_date = Carbon::parse($start_date)->startOfDay();
        }
        if (empty($end_date)) {
            $end_date = now()->endOfDay();
        } else {
            $end_date = Carbon::parse($end_date)->endOfDay();
        }
        $data = Barcode::whereBetween('created_at', [$start_date, $end_date])->get();
        $sumQty = $data->sum('qty');
        $sumpoints = $data->sum('points');
        $winpoints = $data->sum('winpoints');
    
        $cancelCount = $data->where(function ($item) {
            return strcasecmp($item->status, 'CANCEL') === 0;
        })->count();
        
        $netAmt = $sumQty - $cancelCount;
        $netplus = $netAmt * 1.1;
    
        $Claimqty = $data->filter(function ($item) {
            return !empty($item->winpoints);
        });
        $sumQtyWinpoints = $Claimqty->sum('claimQty');
        $Netpay = $netplus - $data->sum('winpoints');
        return view('agent.report', compact('data', 'start_date', 'end_date', 'sumQty', 'sumpoints', 'cancelCount', 'netAmt', 'netplus', 'sumQtyWinpoints', 'Netpay', 'winpoints'));
    }
    public function getFilteredDataForAdmins(Request $request)
    {
        $date = $request->date;
        if ($date === Carbon::now()->format('Y-m-d')) {
            $currentTime = now()->format('H:i');
            $data = Result::whereDate('created_at', now()->toDateString())
                ->where('timesloat', '<=', $currentTime)
                ->orderBy('timesloat', 'desc')
                ->get();
        } else {
            $data = Result::whereDate('created_at', $date)->orderBy('timesloat', 'desc')->get();
        }
        return response()->json(['data' => $data]);
    }

    public function resultdeclared()
    {
        $startDateTime = '2023-01-01 00:00:00';
$endDateTime = '2024-02-21 00:00:00';

$currentTime = $startDateTime;

while ($currentTime <= $endDateTime) {
    for ($hour = 9; $hour <= 21; $hour++) {
        for ($minute = 0; $minute < 60; $minute += 15) {
            $timeSlot = sprintf('%02d:%02d', $hour, $minute);
            if ($timeSlot > '21:30') {
                Log::info("Stopped creating entries after 20:30");
                return true;
            }
            Result::create([
                'number_70' => rand(10, 99),
                'number_60' => rand(10, 99),
                'created_at' => $currentTime,
                'timesloat' => $timeSlot,
            ]);
            Log::info("Result created for time slot: $timeSlot at $currentTime");
        }
    }
    $currentTime = date('Y-m-d H:i:s', strtotime($currentTime . ' +1 day'));
}
    }

// public function resultdeclared()
//     {
//         for($date = 2023-01-01; $date <= 2024-02-21; $date++){
//         for ($hour = 9; $hour <= 21; $hour++) {
//             for ($minute = 0; $minute < 60; $minute += 15) {
//                 $timeSlot = sprintf('%02d:%02d', $hour, $minute);
//                 if ($timeSlot > '21:30') {
//                     Log::info("Stopped creating entries after 20:30");
//                     return true;
//                 }
//                 Result::create([
//                     'number_70' => rand(10, 99),
//                     'number_60' => rand(10, 99),
//                     'created_at' => $date,
//                     'timesloat' => $timeSlot,
//                 ]);
//                 Log::info("Result created for time slot: $timeSlot");
//             }
//         }
//         return true;
//     }
// }
}

