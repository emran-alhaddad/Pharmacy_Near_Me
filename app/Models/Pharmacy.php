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

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function zone()
    {
        return $this->belongsTo(zone::class,'zone_id');
    }

    public function requests()
    {
        return $this->hasMany(Request::class,'pharmacy_id','user_id');
    }
}
