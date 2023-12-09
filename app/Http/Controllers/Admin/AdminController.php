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
        return redirect()->route('userdata')->with('error', 'update successfully.');
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



    public function showChangePasswordForm()
    {
        return view('admin.change-password');
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
        return view('admin.layout.main');
    }



    public function user()
    {
        $users = User::all();
        return view('admin.user', ['data' => $users]);
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
        session()->flash('success', 'User created successfully.');
        return redirect()->route('user');
    }

    public function displayUsers()
{
    $users = User::all(); // Sabhi users ki data fetch karein

    // return view('admin.user', ['data' => $users]);
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
    return redirect()->route('admin.user')->with('success', 'update successfully.');
    // ]);
}
public function userdelete(string $id)
{
    $userdata = DB::table('users')->where('id', $id)->delete();
    return redirect()->route('admin.user');
}





    public function result()
    {
        return view('admin.result');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function  transaction()
    {
        return view('admin.transaction');
    }
    public function  home()
    {
        return view('admin.home');
    }
    public function  newhome()
    {
        return view('admin.layout.newhome');
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
