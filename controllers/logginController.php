<?php

require MODELS . 'userModel.php';

class LogginController extends Controller
{
    private $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UserModel;
    }

    function render()
    {
        $this->view->render('loggin/index');
    }

    static function userIsLogged() {
        if($_COOKIE['userId']) {
            return true;
        } else {
            return false;
        }
    }

    function loggin()
    {
        $user = $this->userModel->getByEmail($_POST['email']);

        if ($user) {
            $isPasswordCorrect = password_verify($_POST['password'], $user->password);
            if ($isPasswordCorrect) {
                setcookie("userId", $user->id, time() + 600, '/');
                header('Location: ' . BASE_PATH . 'character');
            } else {
                $this->view->render('loggin/index');
            }
        }
    }

    function logout()
    {
        unset($_COOKIE['userId']);
        header('Location: ' . BASE_PATH . 'loggin');
    }
}
