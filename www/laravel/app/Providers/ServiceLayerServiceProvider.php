<?php

namespace App\Providers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Services\GenreService;
use App\Services\Interfaces\AuthorServiceInterface;
use App\Services\Interfaces\BookServiceInterface;
use App\Services\Interfaces\GenreServiceInterface;
use App\Services\Interfaces\TakeBookServiceInterface;
use App\Services\TakeBookService;
use Illuminate\Support\ServiceProvider;

class ServiceLayerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthorServiceInterface::class,
            AuthorService::class
        );

        $this->app->bind(
            GenreServiceInterface::class,
            GenreService::class
        );

        $this->app->bind(
            BookServiceInterface::class,
            BookService::class
        );

        $this->app->bind(
            TakeBookServiceInterface::class,
            TakeBookService::class
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
