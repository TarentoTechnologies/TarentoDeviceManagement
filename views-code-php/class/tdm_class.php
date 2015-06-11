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

  function tdmdash($id)
  {



    $result=$this->dbInstance->query("SELECT * FROM `admin` where `admin_id`=?",array($id));    
    $role=0;
    while($record=$result->fetchObject()) 
      {          
        $role=1;        
      }    
    return $role;

/*

    $host='localhost';
    $username='root';
    $password='mysql123';
    $dbname="tdm_db";   


    $con=mysqli_connect($host,$username,$password,$dbname);
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    $query="SELECT * FROM admin where admin_id='".$id."'";
    $res=mysqli_query($con,$query);
    print_r($res);*/
    //return $res;
  }





}
?>