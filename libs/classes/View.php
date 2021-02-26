<?php

class View
{

    static function render($nombre)
    {
        require 'views/' . $nombre . '.php';
    }
}
