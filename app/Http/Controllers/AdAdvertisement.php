<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdAdvertisement extends Controller
{
    public function adAdvertisement(){
        return view('admin.pages.Advertisement.adAdvertisement');
    }
}
