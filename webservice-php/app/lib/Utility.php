<?php
namespace App\lib;
use App\lib\Registry;
class Utility
{    
	 /**
	  * Function name
	  *
	  * what the function does
	  *
	  * @param (type) (name) about this param
	  * @return (type) (name)
	  */
	 public static function apiAccessCheck($appId,$token)
	 {
          $dbInstance=Registry::getDbInstance();
          $response=$dbInstance->query("select *from api_access where id=? and access_token=?",array($appId,$token));
          $validFlag=0;
           while($result=$response->fetchObject())
           {
             $validFlag=1;
           }
           return $validFlag;

	 }
}

?>