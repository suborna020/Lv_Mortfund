<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Carbon;
use Illuminate\Http\Request;
use Session;
use Validator;
use App\Models\Admin;
use App\Models\Fundraiser;
use App\Models\Category;
use App\Models\SuccessStory;
use App\Models\WithdrawRequest;


use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view){
            // for admin views after login
            if(Session::get('admin_session')){
                $user_id=Session::get('admin_session');
                $userInfoBox=Admin::findOrFail($user_id);
                $FundraisersBox = Fundraiser::all();
                $CategoriesBox = Category::all();
                $successStoriesBox = SuccessStory::all();
                $WithdrawRequestsBox=WithdrawRequest::all();
    
                $view->with('userInfoBox',$userInfoBox)
                ->with('FundraisersBox',$FundraisersBox)
                ->with('CategoriesBox',$CategoriesBox)
                ->with('successStoriesBox',$successStoriesBox)
                 ->with('WithdrawRequestsBox',$WithdrawRequestsBox)
                ;
            }
            // $FundraisersBox = Fundraiser::all();
            // dd($FundraisersBox);
            // // $user = JWTAuth::user();
            // // // $userDriveData = getUsersAllFolder(session('user_id'));
            // // $userDriveData = allFolderAllFile(session('user_id'));
            // // $allFolders = getUsersAllFolder(session('user_id'));
            // // // dd($allFolders);
            // // $view->with('token', session('token'));
            // $view->with('FundraisersBox',$FundraisersBox);
            // // $view->with('driveData',$userDriveData);
            // // $view->with('allFolders',$allFolders);
        });
    }
}
