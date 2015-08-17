<?php

namespace Rtler\BladeMacro\Html;


use Illuminate\Html\FormBuilder as Form;

class FormBuilder extends Form
{
    /**
     * Get the form action from the options.
     *
     * @param  array   $options
     * @return string
     */
    protected function getAction(array $options)
    {
        return $options['action'];
    }

    /**
     * Get the value that should be assigned to the field.
     *
     * @param  string  $name
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($name, $value = null)
    {
        return $value;
    }


}