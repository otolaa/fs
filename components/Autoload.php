<?php

spl_autoload_register(function ($class)
{
    $e_c = explode('\\', $class);
    $class_name = $e_c[count($e_c)-1];

    $arr_path = [
        '/components/',
        '/controllers/',
        '/models/',
    ];

    foreach ($arr_path as $path) {
        $path_class = __DIR__.'/..'.$path.$class_name.'.php';
        if (is_file($path_class))
            include_once $path_class;
    }
});