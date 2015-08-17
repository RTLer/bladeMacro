# bladeMacro
macro extension for laravel blade.
it add macros to laravel blade that work just like html macro.

##installation
add this to your providers
```php
    'providers' => [
		...
        RTLer\BladeMacro\BladeMacroServiceProvider::class
		...
    ],
```

##usage
and register macroes using(for adding php code to view write it in string)
```php
      BladeMacro::macro('inputText', function ($arg1, $arg2, $arg3, $arg4) {
          return 'testing ' . $arg1 . ' ' . $arg2 . ' ' . $arg3 . ' ' . $arg4;
      });
```

and in view use it like this (macroName(arg1, arg2, ...)):
```php
    @macroInputText('name', 'value', 'label', 'options')
```

and becuse of that this code replase the return string of the BladeMacro::macro function and cache it, after changeing the macro
run the command 
```
php artisan view:clear
```

##contribute
i add Illuminate\Html to it (htmlName(arg1, arg2, ...),formName(arg1, arg2, ...)) but there is problem with form 
if you like to help fix form. 

