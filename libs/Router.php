<?php

class Router
{
    private $controller;
    private $action;
    private $urlParams;
    private $urlQueries;
    private $isApiEndpoint;

    public function __construct()
    {
        $this->setQueries();
        $this->setParams();
        $this->setApi();
        $this->setController();
        $this->setAction();
    }

    public function exec() {
        if ($this->controller) {
            $action = $this->action;
            $this->controller->$action($this->urlParams, $this->urlQueries);
        } else {
            $this->controller = Controller::getController('index');
            $this->controller->render();
            ErrorDisplayer::add('Page not found');
        }
    }

    private function setQueries() {
        parse_str($_SERVER['QUERY_STRING'], $this->urlQueries);
        unset($this->urlQueries['url']);
    }

    private function setParams() {        
        parse_str($_SERVER['QUERY_STRING'], $queryString);
        $url =  rtrim($queryString['url'], '/');
        $this->urlParams = explode('/', $url);
    }

    private function setApi() {
        $this->isApiEndpoint = false;
        if($this->urlParams[0] == 'api') {
            $this->isApiEndpoint = true;
            array_shift($this->urlParams);
        }
    }

    private function setController() {
        if (empty($this->urlParams[0])) {
            $this->controller = Controller::getController('index');
        } else {
            $this->controller = Controller::getController($this->urlParams[0]);
            array_shift($this->urlParams);
        }
    }

    private function setAction() {
        if($this->isApiEndpoint) {
            $this->action = 'api';
        } else {
            $this->action = empty($this->urlParams[0]) ? 'render' : $this->urlParams[0];
        }
        array_shift($this->urlParams);
    }
}
