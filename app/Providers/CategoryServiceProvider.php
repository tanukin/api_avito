<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Core\Category\Interfaces\CategoryServiceInterface',
            'App\Core\Category\Services\CategoryService'
        );
        $this->app->bind(
            'App\Core\Category\Interfaces\RepositoryInterface',
            'App\Core\Category\Repository\CategoryRepository'
        );
    }
}
