<?php
require 'config/constants.php';
require LIBS . 'Database.php';
require LIBS . 'classes/Model.php';
require LIBS . 'classes/Controller.php';
require LIBS . 'classes/View.php';
require LIBS . 'App.php';
require LIBS . 'Api.php';

require CONTROLLERS . 'errorController.php';

/* require 'config/config.php'; */

$url = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($url, '/');
$urlParams = explode('/', $url);

if (isset($urlParams[0]) && $urlParams[0] === 'api') {
    $api = new Api($urlParams);
} else {
    $app = new App($urlParams);
}
