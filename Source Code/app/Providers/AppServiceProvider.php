<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\tbl_ykien;

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
        //
        view()->composer('layout/menu',function($view){
            $ykien=tbl_ykien::all();
            $view->with('ykien',$ykien);
        });
    }
}
