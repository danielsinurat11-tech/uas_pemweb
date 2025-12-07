<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'material_description',
        'color',
        'city',
        'type',
        'price',
        'discount_price',
        'category',
        'category_id',
        'image',
        'image_2',
        'image_3',
        'stock',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_active' => 'boolean',
    ];

    public function getCategoryNameAttribute()
    {
        return match($this->category) {
            'bunga' => 'Bunga',
            'aksesoris' => 'Aksesoris',
            'gift_set' => 'Gift Set',
            default => $this->category,
        };
    }
    
    public function ratings()
    {
        return $this->hasMany(\App\Models\ProductRating::class);
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function getAverageRatingAttribute()
    {
        $avg = $this->ratings()->avg('rating');
        return $avg ? round($avg, 1) : 0;
    }
    
    public function getTotalSoldAttribute()
    {
        try {
            if (!class_exists(\App\Models\OrderItem::class)) {
                return 0;
            }
            return OrderItem::where('product_id', $this->id)
                ->whereHas('order', function($query) {
                    $query->whereIn('status', ['processing', 'shipped', 'delivered']);
                })
                ->sum('quantity') ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }
}

