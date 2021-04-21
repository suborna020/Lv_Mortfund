<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLinkAbout extends Model
{
    use HasFactory;
    protected $table = 'footer_link_abouts';
    protected $fillable = [
        'footer_link_name',
        'link',
        'status',
    ];
}
