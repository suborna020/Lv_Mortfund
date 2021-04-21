<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer_link_category extends Model
{
    use HasFactory;
    protected $table = 'footer_link_categories';
    protected $fillable = [
        'footer_link_name',
        'link',
        'status',
    ];
}
