<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function requests()
    {
        return $this->hasMany(Request::class,'client_id','user_id');
    }
}
