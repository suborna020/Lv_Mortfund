<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','payment_method_id'];

    public function PaymentGateways(){
        return $this->belongsTo('App\Models\PaymentGateway','payment_method_id');
    }
}
