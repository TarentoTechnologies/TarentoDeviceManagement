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
        'employee_id'=>'required',
        'version'=>'required',
        'type_id'=>'required'
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
           $deviceInformationArray[]=$deviceDetails["employee_id"];
           $deviceInformationArray[]=$deviceDetails["purpose"];
           $deviceInformationArray[]=$deviceDetails["comments"];

           $deviceInformationArray[]=3;
            $deviceInformationArray[]=$deviceDetails["version"];
            $deviceInformationArray[]=$deviceDetails["type_id"];

           error_log("========================================");
           error_log(print_r($deviceInformationArray,true));
           error_log("========================================");
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
              $response=$this->admin->getDeviceDetails();
              Flight::json($response);
     }



      
     /**
      * listDeviceDetailsUser
      *
      * get all  device lists
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function listDeviceDetailsUser()
     {

                $userInfo=array();
                $userDetails=json_decode(Flight::request()->getBody(),true);
                error_log(print_r($userDetails,true));
                $is_valid = GUMP::is_valid($userDetails, array(
                    'user_id' =>'required'                    
                ));
              if($is_valid === true) 
              {
                 $userInfo[]=$userDetails["user_id"];
                 //$userInfo[]=$userDetails["type"];
                 $response=$this->admin->getDeviceDetailsUser($userInfo);
                 Flight::json($response);
               }
               else 
               {
                  echo Flight::json(array(API_RESPONSE_STATUS_CODE=>400,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Bad Request",API_RESPONSE=>$is_valid));
               }


              /*$response=$this->admin->getDeviceDetailsUser();
              Flight::json($response);*/
     }




    /**
      * listDeviceTypes
      *
      * get all  device lists
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function listDeviceTypes()
     {
              $response=$this->admin->getDeviceTypes();
              Flight::json($response);
     }


     /**
      * Get device details with tracking
      *
      * get device information
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */

     public function getdeviceInformationTrack()
     {

          $deviceInformationArray=array();
          $deviceDetails=json_decode(Flight::request()->getBody(),true);
          error_log(print_r($deviceDetails,true));          
          $is_valid = GUMP::is_valid($deviceDetails, array(
              'device_id' =>'required',
              'type'=>'required'
          ));          
          if($is_valid === true) 
          {
           $deviceInformationArray[]=$deviceDetails["device_id"];
           $deviceInformationArray[]=$deviceDetails["type"];


           $response=$this->admin->getDeviceInfoWithTrackFromIMEI($deviceInformationArray);
            Flight::json($response);
           }
           else 
           {
            echo Flight::json(array(API_RESPONSE_STATUS_CODE=>400,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Bad Request",API_RESPONSE=>$is_valid));
           }
          //Flight::json($response);
     }


     /**
      * Get device details with tracking
      *
      * get device information
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */

     public function editdeviceInformationTrack()
     {

          $deviceInformationArray=array();
          $deviceDetails=json_decode(Flight::request()->getBody(),true);
          error_log(print_r($deviceDetails,true));
          $is_valid = GUMP::is_valid($deviceDetails, array(              
              'make'=>'required',
              'type'=>'required',
              'os'=>'required',
              'version'=>'required',
              'imei'=>'required',
              'type_id'=>'required',                            
              'id' =>'required'
          ));
          if($is_valid === true) 
          {
           $deviceInformationArray[]=$deviceDetails["make"];
           $deviceInformationArray[]=$deviceDetails["type"];
           $deviceInformationArray[]=$deviceDetails["os"];
           $deviceInformationArray[]=$deviceDetails["version"];
           $deviceInformationArray[]=$deviceDetails["imei"];
           $deviceInformationArray[]=$deviceDetails["type_id"];
           $deviceInformationArray[]=$deviceDetails["id"];

           $response=$this->admin->editDeviceInfoWithTrackFromIMEI($deviceInformationArray);
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


     /**
      * addDeviceDetails
      *
      * add new device
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function addDeviceComment()
     {
         try 
       {
           $deviceInformationArray=array();
           $deviceDetails=json_decode(Flight::request()->getBody(),true);
           $is_valid = GUMP::is_valid($deviceDetails, array(
        'device_id' => 'required|alpha_numeric',        
        'type'=>'required',
        'comment'=>'required'
             ));
          if($is_valid === true) 
          {
           $deviceInformationArray[]=$deviceDetails["device_id"];                      
           $deviceInformationArray[]=$deviceDetails["comment"];
           $deviceInformationArray[]=$deviceDetails["type"];           

           error_log("========================================");
           error_log(print_r($deviceInformationArray,true));
           error_log("========================================");
           $response=$this->admin->addComment($deviceInformationArray);
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



}




?>