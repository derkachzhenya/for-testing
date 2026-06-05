<?php

namespace App\Providers;

use App\Contracts\Notifier;
use App\Services\LogNotifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Notifier::class, LogNotifier::class);
    }

    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction());
    }
}











