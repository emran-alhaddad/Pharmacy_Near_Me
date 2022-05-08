<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'state'
    ];

    public function details()
    {
         return $this->hasMany(Reply_Details::class,'reply_id');
    }

    public function request()
    {
        $this->belongsTo(Request::class,'request_id');
    }

}
