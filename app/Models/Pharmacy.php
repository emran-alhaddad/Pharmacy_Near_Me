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


    public function zone()
    {
        return $this->hasMany(zone::class, 'zone_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
