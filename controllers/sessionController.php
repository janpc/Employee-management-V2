<?php
class SessionController extends Controller
{

    function __construct()
    {
        if ($userId = $_COOKIE["userEmail"]) {
            return true;
        }

        return false;
    }

    function render()
    {
    }
}
