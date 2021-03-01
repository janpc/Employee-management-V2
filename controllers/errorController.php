<?php

class ErrorController extends Controller
{

    function render()
    {
    }

    function __construct()
    {

        parent::__construct();

        if (isset($_COOKIE['error'])) {

            $this->view->data = $_COOKIE["error"];

            unset($_COOKIE['error']);
            setcookie('error', null, -1, '/');
        } else {
            $this->view->data = 'Page not found';
        }

        $this->view->render('error/index');
    }
}
