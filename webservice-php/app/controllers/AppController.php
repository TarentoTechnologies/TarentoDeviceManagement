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
      * Function name
      *
      * what the function does
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */

     public function deviceTransfer()
     {

     	   error_log("test");
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
           	error_log("hello");
           	echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
            }


           


     }
 }