<?php

namespace App\Providers;

use App\Contracts\Notifier;
use App\Services\FakeEmailNotifier;
use App\Services\LogNotifier;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(Notifier::class, FakeEmailNotifier::class);
        $this->app->bind(Notifier::class, LogNotifier::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
