<?php

namespace Test\wfx;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class WfxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/wfxcurd'),  // 发布视图目录到resources 下
            __DIR__.'/controller' => app_path('Http/Controllers/Curd'),  // 发布视图目录到resources 下
            __DIR__.'/model' => app_path('Curd/'),  // 发布视图目录到resources 下
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
//        Route::get('wfxcurd',function (){
//            return view('wfxcurd.curd');
//        });
//        Route::post('wfxaddcurd','Curd\CurdController@getdata');
        $this->app->singleton('wfx',function (){
           return new Wfx();
        });
    }
}
