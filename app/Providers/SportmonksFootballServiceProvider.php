<?php

namespace App\Providers;

use App\Services\SportmonksFootball\Client;
use Illuminate\Support\ServiceProvider;

class SportmonksFootballServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(
                uri: config('services.sportmonks-football.uri'),
                token: config('services.sportmonks-football.token'),
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
