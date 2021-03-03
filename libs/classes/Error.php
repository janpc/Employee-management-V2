<?php

class ErrorDisplayer
{
    static function show($message){
        $errorView = new View;
        $errorView->data = $message;
        $errorView->render('error/index');
    }
}
