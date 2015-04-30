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
                      $responseStatus=array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Successfully assigned",API_RESPONSE=>array());
                 	}
                 	else if(isset($result->{0}))
                 	{
                      $responseStatus=array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Already this device didn't assign to this user");
                 	}
                 	else if(isset($result->{1}))
                 	{
                         $responseStatus=array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Your authentication information is not present in the system or The device detail is not present in the system");
                 	}

                 }

             return $responseStatus;
              

    	}
    	catch(Exception $e)
    	{
            return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
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
                      $responseStatus=array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Successfully added with pin verification",API_RESPONSE=>array());
                 	}
                 	else if(isset($result->{3}))
                 	{
                      $responseStatus=array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Successfully added without pin verification",API_RESPONSE=>array());
                 	}
                 	else if(isset($result->{0}))
                 	{
                      $responseStatus=array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"This device is not in the registry");
                 	}
                 	else if(isset($result->{2}))
                 	{
                         $responseStatus=array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Device is not assigned with any user");
                 	}

                 }

             return $responseStatus;
              

    	}
    	catch(Exception $e)
    	{
            return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
    	}
   }
}