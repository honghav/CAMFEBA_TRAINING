<?php

namespace App\Providers;

use App\Repository\CategoryTrainingRepository;
use App\Repository\Interfaces\CategoryTrainingRepositoryInterface;
use App\Repository\Interfaces\SourceRepositoryInterface;
use App\Repository\Interfaces\TrainingRepositoryInterface;
use App\Repository\SourceRepository;
use App\Repository\TrainingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            CategoryTrainingRepositoryInterface::class,
            CategoryTrainingRepository::class
        );

        $this->app->bind(
            TrainingRepositoryInterface::class,
            TrainingRepository::class
        );

        $this->app->bind(
            SourceRepositoryInterface::class,
            SourceRepository::class
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
