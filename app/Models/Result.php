<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TicketPurchase;
use Illuminate\Support\Facades\DB;
use App\Models\Barcode;
use Illuminate\Support\Facades\Log;

class Result extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $table = 'result';
    protected $fillable = ['number_70', 'number_60', 'timesloat'];
    // protected $fillable = ['number_70', 'number_60', 'timesloat' ,'created_at' ,'updated_at'];
    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope('reselect', function ($query) {
            return $query->select(
                '*',
                \DB::raw("CASE WHEN number_70 IS NOT NULL AND (number_70 = '0' OR CAST(number_70 AS UNSIGNED) < 10) THEN LPAD(number_70, 2, '0') ELSE number_70 END as number_70"),
                \DB::raw("CASE WHEN number_60 IS NOT NULL AND (number_60 = '0' OR CAST(number_60 AS UNSIGNED) < 10) THEN LPAD(number_60, 2, '0') ELSE number_60 END as number_60")
            );
        });
    }
    public function update_user_result($number60, $number70)
    {

        $currentTime = now();

        // Get today's date in Y-m-d format
        $todayDate = $currentTime->toDateString();

        $num60 = (int) "60" . $number60;
        $num70 = (int) "70" . $number70;

        $numbers = [$num70, $num60];

        $currentTime = now();

        $ticketPurchases = TicketPurchase::where('is_result_declared', 0)
            ->where('drawtime', $currentTime->format('H:i'))
            ->whereDate('created_at', $todayDate)
            ->whereIn('ticket_number', $numbers)
            ->get();

        foreach ($ticketPurchases as $ticketPurchase) {

            Log::info($ticketPurchase);
            // Calculate winning amount (assuming qty is a column in the TicketPurchase table)
            $ticketPurchase = TicketPurchase::find($ticketPurchase->id);
            $winningAmount = $ticketPurchase->qty * 100;

            $ticketPurchase->winning_amount = $winningAmount;
            $ticketPurchase->is_result_declared = 1;
            $ticketPurchase->result = "WIN";
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

            $barcode = Barcode::where('id', $ticketPurchase->barcode_id)->where('status', 'ACTIVE')->where('is_result_declared', 0)->first();

            if ($barcode) {
                // Get the existing values
                $existingClaimQty = $barcode->claimQty;
                $existingWinpoints = $barcode->winpoints;

                // Add the new values
                $newClaimQty = $existingClaimQty + $ticketPurchase->qty;
                $newWinpoints = $existingWinpoints + $winningAmount;

                // Update the column values
                $barcode->update([
                    'claimQty' => $newClaimQty,
                    'winpoints' => $newWinpoints,
                    'is_result_declared' => 1,
                ]);
            }
        }

        // $currentTime = strtotime(date("H:i"));
        // $drawtime = ceil($currentTime / (15 * 60)) * (15 * 60);
        // $drawtime = date("H:i", $drawtime);

        // $data = TicketPurchase::where('drawtime', $drawtime)
        //               ->whereDate('created_at', now()) 
        //               ->update(['is_result_declared' => 1]);

    }
}
