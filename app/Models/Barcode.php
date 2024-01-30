<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TicketPurchase;

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
}
