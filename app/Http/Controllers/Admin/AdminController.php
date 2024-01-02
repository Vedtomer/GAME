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
use App\Models\Transaction;

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
        $guard = Auth::getDefaultDriver(); // Get the default guard

        Auth::guard($guard)->logout();

        $redirectRoute = ($guard == 'admin') ? 'admin.login' : 'agent.login';

        return redirect()->route($redirectRoute);
    }


    public function dashboard()
    {
        // Retrieve the authenticated admin
        $admin = Auth::guard('admin')->user();

        // You can now use $admin to access the authenticated admin's details

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
        $userdata->password = $request->password; // store kr raha hai yani database me data insert ho raha hai

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
    if($newPassword === $confirm_password){
        DB::table('users')->where('id', $userId)->update([
            'password' => Hash::make($newPassword),
        ]);
    }else{
        return redirect()->back()->with('error', 'The  password is not match.');
    }

    // Assuming 'users' is your table name
 

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
    if($newPassword === $confirm_password){
        DB::table('admins')->where('id', $auth->id)->update([
            'password' => Hash::make($newPassword),
        ]);
    }else{
        return redirect()->back()->with('error', 'The  password is not match.');
    }
    return redirect()->route('admin.user')->with('success', 'Password updated successfully!');
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
        if(empty($request->name)){
            return redirect()->back()->with('error' ,'name is required');
        }
        if(empty($request->email)){
            return redirect()->back()->with('error' ,'email is required');
        }
        if(empty($request->password)){
            return redirect()->back()->with('error' ,'password is required');
        }
        if($request->confirm_password != $request->password){
            return redirect()->back()->with('error' ,'password is not match');
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
// public function displayUsers()
// {
//     $users = User::all();
//     dd($users); // Check karne ke liye
//     // return view('admin.user', ['data' => $users]);
// }


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

    // public function result()
    // {
    //     return view('admin.result');
    // }

    public function resultadd()
    {
      
        return view('admin.resultadd');
    }


    public function result()
    {
        $users = Result::orderBy('created_at', 'desc')->get();
        return view('admin.result', ['data' => $users]);
    }


    public function resultsave(Request $request)
    {
        $validate = $request->validate([
            // 'number_70' => 'required|int|',
            // 'number_60' => 'required||int:result',
            'timesloat' => 'required|',
        ]);

        $userdata = new Result();
        $userdata->number_70 = $request->number_70;
        $userdata->number_60 = $request->number_60;
        $userdata->timesloat = $request->timesloat;

     $userdata->update_user_result($request->number_60,$request->number_70);

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
    // return $request;
      $USER = DB::table('result')->where('id', $id)->update([
        'number_70' => $request->number_70,
        'number_60' => $request->number_60,
        'timesloat' => $request->timesloat,
    ]);
    return redirect()->route('admin.result')->with('success', 'update successfully.');  
}
public function resultdelete(string $id)
{
    $userdata = DB::table('result')->where('id', $id)->delete();
    return redirect()->route('admin.result')->with('error', 'Delete successfully.');
}
    public function profile()
    {
        return view('admin.profile');
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
           

            $user =User::where('id',$id)->first();
            $amount=$user->balance+$request->amount;
            $user->balance=floatval($amount);
            $userdata->balance=$user->balance;
            $userdata->save();
            $user->save();
            session()->flash('success', 'Amount Added successfully.');
            return redirect()->route('admin.user');
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

           

            $user =User::where('id',$id)->first();
            $epsilon = 0.0001; 
if (floatval($request->amount) > floatval($user->balance) + $epsilon) {
    session()->flash('error', 'Insufficient balance.');
    return redirect()->route('admin.user');
}

            $amount=$user->balance-$request->amount;

            $user->balance=floatval($amount);
            $userdata->balance=$user->balance;
            $userdata->save();
            $user->save();
            
            session()->flash('success', 'Amount Debit successfully.');
            return redirect()->route('admin.user');
        }
        $data = Transaction::all();
        return view('admin.withdrawal', ['data' => $data, 'id' => $id]);
    }
    // public function amount($id)

    // {
    //     $Data = Transaction::all();
    //     return view('admin.amount', ['data' => $Data]);
    // }

    // public function amountsave(Request $request)
    // {
    //     $validate = $request->validate([
        
    //         'amount' => 'required',
    //     ]);

    //     $userdata = new Transaction();
    //     $userdata->amount = $request->amount;

    //     $userdata->save();
    //     session()->flash('success', 'User created successfully.');
    //     return redirect()->route('admin.user');
    // }
    public function  transaction($id=null)
    {
        if(empty($id)){
            $users = Transaction::orderBy('created_at', 'desc')->get();
        }else{
            $users = Transaction::where('user_id',$id)->get();
        }
        return view('admin.transaction', ['data' => $users]);
        
    }
    public function  home()
    {
      $users = Result::wheredate('created_at', now()->toDateString())->get();
        return view('home', ['data' => $users]);
    }
    public function  newhome()
    {
        $users = Result::wheredate('created_at', now()->toDateString())->get();
        return view('admin.layout.newhome', ['data' => $users]);
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
}
