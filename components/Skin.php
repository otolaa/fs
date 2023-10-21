<?php

namespace Html\Components;


class Skin
{
    public static function render($tmp, $vars = []) {
        if (file_exists(__DIR__.'/../views/'.$tmp.'.tpl.php')) {
            ob_start();
            extract($vars);
            require_once (__DIR__.'/../views/'.$tmp.'.tpl.php');
            return ob_get_clean();
        }
    }
}