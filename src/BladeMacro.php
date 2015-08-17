<?php

namespace Rtler\BladeMacro;


class BladeMacro
{
    protected static $macroName = 'macro';

    /**
     * Register a custom macro(directive).
     *
     * @param  string $name
     * @param  callable $macro
     * @param null $prefix
     */
    public static function macro($name, callable $macro, $prefix = null)
    {
        if (empty($prefix)) {
            $prefix = self::$macroName;
        }
        \Blade::directive($prefix . ucwords($name), function ($argsString = '()') use ($macro) {
            $args = [];
            eval('$args = \Rtler\BladeMacro\BladeMacro::argsToArray' . $argsString . ';');
            return call_user_func_array($macro, $args);

        });
    }

    public static function argsToArray()
    {
        return func_get_args();
    }
}
