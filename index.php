<?php
include "autoload.php";
// use apps\controllers\Base as base;
// $base = new base();
// if($_GET['get'] == 'add'){
// 	$base->add();
// } 



use apps\router\Route as Router;

$kernel = new Router($_GET);
$controller = $kernel->getController();
$controller->RunAction();
