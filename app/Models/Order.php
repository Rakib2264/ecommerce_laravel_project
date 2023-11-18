<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid',
        'shipping_phone',
        'shipping_city',
        'product_name',
        'quantity',
        'total_price',
    ];
}
