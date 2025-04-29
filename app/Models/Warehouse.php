<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'name',
        'location',
        'capacity',
        'contact_number',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_warehouses')->withPivot('quantity', 'stock_status', 'restock_date', 'location')->withTimestamps();
    }
}
