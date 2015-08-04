# bladeMacro
macro extension for laravel blade.
it add macros to laravel blade that work just like html macro.
add this to your providers
```php
    'providers'       => [
			...
        App\Zarinpal\Macro\BladeMacroServiceProvider::class
			...
    ],
```

and register macroes using

```php
    BladeMacro::macro('inputText',function($arg1,$arg2,$arg3,$arg4){
         return'testing '.$arg1.' '.$arg2.' '.$arg3.' '.$arg4;
    });
```

and in view use it like this:
```php
    @macro::inputText('name','value', 'label' , 'options')
```
