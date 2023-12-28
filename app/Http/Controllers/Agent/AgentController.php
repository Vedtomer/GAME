<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Agent;
use App\Models\User;
use App\Models\Result;
use App\Models\Transaction;
use App\Models\TicketPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use PHPUnit\Framework\Attributes\Ticket;
// namespace App\Http\Controllers\Agent;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Validator;





class AgentController extends Controller
{
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
    
    public function dashboard($number=null)
    {
   
        if(!$number){
            $number=6000;
        }
        
        $agent = Auth::guard('agent')->user();
   
        return view('agent.dashboard', compact('agent','number'));
    }

    public function savedashboard(Request $request)
{
    $validator = Validator::make($request->all(), [
        'radioNumber' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    for ($i = 0; $i < 100; $i += 10) {
        $ticketNumber = $request->input_top_0 + $i;
        $qty = $request->{'A' . $i};

        if ($qty != null) { 
            $ticketPurchase = new TicketPurchase();
            $ticketPurchase->ticket_number = $ticketNumber;
            $ticketPurchase->qty = $qty;
            $ticketPurchase->save();
        }
    }

    return redirect('/dashboard')->with('message', 'Data saved successfully');
}

    
    // public function dashboard(){

    //     return view('dashboard');
    // }
    
    public function userdata()
    {
        // return view('admin.userdata');
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

    public function newheader(){
        return view('agent.layout.main');
    }
    public function user(){
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

    // public function result(){
    //     return view('agent.result');
    // }
    public function result()
    {
        $users = Result::all();
        return view('agent.result', ['data' => $users]);
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
    // return $request;
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
    public function profile(){
        return view('agent.profile');
    }

    // public function  transaction(){
    //     return view('agent.transaction');
    // }
    // public function  transaction()
    // {
    //         // $users = Transaction::where('user_id',Auth::user())->get();
    //         $users = Transaction::where('user_id', Auth::user())->get();
    //         dd($users);
     
    //     return view('agent.transaction', ['data' => $users]);
        
    // }
    public function transaction()
{
    $user = Auth::user();
    if ($user) {
        $transactions = Transaction::where('user_id', $user->id)->get();
        return view('agent.transaction', ['data' => $transactions]);
    } else {
        return view('agent.user'); 
    }
}

    public function  home(){
        return view('agent.homes');
    }

    public function tes()
    {
        return view('agent.tes');
    }

    public function tessave(Request $request)
    {
        // Retrieve the value from the "num" field
        $numValue = $request->input('num');
    
        // If the "num" field has a value, assign it to the "nums" field
        if (!empty($numValue)) {
            $request->merge(['nums' => $numValue]);
        } else {
            // If "num" field is empty, set a default value for "nums"
            $request->merge(['nums' => 'default_value']);
        }
    
        // Now you can access the value of "nums" in your request
        $numsValue = $request->input('nums');
    
        // Add your logic to save or process the values here
    
        // Redirect or return a response as needed
        return redirect()->route('agent.tes'); // Update with the correct route name
    }
    
    
    
    // public function view(){


    // }
    // public function view()
    // {
    //     $userdata = DB::table('users')->get();
    //     $data = ['data' => $userdata];

    //     // Check if $userdata is not null and is an array
    //     if (!is_null($userdata) && is_array($userdata) && count($userdata) > 0) {
    //         return view('userdata', $data);
    //     } else {
    //         // If no data, return a view without the table
    //         return view('userdata', $data);
    //     }
    // }



 public function agentshowChangePassword()
{
    // $userdata = DB::table('admins')->where('id', $id)->first();
    return view('agent.agentchangepassword');
}

public function agentchangePassword(Request $request)
{
    // return $request;
    $request->validate([
        'password' => 'required|min:8',
        'confirm_password' => 'required|min:8',
    ]);

    $auth = Auth::user();
    $newPassword = $request->input('password');
    $confirm_password = $request->input('confirm_password');
    if($newPassword === $confirm_password){
        DB::table('users')->where('id', $auth->id)->update([
            'password' => Hash::make($newPassword),
        ]);
    }else{
        return redirect()->back()->with('error', 'The  password is not match.');
    }
    return redirect()->route('result')->with('success', 'Password updated successfully!');
}

}
