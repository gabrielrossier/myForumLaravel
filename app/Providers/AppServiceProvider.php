<?php

namespace App\Providers;

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
        $this->app->register(\KitLoong\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        $this->app->register(\Orangehill\iseed\IseedServiceProvider::class);
        $this->app->register(\Krlove\EloquentModelGenerator\Provider\GeneratorServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }
}
