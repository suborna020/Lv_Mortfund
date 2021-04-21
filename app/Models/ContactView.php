<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactView extends Model
{
    use HasFactory;
    protected $table = 'contact_views';
    protected $fillable = [
        'contact_title',
        'contact_text',
        'contact_email',
        'contact_number',
        'contact_hours',
        'contact_location',
    ];
}
