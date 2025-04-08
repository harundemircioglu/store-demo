<?php

namespace Modules\Log\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Log\Services\Logger;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void {
        $this->app->singleton(Logger::class, function ($app) {
            return new Logger();
        });
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
