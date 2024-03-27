<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Service;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts_front.header', function ($view) {
            $services = Service::take(7)->get();
            $view->with('services', $services);
        });
        View::composer('admin.service.show', function ($view) {
            $madiou = Service::take(7)->get();
            $view->with('madiou', $madiou);
        });
    }
}
