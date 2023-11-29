<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->route('admin.login')
                ->with('error', 'Invalid login credentials');
        }
        return redirect()->route('admin.login');
    }
    

    public function dashboard()
    {
        // Retrieve the authenticated admin
        $admin = Auth::guard('admin')->user();

        // You can now use $admin to access the authenticated admin's details

        return view('admin.dashboard', compact('admin'));
    }
    public function userdata(){
        return view('admin.userdata');
    }
}
