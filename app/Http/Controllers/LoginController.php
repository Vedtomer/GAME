<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\Barcode;
use App\Models\Result;
use App\Models\Transaction;
use App\Models\TicketPurchase;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function show(){
        return view('dash');
    }
    // public function usershow(){
    //     return view('user');
    // }
    public function table(){
        return view('table');
    }
    public function canceltiket(Request $request)
    {
        $agent = Auth::guard('agent')->user();


       $data = Barcode::where('user_id', $agent->id)->orderBy('id', 'desc')->first();


       $data->status = 'CANCEL';
       $data->save();
        return back()->with('error','Ticket has been Canceel');
        // return "hfghr";
    }
}
