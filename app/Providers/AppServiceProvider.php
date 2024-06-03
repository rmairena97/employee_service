<?php

namespace App\Providers;

use App\Contracts\Person\IPersonRepository;
use App\Repository\PersonRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(IPersonRepository::class, PersonRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

    }
}
