<?php
 namespace App\Controllers;
 use \Flight;
 use \GUMP;
 use App\Models;

/*AdminController 
* To handle all the web admin operations
*
*/
 class AdminController 
 {

 	  protected $admin;
 	 /**
 	  * Function name
 	  *
 	  * what the function does
 	  *
 	  * @param (type) (name) about this param
 	  * @return (type) (name)
 	  */
     public function __construct($admin)
     {
     	 $this->admin=$admin;
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
     public function index()
     {
        
     }
     /**
      * addDeviceDetails
      *
      * add new device
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function addDeviceDetails()
     {
         try 
     	 {
           $deviceInformationArray=array();
           $deviceDetails=json_decode(Flight::request()->getBody(),true);
           $is_valid = GUMP::is_valid($deviceDetails, array(
    		'deviceId' => 'required|alpha_numeric',
    		'make' => 'required',
    		'name' => 'required',
    		'type' => 'required',
    		'os' => 'required',
    		'IMEI' => 'required',
    		'accessoryinfo'=>'required',
    		'empid'=>'required',
             ));
          if($is_valid === true) 
          {
           $deviceInformationArray[]=$deviceDetails["deviceId"];
           $deviceInformationArray[]=$deviceDetails["make"];
           $deviceInformationArray[]=$deviceDetails["name"];
           $deviceInformationArray[]=$deviceDetails["type"];
           $deviceInformationArray[]=$deviceDetails["os"];
           $deviceInformationArray[]=$deviceDetails["IMEI"];
           $deviceInformationArray[]=$deviceDetails["accessoryinfo"];
           $deviceInformationArray[]=(new \DateTime())->format('Y-m-d H:i:s');
           $deviceInformationArray[]=$deviceDetails["empid"];
           $deviceInformationArray[]=$deviceDetails["purpose"];
           $deviceInformationArray[]=$deviceDetails["comments"];
           $deviceInformationArray[]=3;

      /*     error_log("========================================");
           error_log(print_r($deviceInformationArray,true));
           error_log("========================================");*/
           $response=$this->admin->registerDevices($deviceInformationArray);
           Flight::json($response);
           }
           else 
           {
           	echo Flight::json(array(API_RESPONSE_STATUS_CODE=>400,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Bad Request","response"=>$is_valid));
           }

     	  } 
     	  catch (Exception $e) 
     	  {
     	    	// echo $e->getMessage();
     	  } 
     	   
      }

      
     /**
      * listDeviceDetails
      *
      * get all  device lists
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function listDeviceDetails()
     {
              $response=$this->admin->getDeviceDetails();;
              Flight::json($response);
     }

     /**
      * Get device details
      *
      * get device information
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */

     public function getdeviceInformation()
     {

          $deviceInformationArray=array();
          $deviceDetails=json_decode(Flight::request()->getBody(),true);
          $is_valid = GUMP::is_valid($deviceDetails, array(
              'IMEI' =>'required'
          ));
          if($is_valid === true) 
          {
           $deviceInformationArray[]=$deviceDetails["IMEI"];
           $response=$this->admin->getDeviceInfoFromIMEI($deviceInformationArray);
            Flight::json($response);
           }
           else 
           {
            echo Flight::json(array(API_RESPONSE_STATUS_CODE=>400,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Bad Request",API_RESPONSE=>$is_valid));
           }
          //Flight::json($response);
     }
     /**
      * getTrackingDetails()
      *
      * getTracking information
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */

     public function getTrackingDetails()
     {
            $response=$this->admin->getTrackInfo();
            Flight::json($response);
          
     }

}




?>