<?php
require_once __DIR__ ."/../app/routes/router.php";
require_once __DIR__ ."/../app/function.php";
session_start();

$route=new Router();
$route->handleRequest();




























?>