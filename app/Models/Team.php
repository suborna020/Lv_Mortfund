<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'member_name',
        'member_designation',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',

    ];
}
