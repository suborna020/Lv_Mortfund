<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// must added 
use Artisan;

class CachesController extends Controller
{
    public function cachesM(){
        Artisan::call('config:cache');
        echo "Config cached </br>";
        Artisan::call('route:cache');
        echo "route cached </br>";
        Artisan::call('optimize');
        echo "optimized";
    }
    public function clearCachesM(){
        Artisan::call('config:clear');
        echo "Config cleared </br>";
        Artisan::call('route:clear');
        echo "route cleared </br>";
        Artisan::call('cache:clear');
        echo "cache cleared </br>";
        Artisan::call('view:clear');
        echo "view cleared ";
    }
}
