<?php

use Html\Components\Router;

// 0.0 - setting error message
ini_set('display_errors',1);
error_reporting(E_ALL);

// 1.0 - include files
define('DIR_ROOT', __DIR__.'/..');
require_once (DIR_ROOT.'/components/Router.php');
require_once (DIR_ROOT.'/components/Skin.php');

// 2.0 - db postgres
require_once (DIR_ROOT.'/database/Connection.php');
require_once (DIR_ROOT.'/models/NewsModel.php');
require_once (DIR_ROOT.'/models/LinksModel.php');

// 3.0 - return router
$router = new Router();
$router->run();