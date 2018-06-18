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
            \App\Core\Category\Interfaces\CategoryServiceInterface::class,
            \App\Core\Category\Services\CategoryService::class
        );
        $this->app->bind(
            \App\Core\Category\Interfaces\RepositoryInterface::class,
            \App\Core\Category\Repository\CategoryRepository::class
        );
    }
}
