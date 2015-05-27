<?php
namespace App\Models;
use App\lib\DB; 
class App extends DB
{
	/**
	 * deviceTransferInfo
	 *
	 * get device transfermation info
	 *
	 * @param (array) ($deviceTransferInfo) about this param
	 * @return (type) (name)
	 */
   public function deviceTransferInfo($deviceTransferInfo)
   {
        try
    	{
              $sql = "CALL device_transfer(?,?,?,?,?,?)";
              $response=parent::query($sql,$deviceTransferInfo);
              error_log(print_r($response,true));
              $responseStatus=array();
              while($result=$response->fetchObject())
                 {
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

   /**
    * sendPushToMobileDevices
    *
    * Doing push to mobile devices
    *
    * @param (type) (name) about this param
    * @return (type) (name)
    */
   public function sendPushToMobileDevices()
   {
             try
             {
                 error_log(print_r($deviceInformationArray,true));
                 $sql="select di.*,u.id as user_id,u.unique_id as employee_id from deviceinfo di join device_holder_info dhi on di.id=dhi.device_id join users u on u.id=dhi.user_id where u.unique_id=? and dhi.device_status=?";
                 $response=parent::query($sql,$deviceInformationArray);
                 $deviceInformation=array();
                 while($result=$response->fetchObject())
                 {

                      //$deviceInformation=(array)$result;
                     array_push($deviceInformation,(array)$result);
                     error_log(print_r($deviceInformation,true));
                 }
                  
                 return count($deviceInformation) ? array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation) : array(API_RESPONSE_STATUS_CODE=>204,API_RESPONSE_STATUS_MESSAGE=>"You are not assigned with any device",API_RESPONSE=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
   }
}