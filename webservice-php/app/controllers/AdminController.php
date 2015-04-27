<?php
 namespace App\Controllers;
 use \Flight;
  use \GUMP;
 use App\Models;

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
      * Function name
      *
      * what the function does
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
           $response=$this->admin->registerDevices($deviceInformationArray);
           }
           else 
           {
           	echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
           }

     	  } 
     	  catch (Exception $e) 
     	  {
     	    	// echo $e->getMessage();
     	  } 
     	   
      }

      
     /**
      * Function name
      *
      * what the function does
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function listDeviceDetails()
     {
              $response=$this->admin->getDeviceDetails();;
              Flight::json($response);
     }

}




?>