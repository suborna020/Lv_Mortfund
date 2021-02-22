<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdSuccessStories extends Controller
{
    public function adCategory(){
        return view('admin.pages.SuccessStories.adCategory');
    }
    public function adStories(){
        return view('admin.pages.SuccessStories.adStories');
    }
}
