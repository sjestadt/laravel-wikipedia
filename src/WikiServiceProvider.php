<?php

namespace sjestadt\Larapedia;

use Illuminate\Support\ServiceProvider;

class WikiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     *  Publishes all the assets this package needs to function and load all routes
     * @return [type] [description]
     */
    public function boot()
    {
        $config = realpath(__DIR__.'/../resources/config/wiki.php');

        $this->publishes([
            $config => config_path('wiki.php')
        ]);
    }

    /**
     * Register the application services
     * @return void
     */
    public function register()
    {
        $this->app->bind('wiki', function(){
            return new Wiki(config('wiki'));
        });
    }

    /**
     * Get the services provided by the provider
     * @return array
     */
    public function provides()
    {
        return ['wiki'];
    }
}