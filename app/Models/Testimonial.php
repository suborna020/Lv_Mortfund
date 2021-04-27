<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_name',
        'designation',
        'company_name',
        'authors_text',
        'photo',
        'status',

    ];
}
