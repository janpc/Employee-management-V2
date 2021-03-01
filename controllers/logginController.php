<?php

class LogginController extends Controller
{

    function render()
    {
        $this->view->render('loggin/index');
    }

    function loggin(){
        $isLogged = $this->model->compare($_POST['email'], $_POST['password']);

        if($isLogged === true){
            header('Location: ' . BASE_PATH . 'character');
        }else{
            header('Location: ./');
        }
    }

    function logout(){
        $isOut = $this->model->out();

        if($isOut){
            header('Location: '. BASE_PATH . 'loggin');
        }else{
            header('Location: ./');
        }
    }


}

/* require('loginManager.php');

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($email)) {
    $hasLoggedIn = logIn($email, $password);
    if ($hasLoggedIn) {
        header('Location: ../dashboard.php');
    } else {
        header('Location: ../../index.php?error=true');
    }
} else {
    $hasLoggedOut = logOut();
    header('Location: ../../index.php');
} */
