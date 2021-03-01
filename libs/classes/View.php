<?php

class View
{
    public $data;
    function render($nombre)
    {
        require 'views/' . $nombre . '.php';
    }
}
