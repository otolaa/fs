<?php define('V_FS', '0.0.3');

use Html\Components\Router;

// 0.0 - setting error message
ini_set('display_errors',1);
error_reporting(E_ALL);

// 1.0 - include files
define('DIR_ROOT', __DIR__.'/..');
require_once (DIR_ROOT.'/components/Autoload.php');

// 2.0 - db postgres
require_once (DIR_ROOT.'/database/Connection.php');

// 3.0 - return router
$router = new Router();
$router->run();