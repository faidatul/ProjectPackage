<?php

namespace CardMaker;

use Illuminate\Support\ServiceProvider;

class CardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublishables();
    }
    
    private function registerPublishables()
    {
        $basePath = dirname(__DIR__);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom( path:  __DIR__ . '/route/web.php');
        $this->loadViewsFrom( path:  __DIR__ . '/views', namespace: 'CardMaker');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/courier'),
        ]);
    }

}
