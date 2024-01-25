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
        $currentTime = now();
        $agent = Auth::guard('agent')->user();
    
       $data = Barcode::where('user_id', $agent->id)
            ->where('drawtime', '>=', $currentTime->format('H:i'))->where('status' , '!=' , 'CANCEL')
            ->orderBy('id', 'desc')
            ->first();
    
        if (!$data || $data->drawtime <= $currentTime->format('H:i')) {
            return back()->with('error', 'Ticket Not Purchased');
        }
    
        $points = $data->points;
    
        $newBalance = $agent->balance + $points;
        $agent->update(['balance' => $newBalance]);
    
        DB::table('transaction')->insert([
            'user_id' => $agent->id,
            'action' => 'cancel',
            'amount' => $points,
            'balance' => $newBalance,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data->status = 'CANCEL';
        $data->save();
    
        return back()->with('error', 'Ticket has been cancelled');
    }
    
    
}
