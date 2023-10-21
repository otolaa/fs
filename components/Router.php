<?php

namespace Html\Components;


class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->routes = include (DIR_ROOT.'/config/routers.php');
    }

    private function getUrl()
    {
        if (!empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $url = $this->getUrl();
        try {

            foreach ($this->routes as $up=>$route) {
                if (preg_match("~$up~", $url)) {
                    //
                    $internalRoute = preg_replace("~$up~", $route, $url);

                    //
                    $segments = explode('/', $internalRoute);

                    $controllerName = array_shift($segments).'Controller';
                    $controllerName = ucfirst($controllerName);

                    $actionName = 'action'.ucfirst(array_shift($segments));
                    $params = $segments;

                    // include
                    $controllerFile = DIR_ROOT.'/controllers/'.$controllerName.'.php';

                    if (file_exists($controllerFile))
                        include_once ($controllerFile);

                    $controllerNameClass = "Html\\Controllers\\".$controllerName;

                    $controllerObj = new $controllerNameClass();
                    if (method_exists($controllerObj, $actionName)) {
                        $result = call_user_func_array([$controllerObj, $actionName], array_values($params));
                    } else $result = null;

                    if ($result != null)
                        break;
                }
            }

        } catch (\Exception $e) {
            echo $e->getMessage(); // return 404
        }
    }

}