<?php

session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/app/components/autoload.php');

$router = new Router();
$router->run();