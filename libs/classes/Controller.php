<?php

abstract class Controller {

    function __construct(){
        $this->view = new View;
    }
    abstract function render();

    function loadModel($model){
        $path = 'models/'.$model.'Model.php';

        if(file_exists($path)){
            require $path;
            
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}
