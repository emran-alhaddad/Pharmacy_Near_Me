<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'images',
        'license',
        'description',
        'zone_id',
        'created_at',
        'updated_at'

    ];
}
