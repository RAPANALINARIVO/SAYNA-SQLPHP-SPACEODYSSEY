<?php

// use app\Controllers\PaysController;
// use kernel;

include('../include.php');

$controllerName ='app\\Controllers\\'.$_GET['controller'].'Controller';
$actionName = $_GET['action'];
$controller= new $controllerName();
$view = $controller->$actionName();
$view->display();