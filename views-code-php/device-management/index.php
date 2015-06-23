<?php
require 'app/config/apikeys.php';
require 'app/config/urlConstants.php';
require 'vendor/autoload.php';

use App\lib\AppContainer;
use App\lib\Utility;

//add-new-device
Flight::route(ADD_DEVICE_INFORMATION, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->addDeviceDetails();
    /*$deviceDetails=json_decode(Flight::request()->getBody(),true);
    error_log(print_r($deviceDetails,true));*/
});


//add-new-device
Flight::route(ADD_COMMENT, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->addDeviceComment();
    
});


//list-device-details
Flight::route(LIST_DEVICE_DETAILS, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->listDeviceDetails();

});

//list-device-details-user
Flight::route(LIST_DEVICE_DETAILS_USER, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->listDeviceDetailsUser();

});



//list-device-details
Flight::route(LIST_DEVICE_TYPES, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->listDeviceTypes();

});
//get-device-information
Flight::route(GET_DEVICE_INFORMATION, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->getdeviceInformation();

});

//get-device-information
Flight::route(EDIT_DEVICE_INFORMATION, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->editdeviceInformationTrack();

});

//get-device-information-with-tracking
Flight::route(GET_DEVICE_INFORMATION_WITH_TRACK, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->getdeviceInformationTrack();

});


//check-user-role
Flight::route(CHECK_USER_ROLE, function() use (&$app)
{
   $adminObj=$app->resolve("user");
   $adminObj->userRole();

});



Flight::route(GET_ASSIGNED_DEVICE_LIST, function() use (&$app)
{
   $userObj=$app->resolve("user");
   $userObj->getAssignedDevices();

});

Flight::route(CHANGE_USER_PIN, function() use (&$app)
{
   $userObj=$app->resolve("user");
   $userObj->changePin();

});

Flight::route(DEVICE_TRANSFER, function() use (&$app)
{
   $appObj=$app->resolve("app");
   $appObj->deviceTransfer();

});

Flight::route(RESET_USER_PIN, function() use (&$app)
{
   $userObj=$app->resolve("user");
   $userObj->resetPin();

});

Flight::route(DEVICE_TRACKER, function() use (&$app)
{
   $appObj=$app->resolve("app");
   $appObj->trackDevice();

});


Flight::route(SEND_VERIFICATION_PUSH, function() use (&$app)
{
   $appObj=$app->resolve("app");
  // $appObj->forceVerification();

});


Flight::route(GET_TRACKING_INFORMATION, function() use (&$app)
{
   $adminObj=$app->resolve("admin");
   $adminObj->getTrackingDetails();

});

Flight::before('start', function(&$params, &$output)
{

   $deviceDetails=json_decode(Flight::request()->getBody(),true);
  // error_log(print_r($deviceDetails,true));


  error_log("==============================================");
  //// error_log(print_r($deviceDetails,true));
     try
     {
      if($deviceDetails==null)
      {
           error_log("test=====================================");

         echo Flight::json(array(API_RESPONSE_STATUS_CODE=>400,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Bad Request",API_RESPONSE=>""));
         exit();
      }
     $is_valid = GUMP::is_valid($deviceDetails, array(
        'apiToken' => 'required',
        'appId' => 'required',
         ));
       if($is_valid !==true ) 
          {
            error_log("test=====================================");
              echo Flight::json(array(API_RESPONSE_STATUS_CODE=>400,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Bad Request",API_RESPONSE=>$is_valid));
              exit();
          }
          else
          {
               $response=Utility::apiAccessCheck($deviceDetails["appId"],$deviceDetails["apiToken"]);
               if($response!=1)
               {
                  echo Flight::json(array(API_RESPONSE_STATUS_CODE=>401,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Unauthorized",API_RESPONSE=>""));
                  exit();
               }
               
          }
          
      }
      catch(Exception $e)
      {
           error_log(print_r($deviceDetails,true));


        echo Flight::json(array(API_RESPONSE_STATUS_CODE=>400,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Bad Request",API_RESPONSE=>""));
            
      }

});


$app=new App\lib\AppContainer();
Flight::start();

