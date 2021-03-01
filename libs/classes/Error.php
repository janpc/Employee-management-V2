<?php
class Error
{
    static function show($message){
        require VIEWS . 'error/index.php';
    }
}
