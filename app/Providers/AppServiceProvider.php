<?php

namespace App\Providers;

use App\Contracts\BankData\IBankDataInterface;
use App\Contracts\DisabledPerson\IDisabledPersonActionsInterface;
use App\Contracts\DisabledPerson\IDisabledPersonQueryInterface;
use App\Contracts\EducationPerson\IEducationPersonActionInterface;
use App\Contracts\EducationPerson\IEducationPersonQueryInterface;
use App\Contracts\OccupationPerson\IOccupationPersonActionInterface;
use App\Contracts\OccupationPerson\IOccupationPersonQueryInterface;
use App\Contracts\Person\IPersonRepository;
use App\Repository\BankData\BankDataRepository;
use App\Repository\DisabledPerson\DisabledPersonRepository;
use App\Repository\DisabledPerson\DisablePersonQueryRepository;
use App\Repository\EducationPerson\EducationPersonActionRepository;
use App\Repository\EducationPerson\EducationPersonQueryRepository;
use App\Repository\OccupationPerson\OccupationPersonQueryRepository;
use App\Repository\OccupationPerson\OccupationPersonRepository;
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
        // Disabled person
        $this->app->bind(IDisabledPersonActionsInterface::class, DisabledPersonRepository::class);
        $this->app->bind(IDisabledPersonQueryInterface::class, DisablePersonQueryRepository::class);
        // Occupation Person
        $this->app->bind(IOccupationPersonQueryInterface::class, OccupationPersonQueryRepository::class);
        $this->app->bind(IOccupationPersonActionInterface::class, OccupationPersonRepository::class);
        //Education Person
        $this->app->bind(IEducationPersonQueryInterface::class, EducationPersonQueryRepository::class);
        $this->app->bind(IEducationPersonActionInterface::class, EducationPersonActionRepository::class);

        // Bank Data
        $this->app->bind(IBankDataInterface::class, BankDataRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

    }
}
