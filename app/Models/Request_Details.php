<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Details extends Model
{
    use HasFactory;

    public function details()
    {
        $this->belongsTo(Request::class,'id');
    }
}
