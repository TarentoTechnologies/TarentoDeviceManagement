<?php
 namespace App\Controllers;
use \Flight;
 use \GUMP;
 use App\Models;
 class UserController 
 {

    protected $user;
 	 /**
 	  * Function name
 	  *
 	  * what the function does
 	  *
 	  * @param (type) (name) about this param
 	  * @return (type) (name)
 	  */
     public function __construct($user)
     {
        $this->user=$user;
     }
     /**
      * getAssignedDevices
      *
      * what the function does
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function getAssignedDevices()
     {
          $deviceInformationArray=array();
          $deviceDetails=json_decode(Flight::request()->getBody(),true);
          //$response=$this->admin->getDeviceInfoFromIMEI();
          $is_valid = GUMP::is_valid($deviceDetails, array(
              'employee_id' => 'required'
          ));
          if($is_valid === true) 
          {
           $deviceInformationArray[]=$deviceDetails["employee_id"];
           $deviceInformationArray[]="Assigned";
           $response=$this->user->getAssignedDeviceList($deviceInformationArray);
            Flight::json($response);
           }
           else 
           {
            echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
           }
     }
     /**
      * changePin
      *
      * change user pin
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function changePin()
     {
          $userInformationArray=array();
          $userDetails=json_decode(Flight::request()->getBody(),true);
          //$response=$this->admin->getDeviceInfoFromIMEI();
          $is_valid = GUMP::is_valid($userDetails, array(
              'employee_id' => 'required',
              'new_pin'=>'required',
              'old_pin'=>'required'
          ));
          if($is_valid === true) 
          {
           $userInformationArray[]=$userDetails["employee_id"];
           $userInformationArray[]=$userDetails["old_pin"];
           $userInformationArray[]=$userDetails["new_pin"];
           $response=$this->user->changeUserPin($userInformationArray);
            Flight::json($response);
           }
           else 
           {
            echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
           }
     }
     /**
      * resetPin
      *
      * reset user pin
      *
      * @param (type) (name) about this param
      * @return (type) (name)
      */
     public function resetPin()
     {
          $userInformationArray=array();
          $userDetails=json_decode(Flight::request()->getBody(),true);
          //$response=$this->admin->getDeviceInfoFromIMEI();
          $is_valid = GUMP::is_valid($userDetails, array(
              'employee_id' => 'required',
              'pin'=>'required',
             
          ));
          if($is_valid === true) 
          {
           $userInformationArray[]=$userDetails["pin"];
           $userInformationArray[]=$userDetails["employee_id"];
           $response=$this->user->resetUserPin($userInformationArray);
            Flight::json($response);
           }
           else 
           {
            echo Flight::json(array("statusCode"=>400,"errorMessage"=>"Bad Request","response"=>$is_valid));
           }
     }


}
