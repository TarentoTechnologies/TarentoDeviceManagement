<?php
namespace App\Models;
use App\lib\DB; 
Class Admin extends DB
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
    	error_log(print_r($deviceDetails,true));
    	
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

          return array("statusCode"=>200,"statusMessage"=>"Successfully added the device","id"=>$resp);
        }
        catch(Exception $e)
        {
          
          return array("statusCode"=>500,"errorMessage"=>"Failure");
     
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

                 return array("statusCode"=>200,"statusMessage"=>"Successfully added the device","response"=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array("statusCode"=>500,"errorMessage"=>"Failure");
     
             }
    }
} 
?>