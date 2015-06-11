<?php
namespace App\Models;
use App\lib\DB; 
class Admin extends DB
{
    /**
     * registerDevices
     *
     * It is doing register new devices
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function registerDevices($deviceDetails)
    {   
        try
        {
        $sql = "CALL addDeviceDetails(?,?,?,?,?,?,?,?,@addDeviceResponse,?,?,?,?,?,?)";
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

       
    }

    /**
     * getDeviceDetails
     *
     * get device information
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function getDeviceDetails()
    {
         $device_types_array=array();   
         $device_types_array=Admin::typeList();

             try
             {
                $sql="select distinct di.id, di.device_id, di.make, di.name, di.type,di.type_id, di.os, di.version, di.IMEI, di.accessoryinfo, di.created_at, di.updated_at,u.id as user_id,u.first_name,u.last_name,u.unique_id as employee_id,dhi.device_status from deviceinfo di, users u, device_holder_info dhi where dhi.device_id=di.id and (dhi.device_status='Available' or dhi.device_status='Assigned') and dhi.user_id=u.id order by di.id asc";
                $response=parent::query($sql,array());
                $deviceInformation=array();
                 while($result=$response->fetchObject())
                 {


                    $resultVal=(array)$result;
                    $typeval=$resultVal["type_id"];
                    $resultVal["type_id"]=$device_types_array[$typeval];
                    array_push($deviceInformation,(array)$resultVal);




                     //array_push($deviceInformation,(array)$result);
                 }

                 return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
    }




  /**
     * getDeviceDetailsUser
     *
     * get device information for specific user
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function getDeviceDetailsUser($userInfo)
    {
         $device_types_array=array();   
         $device_types_array=Admin::typeList();

             try
             {
                $deviceInformation=array();
                $sql="select distinct di.id, di.device_id, di.make, di.name, di.type,di.type_id, di.os, di.version, di.IMEI, di.accessoryinfo, di.created_at, di.updated_at,u.id as user_id,u.first_name,u.last_name,u.unique_id as employee_id,dhi.device_status from deviceinfo di, users u, device_holder_info dhi where dhi.device_id=di.id and (dhi.device_status='Available' or dhi.device_status='Assigned') and dhi.user_id=u.id and u.unique_id=? order by di.id asc";
                $response=parent::query($sql,$userInfo);                
                 while($result=$response->fetchObject())
                 {


                    $resultVal=(array)$result;
                    $typeval=$resultVal["type_id"];
                    $resultVal["type_id"]=$device_types_array[$typeval];
                    array_push($deviceInformation,(array)$resultVal);




                     //array_push($deviceInformation,(array)$result);
                 }

                $userInformation=array();
                $sql="select u.id as user_id,u.first_name,u.last_name,u.unique_id as employee_id from users u where u.unique_id=?";
                $response=parent::query($sql,$userInfo);
                 while($result=$response->fetchObject())
                 {
                    $resultVal=(array)$result;                    
                    array_push($userInformation,(array)$resultVal);                    
                 }
                 $resultInformation=array();
                 array_push($resultInformation,(array)$deviceInformation);                    
                 array_push($resultInformation,(array)$userInformation);                    



                 return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$resultInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
    }





/**
     * registerDevices
     *
     * It is doing register new devices
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function addComment($cmt)
    {   
        try
        {
        $sql = "CALL device_comment(?,?,@cmtResponse)";
        parent::query($sql,$cmt);
        $sql = "select @cmtResponse as response";
        $response=parent::query($sql);
        $resp="";
        while($result=$response->fetchObject())
        {
           $resp=$result->response;  
        }

          return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Successfully added the comment",API_RESPONSE=>array());
        }
        catch(Exception $e)
        {
          
          return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
        }

    }




    /**
     * getDeviceTypes
     *
     * get device information
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function getDeviceTypes()
    {
         $device_types_array=array();   
         $device_types_array=Admin::typeList();

             try
             {

                /*for type count */
                 $sql="select distinct di.type_id as type, count(*) as cnt from deviceinfo di group by di.type_id order by di.type_id asc";
                 $response=parent::query($sql,array());
                 $deviceInformation=array();
                 $deviceType=array();
                 while($result=$response->fetchObject())
                 {
                    $resultVal=(array)$result;
                    $typeval=$resultVal["type"];
                    $resultVal["type"]=$device_types_array[$typeval];
                    array_push($deviceType,(array)$resultVal);
                                        
                 }

                /*For version count*/
                 $deviceVersion=array();
                 $sql="select di.type_id as type,di.os,di.version, count(*) as cnt from deviceinfo di group by di.type_id,di.version order by di.type_id asc";
                 $response=parent::query($sql,array());                 
                 while($result=$response->fetchObject())
                 {
                    $resultVal=(array)$result;
                    $typeval=$resultVal["type"];
                    $resultVal["type"]=$device_types_array[$typeval];
                    array_push($deviceVersion,(array)$resultVal);
                 }

                 /*For version count*/
                 $deviceAvailAssign=array();
                 $sql="select di.type_id as type,count(*) as cnt from deviceinfo di,device_holder_info dhi where dhi.device_status='Available' and dhi.device_id=di.id group by di.type_id order by di.type_id asc";
                 $response=parent::query($sql,array());                 
                 while($result=$response->fetchObject())
                 {
                    $resultVal=(array)$result;
                    $typeval=$resultVal["type"];
                    $resultVal["type"]=$device_types_array[$typeval];
                     array_push($deviceAvailAssign,(array)$resultVal);
                 }

                 /*For alert tracking*/
                 $deviceAlert=array();

                 
                $sql1="select distinct dt.id, di.id, di.device_id,dt.created_at as track_create, dt.pin_verification_status as status,DATE_FORMAT(date(now())-1,'%Y/%m/%d') as dt,DATE_FORMAT(date(dt.created_at),'%Y/%m/%d') as dt1, DATEDIFF(DATE_FORMAT(date(now())-1,'%Y/%m/%d'),DATE_FORMAT(date(max(dt.created_at)),'%Y/%m/%d')) as datediff, HOUR(TIMEDIFF(now(),max(dt.created_at))) as hourdiff from device_tracker dt, deviceinfo di,device_holder_info dhi,users u where di.id=dhi.device_id and u.id=dhi.user_id and dt.device_id=di.id order by dt.device_id asc";
                $response1=parent::query($sql1,array());
                 
                 $availabilityFlag=0;
                 while($result1=$response1->fetchObject())
                 {

                      $availabilityFlag=1;
                      $record1=(array)$result1;
                      
                      $record1["status"]=ord($record1["status"]);
                      
                      array_push($deviceAlert,(array)$record1);
                     
                 }



/*For alert tracking*/
                 $deviceActivity=array();
                 $sql1="select distinct dt.id, di.id, di.device_id,di.make,di.name,di.type_id as type,di.os,di.version,di.IMEI,di.accessoryinfo, di.created_at,di.updated_at,u.id as user_id,u.first_name,u.last_name,u.unique_id as employee_id,dhi.comments,dt.current_location, dt.ip, dt.wifi,dt.created_at as track_create, dt.pin_verification_status as status from device_tracker dt, deviceinfo di,device_holder_info dhi,users u where di.id=dhi.device_id and u.id=dhi.user_id and dt.device_id=di.id group by dt.id order by dt.created_at desc limit 10";
                 $response1=parent::query($sql1,array());
                 
                 $availabilityFlag=0;
                 while($result1=$response1->fetchObject())
                 {


                    $resultVal=(array)$result1;
                    $typeval=$resultVal["type"];
                    $resultVal["type"]=$device_types_array[$typeval];

                      $availabilityFlag=1;
                      $record1=(array)$resultVal;
                      

                      $record1["status"]=ord($record1["status"]);
                      
                      array_push($deviceActivity,(array)$record1);
                     
                 }



/*For holder info*/
                 $deviceHold=array();
                 
                 $sql1="select dhi.device_id as id,di.device_id as device_id,dhi.user_id,u.id as user_id,u.first_name,u.last_name,u.unique_id as employee_id,dhi.comments,dhi.device_assigned_date,dhi.device_status,di.type_id as type, IFNULL(DATEDIFF(DATE_FORMAT(date(now()),'%Y/%m/%d'),DATE_FORMAT(date(dhi.device_assigned_date),'%Y/%m/%d')),0) as diff from users u,deviceinfo di, device_holder_info dhi where u.id=dhi.user_id and di.id = dhi.device_id and (dhi.device_status='Available' or dhi.device_status='Assigned') order by dhi.device_id asc";
                 $response1=parent::query($sql1,array());
                 
                 $availabilityFlag=0;
                 $counter=0;
                 while($result1=$response1->fetchObject())
                 {


                    $resultVal=(array)$result1;
                    $typeval=$resultVal["type"];
                    $resultVal["type"]=$device_types_array[$typeval];

                      $availabilityFlag=1;
                      $record1=(array)$resultVal;
                      
                      array_push($deviceHold,(array)$record1);
                     $counter+=1;
                 }




                 array_push($deviceInformation, $deviceType);
                 array_push($deviceInformation, $deviceVersion);
                 array_push($deviceInformation, $deviceAvailAssign);
                 array_push($deviceInformation, $deviceAlert);
                 array_push($deviceInformation, $deviceActivity);
                 array_push($deviceInformation, $deviceHold);



                 return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation);
            

             }
             catch(Exception $e)
             {
                  return array(API_RESPONSE_STATUS_CODE=>500,API_RESPONSE_STATUS_ERROR_MESSAGE=>"Failure");
     
             }
    }



    /**
     * Get list of device types
     *
     * it will get the device informtion with device holder
     *
     * @return (array) (list)
     */
public function typeList()
    {
        $device_types_array= array('0' =>"Iphone" ,'1' =>"Android" ,'2' =>"Android-Tablet" ,'3' =>"ipad" ,);
       

        return $device_types_array;
     }   


/**
     * getDeviceInfoFromIMEI
     *
     * it will get the device informtion with device holder
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    public function editDeviceInfoWithTrackFromIMEI($deviceInformationArray)
    {
          try
        {
       
        $sql ="UPDATE deviceinfo SET make = ?,type = ?,os = ?,version = ?,IMEI = ?,type_id = ? WHERE id = ?";
        parent::query($sql,$deviceInformationArray);
       
          return array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Successfully updated the device",API_RESPONSE=>array());
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
    public function getDeviceInfoWithTrackFromIMEI($deviceInformationArray)
    {
         $device_types_array=array();   
         $device_types_array=Admin::typeList();

        
             try
             {
                 $deviceInformation=array();

                 $sql="select distinct di.id, di.device_id,di.make,di.name,di.type,di.type_id,di.os,di.version,di.IMEI,di.accessoryinfo, di.created_at,di.updated_at from device_tracker dt, device_comment dc, deviceinfo di,device_holder_info dhi,users u where di.device_id=? and di.type=? group by di.id order by di.created_at desc";
                 $response=parent::query($sql,$deviceInformationArray);
                 $deviceInfo=array();
                 $availabilityFlag=0;
                 while($result=$response->fetchObject())
                 {



                      $availabilityFlag=1;
                      $record=(array)$result;
                      array_push($deviceInfo,$record);

                 }



                 $sql="select distinct dt.id, di.id, di.device_id,di.make,di.name,di.type,di.os,di.version,di.IMEI,di.accessoryinfo, di.created_at,di.updated_at,u.id as user_id,u.first_name,u.last_name,u.unique_id as employee_id,dhi.comments as holder_comments,dc.comment as comments,dt.current_location, dt.ip, dt.wifi,dt.created_at as track_create, dt.pin_verification_status as status from device_tracker dt, device_comment dc, deviceinfo di,device_holder_info dhi,users u where di.id=dhi.device_id and u.id=dhi.user_id and dt.device_id=di.id and di.device_id=? and di.type=? group by dt.id order by dt.created_at desc";
                 $response=parent::query($sql,$deviceInformationArray);
                 $deviceTrackInfo=array();
                 $availabilityFlag=0;
                 while($result=$response->fetchObject())
                 {

                      $availabilityFlag=1;
                      $record=(array)$result;
                      $record["status"]=ord($record["status"]);
                      array_push($deviceTrackInfo,$record);

                 }



                $sql="select dc.comment as comments,dc.created_on from device_comment dc, deviceinfo di where di.device_id=dc.device_id and di.device_id=? and di.type=? group by dc.created_on order by dc.created_on desc";
                 $deviceComment=array();
                 $response=parent::query($sql,$deviceInformationArray);                 
                 $availabilityFlag=0;
                 while($result=$response->fetchObject())
                 {

                      $availabilityFlag=1;
                      $record=(array)$result;
                    array_push($deviceComment,$record);
                     }


                 array_push($deviceInformation, $deviceInfo);
                 array_push($deviceInformation, $deviceTrackInfo);
                 array_push($deviceInformation, $deviceComment);
                 array_push($deviceInformation, $device_types_array);
                 






                return  ($availabilityFlag) ?   array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"Success",API_RESPONSE=>$deviceInformation) :  array(API_RESPONSE_STATUS_CODE=>200,API_RESPONSE_STATUS_MESSAGE=>"This device is not assigned with any user",API_RESPONSE=>$deviceInformation);
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