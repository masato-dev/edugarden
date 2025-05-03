<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'payment_method',
        'payment_status',
        'delivery_status',
        'user_id',
        'total',
        'user_address_id',
        'special_request',
        'is_export_invoice',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
