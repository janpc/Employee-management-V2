<?php

class App
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $urlParams = explode('/', $url);

        if (empty($urlParams[0])) {
            require CONTROLLERS . 'indexController.php';
            $controller = new IndexController();
            $controller->render();
            $controller->loadModel('index');
            return false;
        } else {
            $controllerPath = 'controllers/' . $urlParams[0] . 'Controller' . '.php';
        }

        if (file_exists($controllerPath) && $urlParams[0] != 'error') {
            require $controllerPath;
            $controllerName = $urlParams[0] . 'Controller';
            $controller = new $controllerName;
            $controller->loadModel($urlParams[0]);

            $nparam = sizeof($urlParams);
            if ($nparam == 1) {
                $controller->render();
            } else if ($nparam == 2) {
                $controller->{$urlParams[1]}();
            } else {
                $params = [];
                for ($i = 2; $i < $nparam; $i++) {
                    array_push($params, $urlParams[$i]);
                }
                $controller->{$urlParams[1]}($params);
            }
        }else if ($urlParams[0] == 'error'){
            new ErrorController();
        } else {
            $controller = new ErrorController();
        }
    }
}
