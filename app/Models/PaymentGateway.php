<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;
    protected $fillable = [
        'gateway_name',
        'gateway_photo',
        'min_limit',
        'max_limit',
        'charge',
        'rate',
        'link',
        'processing_time',
        'status',
    ];
}
