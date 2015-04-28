<?php
require 'app/config/apikeys.php';
require 'vendor/autoload.php';
use App\lib\AppContainer;
use App\lib\Utility;

//add-new-device
Flight::route('/add-device-info', function() use (&$app)
{
   $adminobj=$app->resolve("admin");
   $adminobj->addDeviceDetails();

});

//list-device-details
Flight::route('/list-device-details', function() use (&$app)
{
   $adminobj=$app->resolve("admin");
   $adminobj->listDeviceDetails();

});

//get-device-information
Flight::route('/get-device-info', function() use (&$app)
{
   $adminobj=$app->resolve("admin");
   $adminobj->getdeviceInformation();

});


Flight::route('/get-assigned-device-list', function() use (&$app)
{
   $adminobj=$app->resolve("user");
   $adminobj->getAssignedDevices();

});

Flight::route('/change-user-pin', function() use (&$app)
{
   $adminobj=$app->resolve("user");
   $adminobj->changePin();

});

Flight::route('/device-transfer', function() use (&$app)
{
   $adminobj=$app->resolve("app");
   $adminobj->deviceTransfer();

});

Flight::route('/reset-user-pin', function() use (&$app)
{
   $adminobj=$app->resolve("user");
   $adminobj->resetPin();

});





Flight::before('start', function(&$params, &$output)
{
	 $deviceDetails=json_decode(Flight::request()->getBody(),true);
     error_log(print_r($deviceDetails,true));
     try
     {
      if($deviceDetails==null)
      {
         echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>""));
         exit();
      }
     $is_valid = GUMP::is_valid($deviceDetails, array(
    		'apiToken' => 'required|alpha_numeric',
    		'appId' => 'required',
    		 ));
       if($is_valid !==true ) 
          {
              echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
              exit();
          }
          else
          {
          	   $response=Utility::apiAccessCheck($deviceDetails["appId"],$deviceDetails["apiToken"]);
          	   if($response!=1)
          	   {
                  echo Flight::json(array("statusCode"=>401,"errorMessage"=>"Unauthorized","response"=>""));
                  exit();
          	   }
          }
          
      }
      catch(Exception $e)
      {
        echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>""));
            
      }
});


$app=new App\lib\AppContainer();
Flight::start();

