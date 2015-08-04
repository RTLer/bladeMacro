<?php

namespace Rtler\BladeMacro;


use Illuminate\Support\ServiceProvider;

class BladeMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        BladeMacro::register();
    }
}
