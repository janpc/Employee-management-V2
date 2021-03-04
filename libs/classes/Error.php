<?php

class ErrorDisplayer
{
    private static $messages = [];

    static function render() {
        $errorView = new View;
        $errorView->data = self::$messages;
        $errorView->render('error/index');
    }

    static function add($message)
    {
        array_push(self::$messages, $message);
    }
}
