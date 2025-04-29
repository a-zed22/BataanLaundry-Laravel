<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    use HasFactory;

    protected $table = 'orders';
    protected $casts = [
        'order_date' => 'datetime',
    ];



    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'total_quantity',
        'subtotal',
        'discount',
        'shipping_fee',
        'grand_total',
        'notes',
        'order_date',
        'payment_method',
        'payment_status',
        'delivery_address',
        'delivery_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class); // if order is fulfilled at a specific store
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot('quantity', 'price', 'discount', 'subtotal', 'shipping_fee')
            ->withTimestamps();
    }

    public function getComputedTotalAmountAttribute()
    {
        return $this->products->sum(function ($product) {
            return ($product->pivot->price ?? 0) * ($product->pivot->quantity ?? 0);
        });
    }

    public function getComputedGrandTotalAttribute()
    {
        $total = $this->computed_total_amount;
        $shipping = $this->shipping_fee ?? 0;
        $discount = $this->discount ?? 0;

        return $total + $shipping - $discount;
    }
}
