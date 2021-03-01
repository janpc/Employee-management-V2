<?php
require 'config/constants.php';
require LIBS . 'Database.php';
require LIBS . 'classes/Model.php';
require LIBS . 'classes/Controller.php';
require LIBS . 'classes/View.php';
require LIBS . 'App.php';

require CONTROLLERS . 'errorController.php';

/* require 'config/config.php'; */

$app = new App();
