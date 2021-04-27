<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignupLoginView extends Model
{
    use HasFactory;
    protected $table = 'signup_login_views';
    protected $fillable = [
        'login_title',
        'login_text',
        'signup_title',
        'signup_text',
    ];
}
