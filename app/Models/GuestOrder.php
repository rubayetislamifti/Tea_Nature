<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestOrder extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'order_status',
        'delivary_date',
        'zip',
        'amount',
        'quantity',
        'payment_method',
        'sender_number',
        'status',
        'transaction_id',
        'invoice_id',
        'product_id'
    ];
}
