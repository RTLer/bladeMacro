<?php

namespace Rtler\BladeMacro;


class BladeMacro
{
    use Macroable;

    /**
     * register `@macro` tag
     */
    public static function register()
    {
        // @macro
        \Blade::extend(function ($view) {

            $pattern = '/@macro::([^(\s]+)\( ?[\'"]([^\'"]+)[\'"] ?, ?[\'"]([^\'"]+)[\'"] ?, ?[\'"]([^\'"]+)[\'"] ?, ?[\'"]([^\'"]+)[\'"] ?\)/';

            // @input::inputText('name', 'label', 'value', 'options');
            while (preg_match($pattern, $view, $macro)) {
                // $macro = Array ( [0] => @macro::inputText('name', 'label', 'value', 'options') [1] => inputText [2] => name [3] => label [4] => value [5] => options )
                if (self::hasMacro($macro[1])) {

                    $macroOutText = call_user_func_array('self::' . $macro[1], array_slice($macro, 2));
                } else {
                    $macroOutText = substr($macro[0], 1);
                }

                $view = preg_replace($pattern, $macroOutText, $view, 1);
            }

            return $view;
        });
    }

}
