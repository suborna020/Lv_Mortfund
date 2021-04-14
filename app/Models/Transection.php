<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;


protected $fillable = ['method_id','member_id','transection_type','name','email','phone','address','amount','charge','campaign_author','campaign_id','status'];

    public function Members(){
        return $this->belongsTo('App\Models\User','member_id');
    }

    public function paymentmthods(){
        return $this->belongsTo('App\Models\PaymentGateway','method_id');
    }
 
}
