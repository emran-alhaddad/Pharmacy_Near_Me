<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;


    public function details()
    {
         return $this->hasMany(Request_Details::class,'request_id');
    }

    public function replies()
    {
         return $this->hasOne(Reply::class,'request_id');
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class,'pharmacy_id','user_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','user_id');
    }
}
