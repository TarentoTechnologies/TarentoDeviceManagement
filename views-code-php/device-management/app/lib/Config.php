<?php
/**
 * To manage class and its dependencies
 *
 * getAppClasses return array.when user wants to resolve class and its dependencies.They need to call
 * Example:IOC::resolve('admin')-It will return object of class with its dependencies
 * @param (type) (name) about this param
 * @return (type) (name)
 */

namespace App\lib;
class Config
{
	  public static function getAppClasses()
	  {
	  	  //mainclass is controller name .dependency mention its dependent classes
	  	  //return array("admin"=>"App\Controllers\AdminController","user"=>"App\Controllers\UserController");
	  	   return array("admin"=>array("mainclass"=>"App\Controllers\AdminController","dependency"=>array(new \App\Models\Admin)),"user"=>array("mainclass"=>"App\Controllers\UserController","dependency"=>array(new \App\Models\User)),"app"=>array("mainclass"=>"App\Controllers\AppController","dependency"=>array(new \App\Models\App,new \App\Models\Admin)));
	
	  }
}

?>