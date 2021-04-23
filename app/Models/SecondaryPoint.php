<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryPoint extends Model
{
    use HasFactory;
    protected $table = 'secondary_points';
    protected $fillable = [
       
        'secondary_point',
        'column',
    ];
}
