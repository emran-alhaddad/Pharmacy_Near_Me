<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingOwner extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
