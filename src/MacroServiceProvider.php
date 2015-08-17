<?php

namespace Rtler\BladeMacro;

use Illuminate\Support\ServiceProvider;
use Rtler\BladeMacro\Html\FormBuilder;
use Rtler\BladeMacro\Html\HtmlBuilder;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $urlGenerator = app()->url;
        $csrfToken = csrf_token();
        $htmlBuilder = new HtmlBuilder($urlGenerator);
        $formBilder = new FormBuilder($htmlBuilder, $urlGenerator, $csrfToken);

        $this->registerMethods('Rtler\BladeMacro\Html\HtmlBuilder', $htmlBuilder, 'html');
        $this->registerMethods('Rtler\BladeMacro\Html\FormBuilder', $formBilder, 'form');
    }

    /**
     * @param $class
     * @param $obj
     * @param $prefix
     */
    protected function registerMethods($class, $obj, $prefix)
    {
        $methodsList = get_class_methods($class);

        foreach ($methodsList as $method) {
            if (substr($method, 0, 2) !== '__') {
                BladeMacro::macro($method, [$obj, $method], $prefix);
            }
        }
    }
}
