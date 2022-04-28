<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply_Details extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'request_details_id',
        'drug_price',
        'alt_drug_image',
        'alt_drug_title',
        'alt_drug_price',
        'state'
    ];

}
