<?php
// Front Controller
session_start();

define('BASE_DOMAIN', dirname(__FILE__));

require_once(BASE_DOMAIN.'/config/config.php');
require_once(BASE_DOMAIN.'/components/Autoload.php');


$router = new Router();
$router->run();
