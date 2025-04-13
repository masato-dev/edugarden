<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'book_id',
        'quantity',
        'user_id',
    ];

    public function user(): HasOne {
        return $this->hasOne(User::class);
    }

    public function book(): BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
