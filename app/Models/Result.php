<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TicketPurchase;
use Illuminate\Support\Facades\DB;
class Result extends Model
{
    use HasFactory;
    protected $table = 'result';

    public function update_user_result($number60, $number70)
    {
        $num70 = (int) "70" . $number70;
        $num60 = (int) "60" . $number60;
        $numbers = [$num70, $num60];
    
        
        $ticketPurchases = TicketPurchase::where('is_result_declared', 0)
        ->whereIn('ticket_number', $numbers)
        ->get();
    
        foreach ($ticketPurchases as $ticketPurchase) {
            // $ticketNumbers = json_encode($numbers);
         
             // Calculate winning amount (assuming qty is a column in the TicketPurchase table)
             $ticketPurchase=TicketPurchase::find($ticketPurchase->id);
             $winningAmount = $ticketPurchase->qty * 11;
 
             $ticketPurchase->winning_amount=$winningAmount;
             $ticketPurchase->is_result_declared=1;
             $ticketPurchase->save();
        
            // Update the user table's balance column
            $user = User::find($ticketPurchase->user_id);
            $newBalance = $user->balance + $winningAmount;
            $user->update(['balance' => $newBalance]);
        
            // Insert a new record into the 'transaction' table
            DB::table('transaction')->insert([
                'user_id' => $user->id,
                'action' => 'win',
                'amount' => $winningAmount,
                'balance' => $newBalance,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
}
