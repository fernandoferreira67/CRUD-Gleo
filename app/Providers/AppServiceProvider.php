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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Faker->Locale('pt-Br')
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('pt_BR');
        });
    }
}
