<?php
//require 'device-management/app/lib/DB.php';
//require 'lib/session.php';
//require 'obj.php';

/*
$link = mysql_connect($host, $username, $password);
mysql_select_db("mydb", $link);
*/

class tdm_class{

  private static $dbInstance;
  public function __construct($dbInstance)
  {
     $this->dbInstance=$dbInstance;
  }

/* To check the user role */
  function tdmdash($id)
  {



    $result=$this->dbInstance->query("SELECT * FROM `admin` where `admin_id`=?",array($id));    
    $role=0;
    while($record=$result->fetchObject()) 
      {          
        $role=1;        
      }    
    return $role;

  }




/* To add new user if not existing */

  function addNewUser($userInfo)
    {
   
         
          //$sql="select unique_id from users where unique_id=?";   
          $result=$this->dbInstance->query("SELECT * FROM `users` where `unique_id`=?",array($userInfo[2]));               
          //$response=parent::query($sql,array($userInfo[2]));]
          $responseStatus=0;
          while($record=$result->fetchObject()) 
            {          
              $responseStatus=1;        
            }              
          
          
           if ($responseStatus==1) { }
            else
            {
              //$sql="INSERT INTO users ( first_name , last_name , unique_id , pin , created_at , updated_at )VALUES (?, ?, ?, ?, NOW() , NOW())";
              
              $result1=$this->dbInstance->query("INSERT INTO `users` ( `first_name` , `last_name` , `unique_id` , `pin`, `created_at`, `updated_at`  )VALUES (?, ?, ?, ?,?,?)",$userInfo);
              while($record1=$result1->fetchObject()) 
                {          
                  $responseStatus=2;        
                }               
              
            }

        
          return ($responseStatus);
        

      
    }





}
?>