<?php
require 'vendor/autoload.php';
use App\lib\AppContainer;
use App\lib\Utility;

Flight::route('/add-device-info', function() use (&$app)
{
   $adminobj=$app->resolve("admin");
   $adminobj->addDeviceDetails();

});

Flight::route('/list-device-details', function() use (&$app)
{
   $adminobj=$app->resolve("admin");
   $adminobj->listDeviceDetails();

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

