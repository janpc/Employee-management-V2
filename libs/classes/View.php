<?php

class View
{
    public $data;
    function render($name)
    {
        require VIEWS  . $name . '.php';
    }
}
