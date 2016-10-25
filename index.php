<?php
// index.php
session_start();
require_once 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$uri = $request->getPathInfo();
//if (!isset($_SESSION['login_user'])) {
//    $uri = '/login-form';
//}
//else {$uri = $request->getPathInfo();}

MyRouting::routing($uri, $request)->send();
