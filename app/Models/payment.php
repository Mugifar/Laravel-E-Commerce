<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable=[

        'user_id',
        'payment_id',
        'name',
        'address',
        'number',
        'product_name',
        'product_amount',
        'payment_status',
     ];
}
