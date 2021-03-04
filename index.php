<?php
require 'config/constants.php';
require LIBS . 'Database.php';
require LIBS . 'classes/Model.php';
require LIBS . 'classes/Controller.php';
require LIBS . 'classes/View.php';
require LIBS . 'classes/Error.php';
require LIBS . 'Router.php';

require CONTROLLERS . 'sessionController.php';

require UTIL . 'Converter.php';

SessionController::checkSession();

$router = new Router();
$router->exec();

ErrorDisplayer::render();