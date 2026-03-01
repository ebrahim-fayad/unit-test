<?php

namespace App\Providers;

use App\Console\Commands\MakeSmokeTestCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->extend('command.make.test', function () {
            return new MakeSmokeTestCommand($this->app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
