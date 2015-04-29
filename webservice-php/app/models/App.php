<?php
namespace App\Models;
use App\lib\DB; 
Class App extends DB
{
   public function deviceTransferInfo($deviceTransferInfo)
   {
     

     
   	/*return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Sucess",API_RESPONSE=>$deviceTransferInfo);*/

   	    try
    	{
              $sql = "CALL device_transfer(?,?,?,?,?)";
              $response=parent::query($sql,$deviceTransferInfo);
              error_log(print_r($response,true));
              $responseStatus=array();
              while($result=$response->fetchObject())
                 {
                  // isset($result->{1}) ? $responseStatus=$result->{1} : $responseStatus=$result->{0};
                 	error_log(print_r(array("test","test1"),true));
                 	if(isset($result->{2}))
                 	{
                      $responseStatus=array("statusCode"=>200,"statusMessage"=>"Successfully assigned","response"=>array());
                 	}
                 	else if(isset($result->{0}))
                 	{
                      $responseStatus=array("statusCode"=>500,"errorMessage"=>"Already this device didn't assign to this user");
                 	}
                 	else if(isset($result->{1}))
                 	{
                         $responseStatus=array("statusCode"=>500,"errorMessage"=>"Your authentication information is not present in the system or The device detail is not present in the system");
                 	}

                 }

             return $responseStatus;
              

    	}
    	catch(Exception $e)
    	{
            return array("statusCode"=>500,"errorMessage"=>"Failure");
    	}
            

   }
   /**
    * trackDeviceInformation
    *
    * what the function does
    *
    * @param (type) (name) about this param
    * @return (type) (name)
    */
   public function trackDeviceInformation($deviceTransferInformationArray)
   {
         try
    	{
              $sql = "CALL device_track(?,?,?,?,?,?)";
              $response=parent::query($sql,$deviceTransferInformationArray);
              error_log(print_r($response,true));
              $responseStatus=array();
              while($result=$response->fetchObject())
                 {
                  // isset($result->{1}) ? $responseStatus=$result->{1} : $responseStatus=$result->{0};
              
                 	if(isset($result->{1}))
                 	{
                      $responseStatus=array("statusCode"=>200,"statusMessage"=>"Successfully added with pin verification","response"=>array());
                 	}
                 	else if(isset($result->{3}))
                 	{
                      $responseStatus=array("statusCode"=>200,"statusMessage"=>"Successfully added without pin verification","response"=>array());
                 	}
                 	else if(isset($result->{0}))
                 	{
                      $responseStatus=array("statusCode"=>500,"errorMessage"=>"This device is not in the registry");
                 	}
                 	else if(isset($result->{2}))
                 	{
                         $responseStatus=array("statusCode"=>500,"errorMessage"=>"Device is not assigned with any user");
                 	}

                 }

             return $responseStatus;
              

    	}
    	catch(Exception $e)
    	{
            return array("statusCode"=>500,"errorMessage"=>"Failure");
    	}
   }
}