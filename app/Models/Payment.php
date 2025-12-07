<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_method',
        'status',
        'amount',
        'payment_proof',
        'bank_name',
        'account_number',
        'account_name',
        'transaction_id',
        'notes',
        'paid_at',
    ];
    
    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
