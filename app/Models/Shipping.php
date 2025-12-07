<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'order_id',
        'tracking_number',
        'courier',
        'status',
        'shipped_date',
        'estimated_delivery_date',
        'delivered_date',
        'notes',
    ];
    
    protected $casts = [
        'shipped_date' => 'date',
        'estimated_delivery_date' => 'date',
        'delivered_date' => 'date',
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
