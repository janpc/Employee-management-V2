<?php
require 'config/constants.php';
require LIBS . 'Database.php';
require LIBS . 'classes/Model.php';
require LIBS . 'classes/Controller.php';
require LIBS . 'classes/View.php';
require LIBS . 'classes/Error.php';
require LIBS . 'App.php';

require CONTROLLERS . 'sessionController.php';

require UTIL . 'Converter.php';

SessionController::checkSession();

$app = new App();
$app->enroute();