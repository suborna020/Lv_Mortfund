<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navmenu extends Model
{
    use HasFactory;

    public function submenus(){
    	return $this->hasMany('App\Models\Submenu','parent_menu')->where('status',1);
    }

    protected $fillable = [
        'menu_item',
        'parent',
        'status',
    ];

}
