<?php

class ErrorController extends Controller
{

    function render()
    {
    }

    static function renderError($message) {
        $errorView = new View;
        $errorView->data = $message;
        $errorView->render('error/index');
    }
}
