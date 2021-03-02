<?php

class Api
{
    private $data;

    function __construct($urlParams)
    {
        if (empty($urlParams[1])) {
            //toDo Error
        } else {
            $controllerPath = 'controllers/' . $urlParams[1] . 'Controller' . '.php';
        }

        if (file_exists($controllerPath)) {
            require $controllerPath;
            $controllerName = $urlParams[1] . 'Controller';
            $controller = new $controllerName;
            $controller->loadModel($urlParams[1]);

            $nparam = sizeof($urlParams);
            if ($nparam == 2) {
                $this->data = $controller->api();
            } else {
                $params = [];
                for ($i = 2; $i < $nparam; $i++) {
                    array_push($params, $urlParams[$i]);
                }
                $this->data = $controller->api($params);
            }
        } else {
            //toDo Error
        }
    }

    function getData()
    {
        return $this->data;
    }
}
