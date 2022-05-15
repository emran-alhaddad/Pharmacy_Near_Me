<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Advertising extends Model 
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'admin_id',
        'descripe',
       
        'image',
        'url',
        'is_active',
        'position',
        'startAt',
        'endAt',
        
    ];
}
