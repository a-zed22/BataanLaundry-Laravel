<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = [
        'store_name', 'store_location', 'store_contact', 'store_email'
    ];    
    
    public function user()
    {
        return $this->belongsTo(User::class); // if store is customer-linked
    }

    public function orders()
    {
        return $this->hasMany(Order::class); // if orders are fulfilled at this store
    }
}
