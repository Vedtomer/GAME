<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TicketPurchase;

class Barcode extends Model
{
    use HasFactory;
    protected $fillable = ['drawtime', 'requestid', 'qty', 'points', 'winpoints', 'status', 'barcode', 'updated_at', 'created_at'];



    public function ticketPurchases()
    {
        return $this->hasMany(TicketPurchase::class, 'barcode_id', 'id');
    }
}
