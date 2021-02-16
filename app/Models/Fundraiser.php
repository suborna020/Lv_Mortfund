<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function members(){
        return $this->belongsTo('App\Models\Member','member_id');
    }

}
