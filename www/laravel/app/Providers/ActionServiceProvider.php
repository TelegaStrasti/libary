<?php

namespace App\Providers;

use App\Actions\Auth\RegisterAction;
use App\Actions\Interfaces\Auth\RegisterActionInterface;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            RegisterActionInterface::class,
            RegisterAction::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
