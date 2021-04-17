<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'name',
        'email',
        'phone',
        'address',
        'amount',
        'charge',
        'campaign_id',
        'payment_method',
    ];
}
