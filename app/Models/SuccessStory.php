<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','title','author_name','author_photo','story','photo','status'];
}
