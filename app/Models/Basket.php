<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table='basket';
    protected $fillable = [
        'user_id',
        'product_id',
        'title',
        'image',
        'price',
    ];
    use HasFactory;
}
