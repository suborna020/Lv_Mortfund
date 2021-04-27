<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_video',
        'about_primary_title',
        'about_primary_text',
        'about_secondary_title',
        'secondary_text',
    ];
}
