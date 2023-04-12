<?php

namespace App\Providers;

use App\View\Components\HorizontalLayout;
use App\View\Components\VerticalLayout1;
use App\View\Components\VerticalLayout2;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::component('vertical-layout-1', VerticalLayout1::class);
        Blade::component('vertical-layout-2', VerticalLayout2::class);
        Blade::component('horizontal-layout', HorizontalLayout::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
