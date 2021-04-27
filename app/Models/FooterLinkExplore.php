<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLinkExplore extends Model
{
    use HasFactory;
    protected $table = 'footer_link_explores';
    protected $fillable = [
        'footer_link_name',
        'link',
        'status',
    ];
}
