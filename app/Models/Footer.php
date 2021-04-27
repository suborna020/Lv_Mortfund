<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'footers';
    protected $fillable = [
        'footer_logo_content_primary',
        'footer_logo_content_secondary',
        'copyright_text',
        'follow_text',
    ];
}
