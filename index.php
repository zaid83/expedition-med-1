<?php

require_once "config/Autoloader.php";

Autoloader::Autoload();

use config\Routing;

$route = new Routing();
$route->get();
