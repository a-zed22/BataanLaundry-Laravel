<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_number',
        'product_brand',
        'product_price',
        'product_sku',
        'stock_quantity',
        'availability',
        'product_status',
        'product_description',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot('quantity', 'price', 'discount', 'subtotal', 'shipping_fee')
            ->withTimestamps();
    }
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'product_warehouses')->withPivot('quantity', 'stock_status', 'restock_date', 'location')->withTimestamps();
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'product_suppliers')->withTimestamps();
    }
}
