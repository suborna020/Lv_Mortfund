<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdLanguageManager extends Controller
{
    public function adLanguageManager(){
        return view('admin.pages.LanguageManager.adLanguageManager');
    }
}
