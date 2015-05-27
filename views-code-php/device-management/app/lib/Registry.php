<?php
namespace App\lib;
use App\lib\DB;
//Singleton class to get db object

class Registry {
	private static $dbInstance;
	private function __construct() 
	{
	}
	public static function getDbInstance() {
		if (isset ( self::$dbInstance )) {
			return self::$dbInstance;
		} 
		else 
		{
			self::$dbInstance = new db();
			return self::$dbInstance;
		}
	}
} 