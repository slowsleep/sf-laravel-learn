<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MathService;
use App\Services\MathServiceInterface;
use Illuminate\Contracts\Foundation\Application;

class MathServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // будет создаваться каждый раз новый экземпляр MathService
        // подключение реализации сервиса через замыкание обычно используют, если нужно при создании экземпляра вложить дополнительные параметры или зависимости
        // $this->app->bind(MathService::class, function (Application $app) {
        //     return new MathService();
        // });

        // будет вызываться каждый раз только один экземпляр MathService
        $this->app->singleton(MathServiceInterface::class, MathService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
