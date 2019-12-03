<?php

namespace App\Providers;

use App\Services\KafkaService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->singleton(KafkaService::class, function () {
            return new KafkaService();
        });
        $this->app->alias(KafkaService::class,'kafkaService');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
