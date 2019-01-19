<?php

namespace Xindefeixiang;

use Carbon\Laravel\ServiceProvider;
use Xindefeixiang\Feixiang;
class WuFeixiangServiceProvider extends ServiceProvider
{

    public function boot()
    {
        return Feixiang::name();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wfx',function($app){
            return new Feixiang($app);
        });
    }
}
