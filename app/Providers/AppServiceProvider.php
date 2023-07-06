<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{SuporteRepositorioInterface, SuporteEloquentORM};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SuporteRepositorioInterface::class, 
            SuporteEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
