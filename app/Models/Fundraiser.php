<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','member_id','location','title','icon','benificiary_name','needed_amount','raised','deadline','story','thumbnail','thumbnail_path','photo','photo_path','video','video_path','proof_document','proof_document_path','status','private','recent','urgent','featured','project_support' , 'comments_count'];

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
        return $this->hasMany('App\Models\Comment','campaing_id')->orderBy('id','DESC');
    }

    public function repliedMembers(){
        return $this->belongsTo('App\Models\User','parent');
    }

}
