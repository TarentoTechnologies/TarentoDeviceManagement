<?php
namespace App\Models;
use App\lib\DB; 
class User extends DB
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
                  
                 return count($deviceInformation) ? array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation) : array(API_RESPONSE_STATUS_CODE=>204,API_RESPONSE_STATUS_MESSAGE=>"You are not assigned with any device",API_RESPONSE=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
    }
   
    /**
     * changeUserPin
     *
     * Doing user pin changes
     *
     * @param (array) ($userInfo) 
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

            
            return  ($responseStatus==1) ?  array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>array()) :  array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Your old pin is invalid"); 

      }
      catch(Exception $e)
      {
            return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
      }
    }
    /**
     * resetUserPin
     *
     * Doing pin reset option
     *
     * @param (array) ($userInfo) $userInfo 
     * @return (type) (name)
     */
    public function resetUserPin($userInfo)
    {
      try
      {
          error_log(print_r($userInfo,true));
              $sql ="CALL reset_user_pin(?,?)";
              //$sql = "CALL device_track(?,?,?,?,?,?)";
              $response=parent::query($sql,$userInfo);
              
              error_log("======================");
              error_log(print_r($response));
              error_log("======================");
               $responseStatus=0;
               while($result=$response->fetchObject())
               {
                  isset($result->{1}) ? $responseStatus=$result->{1} : $responseStatus=$result->{0};
               }

            
              return ($responseStatus==1) ?  array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Sucess") : array(API_RESPONSE_STATUS_CODE=>404,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Non-Existing-user");
            

      }
      catch(Exception $e)
      {
            return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
      }
    }

    /**
     * checkUserRole
     *
     * 
     *
     * @param (array) ($userInfo) $userInfo 
     * @return (type) (name)
     */
    public function checkUserRole($userInfo)
    {
      try
      {
          error_log(print_r($userInfo,true));              
          $sql="select admin_id from admin where admin_id=?";              
          //$sql = "CALL device_track(?,?,?,?,?,?)";
          $response=parent::query($sql,$userInfo);
          
          error_log("======================");
          error_log(print_r($response));
          error_log("======================");
          $responseStatus=0;
          while($result=$response->fetchObject())
           {
              /*isset($result->{1}) ? $responseStatus=$result->{1} : $responseStatus=$result->{0};*/
              $responseStatus=1;
           }

        
          return ($responseStatus==1) ?  array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Sucess") : array(API_RESPONSE_STATUS_CODE=>404,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Non-Existing-user");
        

      }
      catch(Exception $e)
      {
            return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
      }
    }   

    /**
     * checkUserRole
     *
     * 
     *
     * @param (array) ($userInfo) $userInfo 
     * @return (type) (name)
     */
    public function addNewUser($userInfo)
    {
      try
      {
          error_log("---------------------------");
          error_log(print_r($userInfo[2],true));      
          error_log("---------------------------");        
          $sql="select unique_id from users where unique_id=?";              
          //$sql = "CALL device_track(?,?,?,?,?,?)";
          //error_log(print_r($userInfo));
          
          $response=parent::query($sql,array($userInfo[2]));
          
          error_log("======================");
          error_log(print_r($response));
          error_log("======================");
          $responseStatus=0;
          while($result=$response->fetchObject())
           {
              /*isset($result->{1}) ? $responseStatus=$result->{1} : $responseStatus=$result->{0};*/
              $responseStatus=1;
           }

           if ($responseStatus==1) { }
            else
            {
              $sql="INSERT INTO users ( first_name , last_name , unique_id , pin , created_at , updated_at )VALUES (?, ?, ?, ?, NOW() , NOW())";
              $response=parent::query($sql,$userInfo);
            }

        
          return ($responseStatus==1) ?  array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"User already registered") : array(API_RESPONSE_STATUS_CODE=>404,API_RESPONSE_STATUS_ERROR_MESSAGE=>"New user added");
        

      }
      catch(Exception $e)
      {
            return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
      }
    }
     
}