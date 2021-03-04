<?php

abstract class Controller
{

    protected $view;

    function __construct()
    {
        $this->view = new View;
    }
    abstract function render();

    public static function getController($name)
    {
        if (file_exists(CONTROLLERS . $name . 'Controller.php')) {
            require CONTROLLERS . $name . 'Controller.php';
            $controllerName =  $name . 'Controller';
            return new $controllerName;
        } else {
            return false;
        }
    }
}
