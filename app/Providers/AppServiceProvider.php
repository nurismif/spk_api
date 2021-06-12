<?php

namespace App\Providers;

use App\Http\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;

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
        // Remove wrapping resources
        UserResource::withoutWrapping();

        if (!App::environment('local')) {
            URL::forceScheme('https');
        }
    }
}
