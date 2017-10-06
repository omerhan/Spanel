<?php

namespace Omerhan\Spanel;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SpanelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'spanel');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->app['router']->aliasMiddleware('roles', 'Omerhan\Spanel\Http\Middleware\CheckRole');
        //$this->publishes([__DIR__.'/resources/assets' => public_path('assets/')], 'spanel');
        //$this->publishes([__DIR__.'/resources/views/auth' => resource_path('views/auth')], 'spanel');
        //$this->publishes([__DIR__.'/resources/lang' => resource_path('lang')], 'spanel');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('spanel', function ($app) {
            return new SpanelClass;
        });
        $this->mergeConfigFrom(
            __DIR__.'/config/spanel.php', 'spanel'
        );

        //$this->app->make('omerhan\spanel\Http\Controllers\SpanelController');
    }
}
