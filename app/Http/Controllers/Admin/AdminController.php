<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Models\Result;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\TicketPurchase;
use App\Models\Barcode;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->isMethod('get')) {
            return view('admin.login');
        }

        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->route('admin.login')
                ->with('error', 'Invalid login credentials');
        }
        return redirect()->route('admin.login')->with('error', 'Invalid login credentials');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', compact('admin'));
    }
    public function userdata()
    {
        // return view('admin.userdata');
        $userdata = DB::table('users')->get();
        return view('admin.userdata', ['data' => $userdata]);
    }

    public function userstore(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:100',  // validate krna form ko
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
        return view('admin.newview', ['data' => $userdata]);
    }

    public function edit(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->first();
        return view('admin.newedit', ['data' => $userdata]);
    }

    public function newupdate(Request $request, $id)
    {
        $USER = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.user')->with('error', 'update successfully.');
        // ]);
    }

    public function header()
    {
        return view('admin.header');
    }

    public function delete(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->delete();
        return redirect()->route('userdata');
    }

    public function showChangePasswordForm($id)
    {
        $userdata = DB::table('users')->where('id', $id)->first();
        return view('admin.change-password', ['data' => $userdata]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);

        $userId = $request->input('user_id');
        $newPassword = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        if ($newPassword === $confirm_password) {
            DB::table('users')->where('id', $userId)->update([
                'password' => Hash::make($newPassword),
            ]);
        } else {
            return redirect()->back()->with('error', 'The  password is not match.');
        }

        return redirect()->route('admin.user')->with('success', 'Password updated successfully!');
    }

    public function adminshowChangePassword()
    {
        // $userdata = DB::table('admins')->where('id', $id)->first();
        return view('admin.adminchangepassword');
    }

    public function adminchangePassword(Request $request)
    {
        // return $request;
        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);

        $auth = Auth::user();
        $newPassword = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        if ($newPassword === $confirm_password) {
            DB::table('admins')->where('id', $auth->id)->update([
                'password' => Hash::make($newPassword),
            ]);
        } else {
            return redirect()->back()->with('error', 'The  password is not match.');
        }
        return redirect()->route('user')->with('success', 'Password updated successfully!');
    }

    public function user()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user', ['data' => $users]);
    }
    public function useradd()
    {
        return view('admin.useradd');
    }

    public function usersave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'User name not available'])->withInput();
        }

        if (empty($request->password)) {
            return redirect()->back()->withErrors(['password' => 'Password is required'])->withInput();
        }

        if ($request->confirm_password != $request->password) {
            return redirect()->back()->withErrors(['password' => 'Password does not match'])->withInput();
        }
        $userdata = new User();
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->password = bcrypt($request->password);
        $userdata->save();
        session()->flash('success', 'User created successfully.');
        return redirect()->route('user');
    }

    public function displayUsers()
    {
        $users = User::all();
        return view('admin.user', ['data' => $users]);
    }

    public function useredit(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->first();
        return view('admin.useredit', ['data' => $userdata]);
    }

    public function userupdate(Request $request, $id)
    {
        $USER = DB::table('users')->where('id', $id)->update([

            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('user')->with('success', 'update successfully.');
        // ]);
    }
    public function userdelete(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.user');
    }

    public function resultadd()
    {
        return view('admin.resultadd');
    }

    public function result()
    {
        $users = Result::orderBy('created_at', 'desc')->get();
        return view('admin.result', ['data' => $users]);
    }

    public function getFilteredDataForAdmin(Request $request)
    {
        $date = $request->date;
        $data = Result::whereDate('created_at', $date)->orderBy('timesloat', 'desc')->get();
        // $dataa = Transaction::whereDate('created_at', $date)->get();
        // return response()->json(['data' => $data]);
        $dataTransaction = Transaction::whereDate('created_at', $date)->get();

        return response()->json(['data' => $data, 'dataTransaction' => $dataTransaction]);
    }

    public function resultsave(Request $request)
    {
        $validate = $request->validate([
            'number_70' => 'required|max:2',
            'number_60' => 'required|max:2',
            'timesloat' => 'required',
        ], [
            'number_70.max' => 'The Number 70 field must not exceed 2 characters.',
            'number_60.max' => 'The Number 60 field must not exceed 2 characters.',
        ]);
        $userdata = new Result();
        $userdata->number_70 = $request->number_70;
        $userdata->number_60 = $request->number_60;
        $userdata->timesloat = $request->timesloat;

        // $userdata->update_user_result($request->number_60, $request->number_70);
        $userdata->save();
        session()->flash('success', 'User created successfully.');
        return redirect()->route('admin.result');
    }

    public function resultedit(string $id)
    {
        $userData = Result::find($id);
        if (!$userData) {
            abort(404);
        }
        return view('admin.resultedit', ['data' => $userData]);
    }

    public function resultupdate(Request $request, $id)
    {
        $rules = [
            'number_70' => 'required|string',
            'number_60' => 'required|string',
            'timesloat' => 'nullable', // 'nullable' allows the field to be optional
        ];
        $messages = [
            'number_70.required' => 'The number_70 field is required.',
            'number_60.required' => 'The number_60 field is required.',
            'timesloat' => 'The timesloat field is required.',
        ];
        $request->validate($rules, $messages);
        $USER = DB::table('result')->where('id', $id)->update([
            'number_70' => $request->number_70,
            'number_60' => $request->number_60,
            // 'timesloat' => $request->timesloat,
        ]);
        return redirect()->route('admin.result')->with('success', 'update successfully.');
    }

    public function resultdelete(string $id)
    {
        $userdata = DB::table('result')->where('id', $id)->delete();
        return redirect()->route('admin.result')->with('error', 'Delete successfully.');
    }

    public function amount(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $validate = $request->validate([
                'amount' => 'required',
            ]);
            $userdata = new Transaction();
            $userdata->user_id = $id;
            $userdata->action = $request->add;
            $userdata->amount = $request->amount;
            $user = User::where('id', $id)->first();
            $amount = $user->balance + $request->amount;
            $user->balance = floatval($amount);
            $userdata->balance = $user->balance;
            $userdata->save();
            $user->save();
            session()->flash('success', 'Amount Added successfully.');
            return redirect()->route('user');
        }
        $data = Transaction::all();
        return view('admin.amount', ['data' => $data, 'id' => $id]);
    }

    public function withdrawal(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $validate =  $request->validate([
                'withdrawal' => 'required',
            ]);
            $userdata = new Transaction();
            $userdata->user_id = $id;
            $userdata->action = $request->withdrawal;
            $userdata->amount = $request->amount;
            $user = User::where('id', $id)->first();
            $epsilon = 0.0001;
            if (floatval($request->amount) > floatval($user->balance) + $epsilon) {
                session()->flash('error', 'Insufficient balance.');
                return redirect()->route('user');
            }
            $amount = $user->balance - $request->amount;
            $user->balance = floatval($amount);
            $userdata->balance = $user->balance;
            $userdata->save();
            $user->save();
            session()->flash('success', 'Amount Debit successfully.');
            return redirect()->route('user');
        }
        $data = Transaction::all();
        return view('admin.withdrawal', ['data' => $data, 'id' => $id]);
    }

    public function  transaction($id = null)
    {
        // return $id;
        if (empty($id)) {
            $users = Transaction::orderBy('created_at', 'desc')->get();
        } else {
            $users = Transaction::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        }
        // return $users;
        return view('admin.transaction', ['data' => $users]);
    }
    public function  home()
    {
        $users = Result::wheredate('created_at', now()->toDateString())->get();
        return view('home', ['data' => $users]);
    }

    public function settlement()
    {
        Log::info("run cron");
        $currentTime = now();
        $nearestTime = floor($currentTime->minute / 15) * 15;
        $currentTime->minute = $nearestTime;
        $nearestTimeIn24HourFormat = $currentTime->format('H:i');
        $userdata = Result::where('timesloat', '<=', $nearestTimeIn24HourFormat)
            ->whereDate('created_at', $currentTime->toDateString())->orderBy('timesloat', 'desc')->first();

        if ($userdata) {
            $userdata->update_user_result($userdata->number_60, $userdata->number_70);
            // $userdata->save();
            return true;
        } else {

            return false;
        }
    }

    public function  newhome()
    {
        $currentTime = now()->format('H:i');
        $users = Result::whereDate('created_at', now()->toDateString())
            ->where('timesloat', '<=', $currentTime)->orderBy('timesloat', 'desc')->get();

        return view('admin.layout.newhome', ['data' => $users]);
    }

    public function ticket(Request $request)
    {
        $selectedDate = $request->input('date');
        if (!empty($selectedDate)) {
            $data = Barcode::with('ticketPurchases', 'User')
                ->whereDate('created_at', '=', $selectedDate)->orderBy('id', 'desc')->get();
        } else {
            $currentDate = Carbon::now()->format('Y-m-d');
            $data = Barcode::with('ticketPurchases')->where('is_result_declared', 0)->whereDate('created_at', '=', $currentDate)->orderBy('id', 'desc')->get();
        }
        return view('admin.ticket', compact('data'));
    }

    public function book(Request $request){
        $currentTime = strtotime(date("H:i"));
        $drawtime = ceil($currentTime / (15 * 60)) * (15 * 60);
        $drawtime = date("H:i", $drawtime);
    
        $data = TicketPurchase::select('ticket_number', DB::raw('SUM(qty) as total_qty'))
                      ->where('is_result_declared', 0)
                      ->where('drawtime', $drawtime)
                      ->whereDate('created_at', now()) 
                      ->groupBy('ticket_number')
                      ->orderBy('total_qty', 'asc')
                      ->orderBy('ticket_number', 'asc')
                      ->get();


    
        return view('admin.book', compact('data'));
    }
    
   

}
