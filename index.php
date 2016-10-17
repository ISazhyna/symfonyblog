<?php
// index.php

require_once 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

// echo the headers and send the response
//myrouting($uri);
MyRouting::routing($uri,$request)->send();
//$response->send();
//var_dump(MyRouting::routing($uri));
//exit();