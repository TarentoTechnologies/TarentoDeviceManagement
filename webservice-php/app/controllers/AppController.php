<?php
 namespace App\Controllers;
 use \Flight;
 use \GUMP;
 use App\Models;

 class AppController 
 {

 	  protected $app;

 	 public function __construct($app)
     {
     	 $this->app=$app;
         //$this->dbObject=$databaseInstance;
     }

     /**
      * deviceTransfer
      *
      * Assign device among user
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */

     public function deviceTransfer()
     {

     	  
     	   $deviceTransferInformationArray=array();
           $deviceDetails=json_decode(Flight::request()->getBody(),true);
           $is_valid = GUMP::is_valid($deviceDetails, array(
    		DEVICE_IDENTIFIER => 'required',
    		OLD_USER_PIN=>'required',
    		OLD_USER_IDENTIFIER=>'required',
    		NEW_USER_PIN=>'required',
    		NEW_USER_IDENTIFIER=>'required'
    		));
              //print_r($deviceDetails);
            if($is_valid === true) 
            {
               $deviceTransferInformationArray[]=$deviceDetails[DEVICE_IDENTIFIER];
               $deviceTransferInformationArray[]=$deviceDetails[OLD_USER_IDENTIFIER];	
               $deviceTransferInformationArray[]=$deviceDetails[OLD_USER_PIN];
               $deviceTransferInformationArray[]=$deviceDetails[NEW_USER_IDENTIFIER];
               $deviceTransferInformationArray[]=$deviceDetails[NEW_USER_PIN];
              
               //$deviceTransferInformationArray[]=(new \DateTime())->format('Y-m-d H:i:s');
               $response=$this->app->deviceTransferInfo($deviceTransferInformationArray);
               Flight::json($response);
            }
            else 
            {
           	
           	echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
            }


           


     }

     /**
      * trackDevice
      *
      * Do device tracking
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */

     public function trackDevice()
     {
           $deviceTransferInformationArray=array();
           $deviceDetails=json_decode(Flight::request()->getBody(),true);
           $is_valid = GUMP::is_valid($deviceDetails, array(
    		DEVICE_CURRENT_LOCATION => 'required',
    		DEVICE_IP=>'required',
    		WIFI_ADDRESS=>'required',
    		DEVICE_IDENTIFIER=>'required',
    		USER_PIN=>'required'
    		));
            
            if($is_valid === true) 
            {
               $deviceTransferInformationArray[]=$deviceDetails[DEVICE_CURRENT_LOCATION];
               $deviceTransferInformationArray[]=$deviceDetails[DEVICE_IP];	
               $deviceTransferInformationArray[]=$deviceDetails[WIFI_ADDRESS];
               $deviceTransferInformationArray[]=$deviceDetails[DEVICE_CURRENT_OS_VERSION];
               $deviceTransferInformationArray[]=$deviceDetails[DEVICE_IDENTIFIER];
               $deviceTransferInformationArray[]=$deviceDetails[USER_PIN];
               $response=$this->app->trackDeviceInformation($deviceTransferInformationArray);
               Flight::json($response);

            }
            else 
            {
           	
           	echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
            }

     }
 }