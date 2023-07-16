<?php

namespace App\Providers;

use App;
use App\Model\Page;
use App\Model\Setting;
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

        View::composer('front.*', function ($view) {

            $shared['locale'] = app()->getLocale();
            $shared['settings'] = new Setting();
            $shared['header_pages'] = Page::query()->where('show_in_header', true)->with('translations')->get();
            $shared['footer_pages'] = Page::query()->where('show_in_footer', true)->with('translations')->get();

            $view->with($shared);
        });

    }
}
