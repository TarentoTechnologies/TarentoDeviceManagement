<?php
session_start();
/*
*@file:Session.php
*@author:
*/
Class Session
{
   function __construct()
   {

   }

   static function put($key,$value)
   {
     if($value=="")
     {
       $value="";
     }
     $_SESSION["".$key.""]=$value;
   }
   static function get($key)
   {
       $value=$_SESSION["".$key.""];
       return $value;
   }
   static function remove($key)
   {
    unset($_SESSION["".$key.""]);
   }
   static function destroy()
   {
   	  if(session_destroy())
   	  {
   	  	return 1;
   	  }
   	  else
   	  {
   	  	return 0;
   	  }
   }

}



?>