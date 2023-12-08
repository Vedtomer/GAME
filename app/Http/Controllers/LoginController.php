<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function show(){
        return view('dash');
    }
    public function usershow(){
        return view('user');
    }
    public function table(){
        return view('table');
    }
}
