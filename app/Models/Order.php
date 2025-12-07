<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'customer_id',
        'subtotal',
        'tax',
        'shipping_cost',
        'total',
        'total_amount',
        'status',
        'payment_status',
        'payment_method',
        'shipping_address',
        'shipping_name',
        'shipping_phone',
        'shipping_city',
        'shipping_postal_code',
        'notes',
        'order_date',
        'delivery_date',
    ];
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    
    public function shipping()
    {
        return $this->hasOne(\App\Models\Shipping::class);
    }
    
    public function payment()
    {
        return $this->hasOne(\App\Models\Payment::class);
    }
}
