<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;

    public function Members(){
        return $this->belongsTo('App\Models\User','user');
    }
}
