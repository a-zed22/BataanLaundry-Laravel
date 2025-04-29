<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'birthday',
        'bio',
        'profile_picture',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
