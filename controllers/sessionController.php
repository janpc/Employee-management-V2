<?php
class SessionController
{
    static function checkSession() {
        if(!self::userIsLogged() && $_SERVER['QUERY_STRING'] !== "url=loggin") {
            //header('Location: ' . BASE_PATH . 'loggin');
        }
    }

    private static function userIsLogged()
    {
        return isset($_COOKIE["userId"]);
    }
}
