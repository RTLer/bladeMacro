<?php

namespace Rtler\BladeMacro\Html;


use Illuminate\Html\HtmlBuilder as Html;

class HtmlBuilder extends Html
{
    /**
     * Generate a HTML link.
     *
     * @param  string $url
     * @param  string $title
     * @param  array $attributes
     * @param  bool $secure
     * @return string
     */
    public function link($url, $title = null, $attributes = [], $secure = null)
    {

        if (is_null($title) || $title === false) {
            $title = $url;
        } else {
            $this->entities($title);
        }

        return '<a href="' . phpEcho($url) . '"' . $this->attributes($attributes) . '>' . $title . '</a>';
    }

    /**
     * Build a single attribute element.
     *
     * @param  string  $key
     * @param  string  $value
     * @return string
     */
    protected function attributeElement($key, $value)
    {
        if (is_numeric($key) && ! is_null($value)) return $value;

        if ( ! is_null($value)) return $key.'="'.e($value).'"';
    }

    public function phpEcho($code)
    {
        return '<?php echo ' . $code . ' ?>';
    }

}