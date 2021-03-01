<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/employee-management-v2/';

define("CONTROLLERS", $root . 'controllers/');
define("CONFIG", $root . 'config/');
define("VIEWS", $root . 'views/');
define("MODELS", $root . 'models/');
define("RESOURCES", $root . 'resources/');
define("LIBS", $root . 'libs/');
define("CLASSES", LIBS . 'classes/');
define("ASSETS", $root . 'assets/');
define("BASE_PATH", "http://" . $_SERVER['SERVER_NAME'] . '/employee-management-v2/');