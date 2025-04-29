<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'contact_person',
        'supplier_number',
        'supplier_email',
        'supplier_address',
        'tax_id',
        'supplier_status',
        'supplier_logo',
        'notes',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_suppliers')->withTimestamps();
    }
}
