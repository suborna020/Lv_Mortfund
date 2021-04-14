<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'company_name',
        'image_size',
        'link',
        'impression',
        'no_of_clicks',
    ];
}
