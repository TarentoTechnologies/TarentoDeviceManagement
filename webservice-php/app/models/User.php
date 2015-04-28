<?php
namespace App\Models;
use App\lib\DB; 
Class User extends DB
{
	/**
     * getDeviceInfoFromIMEI
     *
     * it will get the device informtion with device holder
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function getAssignedDeviceList($deviceInformationArray)
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

                 return array("statusCode"=>200,"statusMessage"=>"Successfully added the device","response"=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array("statusCode"=>500,"errorMessage"=>"Failure");
     
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
    public function changeUserPin($userInfo)
    {
    	try
    	{
              $sql = "CALL change_pin(?,?,?)";
              $response=parent::query($sql,$userInfo);
              error_log(print_r($response,true));
              $responseStatus="";
              while($result=$response->fetchObject())
                 {
                  isset($result->{1}) ? $responseStatus=$result->{1} : $responseStatus=$result->{0};
                 }

            
            return  ($responseStatus==1) ?  array("statusCode"=>200,"statusMessage"=>"Success","response"=>array()) :  array("statusCode"=>500,"errorMessage"=>"Failure"); 

    	}
    	catch(Exception $e)
    	{
            return array("statusCode"=>500,"errorMessage"=>"Failure");
    	}
    }
}