<?php

namespace App\Providers;

use App\Http\Controllers\GeneralBundle\Model\City;
use App\Http\Controllers\RestaurantBundle\Model\Category;
use App\Http\Controllers\RestaurantBundle\Model\RestaurantType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
