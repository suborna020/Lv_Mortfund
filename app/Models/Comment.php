<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['campaing_id','member_id','comment','parent'];

    public function members(){
        return $this->belongsTo('App\Models\User','member_id');
    }

    public function repliedMembers(){
        return $this->belongsTo('App\Models\User','parent');
    }
}
