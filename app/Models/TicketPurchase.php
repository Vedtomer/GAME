<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPurchase extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Ticket_purchase';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_number',
        'drawtime',
        'qty',
        'total',
        'user_id',
        'points',
        'is_result_declared'
        // Add other fields you want to mass assign
    ];

   
    public function barcodes()
    {
        return $this->hasMany(Barcode::class, 'user_id', 'id');
    }

}
