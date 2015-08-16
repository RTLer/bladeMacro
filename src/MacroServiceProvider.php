<?php

namespace Rtler\BladeMacro;

use Illuminate\Html\FormBuilder;
use Illuminate\Html\HtmlBuilder;
use Request;
use Illuminate\Routing\RouteCollection;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $request = new Request();
        $routeCollection = new RouteCollection();
        $urlGenerator = new UrlGenerator($routeCollection,$request);
        $csrfToken = csrf_token();
        $htmlBuilder = new HtmlBuilder($urlGenerator);
        $formBilder = new FormBuilder($htmlBuilder,$urlGenerator,$csrfToken);
        $html = get_class_methods('\Illuminate\Html\HtmlBuilder');
        $form = get_class_methods('\Illuminate\Html\FormBuilder');
        foreach ($html as $method) {
            if (substr($method, 0, 2) !== '__') {
                BladeMacro::macro($method, [$htmlBuilder, $method],'html');
            }
        }
        foreach ($form as $method) {
            if (substr($method, 0, 2) !== '__') {
                BladeMacro::macro($method, [$formBilder, $method],'form');
            }
        }

    }
}
