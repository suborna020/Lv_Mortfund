<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;

    protected $fillable = ['method_id','member_id','transection_type','name','email','phone','address','amount','charge','campaign_author','campaign_id','status'];
}
