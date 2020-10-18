<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Modules\Setting\Entities\Setting;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['auth.login','includes.admin.head','includes.admin.header'], function ($view) {
            $setting=Setting::first();
            $view->with('setting',$setting);
        });
    }
}
