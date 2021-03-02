<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','story','member_id','title','benificiary_name','needed_amount','deadline','thumbnail','photo','video','proof_document'];

    public function categories(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function members(){
        return $this->belongsTo('App\Models\User','member_id');
    }

    public function transections(){
        return $this->hasMany('App\Models\Transection','campaign_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment','campaing_id');
    }

}
