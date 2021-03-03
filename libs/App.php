<?php

require UTIL . 'Array.php';

class App
{
    private $urlParams;
    private $urlQueries;

    public function __construct()
    {
        parse_str($_SERVER['QUERY_STRING'], $this->urlQueries);
        $url =  rtrim($this->urlQueries['url'], '/');
        $this->urlParams = explode('/', $url);
        unset($this->urlQueries['url']);
    }

    public function enroute() {
        if (empty($this->urlParams[0])) {
            $controller = Controller::getController('index');
            $controller->render();
            return;
        } 
        $api = false;
        if($this->urlParams[0] == 'api') {
            $api = true;
            array_shift($this->urlParams);
        }
        $controller = Controller::getController($this->urlParams[0]);
        if ($controller) {
            array_shift($this->urlParams);
            $scriptAction = empty($this->urlParams[0]) ? 'render' : $this->urlParams[0];
            array_shift($this->urlParams);
            $action = $api ? 'api' : $scriptAction;
            $controller->$action($this->urlParams, $this->urlQueries);

        } else {
            ErrorDisplayer::show('page not found');
        }
    }
}
