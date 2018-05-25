<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdvertisementCommonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton('App\Core\Advertisement\Services\AdvertisementService', function(){
            dd('qwe');
            //return new SaveEloquent();
        });
    }

}