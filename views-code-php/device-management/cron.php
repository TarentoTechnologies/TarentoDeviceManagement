<?php
require 'app/config/apikeys.php';
require 'app/config/urlConstants.php';
require 'vendor/autoload.php';
use App\lib\AppContainer;
use App\lib\Utility;

Flight::map('sendPush', function() use (&$app)
{
     $appObj=$app->resolve("app");
     $appObj->sendPush();
  
});

$app=new App\lib\AppContainer();
Flight::sendPush();


