<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use League\Fractal\Manager;
use League\Fractal\Serializer\JsonApiSerializer;

class FractalManagerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Manager::class, function ($app) {
            $baseUrl = app(Request::class)->getBaseURL();

            $manager = new Manager();
            $manager->setSerializer(new JsonApiSerializer($baseUrl));
            return $manager;
        });
    }
}
