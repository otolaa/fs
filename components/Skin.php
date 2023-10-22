<?php

namespace Html\Components;


class Skin
{
    public static function render($tmp, $vars = []) {
        if (file_exists(DIR_ROOT.'/views/'.$tmp.'.tpl.php')) {
            ob_start();
            extract($vars);
            require_once (DIR_ROOT.'/views/'.$tmp.'.tpl.php');
            return ob_get_clean();
        }
    }
}