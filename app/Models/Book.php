<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'price',
        'rating',
        'buy_quantity',
    ];
}
