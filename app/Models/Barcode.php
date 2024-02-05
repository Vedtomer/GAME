<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TicketPurchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barcode extends Model
{
    use HasFactory;
    protected $fillable = ['drawtime', 'requestid', 'qty', 'points','claimQty', 'winpoints', 'status', 'barcode', 'is_result_declared', 'updated_at', 'created_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function ticketPurchases()
    {
        return $this->hasMany(TicketPurchase::class, 'barcode_id', 'id');
    }
    public static function getTodayDeals()
    {
        $today = Carbon::today();

        return self::whereDate('created_at', $today)->get();
    }
}
