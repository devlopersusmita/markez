<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
     protected $fillable = [
        'payment_id',
        'order_id',
        'status',
        'amount',
        'fee',
        'currency',
        'refunded_at',
        'captured',
        'captured_at',
        'voided_at',
        'description',
        'amount_format',
        'fee_format',
        'refunded_format',
        'captured_format',
        'ip',
        'created_at',
        'updated_at',
        'user_id',
        'institution_id',
        'payment_type'

    ];

}
