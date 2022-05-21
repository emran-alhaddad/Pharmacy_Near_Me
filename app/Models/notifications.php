<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'type',
    ];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class,'pharmacy_id','user_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','user_id');
    }

}
