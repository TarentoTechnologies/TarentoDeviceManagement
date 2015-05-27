<?php

//require 'lib/DB.php';
//require 'lib/session.php';
//require 'obj.php';

/*
$link = mysql_connect($host, $username, $password);
mysql_select_db("mydb", $link);
*/

class tdm_class{

  protected $dbInstance;
  public function __construct($dbInstance)
  {
     $this->dbInstance=$dbInstance;
  }

  function tdmdash()
  {
    echo "hai-dash";
    //return "dash";
  }





}
?>