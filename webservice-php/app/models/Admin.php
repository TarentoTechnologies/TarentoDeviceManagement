<?php
namespace App\Models;
use App\lib\DB; 
class Admin extends DB
{
	/**
	 * Function name
	 *
	 * what the function does
	 *
	 * @param (type) (name) about this param
	 * @return (type) (name)
	 */

 
    public function registerDevices($deviceDetails)
    {
    /*	error_log(print_r($deviceDetails,true));*/
    	
        try
    	{
    	$sql = "CALL addDeviceDetails(?,?,?,?,?,?,?,?,@addDeviceResponse,?,?,?,?)";
        parent::query($sql,$deviceDetails);
        $sql = "select @addDeviceResponse as response";
        $response=parent::query($sql);
        $resp="";
        while($result=$response->fetchObject())
        {
           $resp=$result->response;  
        }

          return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Successfully added the device",API_RESPONSE=>array());
        }
        catch(Exception $e)
        {
          
          return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
        }

        //$response=parent::query("insert into deviceinfo(device_id,make,name,type,os,IMEI,accessoryinfo,created_at) values(?,?,?,?,?,?,?,?)",$deviceDetails);
        //return $response;
    }

    /**
     * Function name
     *
     * what the function does
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function getDeviceDetails()
    {
             try
             {
                 $sql="select *from deviceinfo";
                 $response=parent::query($sql,array());
                 $deviceInformation=array();
                 while($result=$response->fetchObject())
                 {
                     array_push($deviceInformation,(array)$result);
                 }

                 return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
    }

    /**
     * getDeviceInfoFromIMEI
     *
     * it will get the device informtion with device holder
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function getDeviceInfoFromIMEI($deviceInformationArray)
    {
             try
             {
                 error_log(print_r($deviceInformationArray,true));
                 $sql="select di.*,u.id as user_id,u.unique_id as employee_id from deviceinfo di join device_holder_info dhi on di.id=dhi.device_id join users u on u.id=dhi.user_id where di.IMEI=?";
                 $response=parent::query($sql,$deviceInformationArray);
                 $deviceInformation=array();
                 $availabilityFlag=0;
                 while($result=$response->fetchObject())
                 {

                     $deviceInformation=(array)$result;
                      $availabilityFlag=1;
                     //array_push($deviceInformation,(array)$result);
                     error_log(print_r($deviceInformation,true));
                 }

                return  ($availabilityFlag) ?   array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation) :  array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"This device is not assigned with any user",API_RESPONSE=>$deviceInformation);
                
                // return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
    }
    /**
     * getTrackInfo
     *
     * get Device Tracking Details
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */

    public function getTrackInfo()
    {
            try
             {
                 $sql="select dt.*,di.device_id,di.IMEI,u.unique_id  from device_tracker dt join deviceinfo di  on dt.device_id=di.id join users u on u.id=dt.device_holding_user";
                 $response=parent::query($sql);
                 $deviceInformation=array();
                 while($result=$response->fetchObject())
                 {

                     //$deviceInformation=(array)$result;
                     array_push($deviceInformation,(array)$result);
                     error_log(print_r($deviceInformation,true));
                 }

                 return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
    }
} 
?>