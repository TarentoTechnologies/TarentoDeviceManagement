<?php
namespace App\lib;
use App\lib\Config;
use  App\Controllers;
use App\lib\IoC;
use App\Models;
use App\lib\Registry;
class AppContainer 
{
      
	  public function __construct()
	  {
          
          $classes=Config::getAppClasses();
          error_log(print_r($classes,true));
          $dbInstance=Registry::getDbInstance();
          foreach($classes as $key=>$value)
          {
          	error_log("============================");
          	error_log(print_r($value,true));
          	
	  	   IoC::register("$key",function() use ($value,&$dbInstance)
           {
            //  $key =new $value();
              $class = new \ReflectionClass($value["mainclass"]);
              $instance = $class->newInstanceArgs($value["dependency"]);
              return $instance;
           });
	  	  }

       }
	 public function resolve($resolveObject)
	  {
	  	$testObject = IoC::resolve($resolveObject);
	  	return $testObject;
	  }
}