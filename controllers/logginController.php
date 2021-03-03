<?php

class LogginController extends Controller
{
    function loadModel($model){
        $path = 'models/'.$model.'Model.php';

        if(file_exists($path)){
            require $path;
            
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function render()
    {
        $this->view->render('loggin/index');
    }

    function loggin()
    {
        $isLogged = $this->model->compare($_POST['email'], $_POST['password']);

        if ($isLogged === true) {
            header('Location: ' . BASE_PATH . 'character');
        } else {
            header('Location: ./');
        }
    }

    function logout()
    {
        $isOut = $this->model->out();

        if ($isOut) {
            header('Location: ' . BASE_PATH . 'loggin');
        } else {
            header('Location: ./');
        }
    }
}
