<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use Route;
use View;

class LayoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('panel.*', function ($view) {

            $route = Route::current() ? Route::current()->getName() : '';

            $view->with([
                 'route_name' => $route,
            ]);
        });

    }
}
