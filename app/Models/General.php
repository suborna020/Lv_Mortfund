<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_logo',
        'short_note_1',
        'short_note_2',
        'website_favicon',
        'website_title',
        'base_currency_text',
        'base_currency_symbol',
        'website_email',
        'website_phone',
    ];
    
}
