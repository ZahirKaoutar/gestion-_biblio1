<?php
require_once __DIR__ . "/../app//Models/Reader.php";
require_once __DIR__ . "/../app/Models/Admin.php";
require_once __DIR__ . "/../app/Models/Book.php";



require_once __DIR__ ."/../app/routes/router.php";
require_once __DIR__ ."/../app/function.php";

session_start();

$route=new Router();
$route->handleRequest();




























?>