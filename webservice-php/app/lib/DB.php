<?php
namespace App\lib;
use \PDO ;
class DB extends PDO {
  // database credetials
  const PARAM_host = 'localhost';
  const PARAM_port = '3306';
  const PARAM_db_name ='device-management';
  const PARAM_user = 'root';
  const PARAM_db_pass = 'welcome';
  public function __construct($options = null) {
    parent::__construct('mysql:host='. DB::PARAM_host .';port='. DB::PARAM_port .';dbname='. DB::PARAM_db_name .';charset=utf8',
        DB::PARAM_user,
        DB::PARAM_db_pass, $options
    );
    parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    parent::setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  }

  /**
   * For executing the query. with string replacement parameters as args.
   * @param $query
   *  query to be executed with replcament params to query.
   */
  public function query($query) { //secured query with prepare and execute
    $args = func_get_args();
    array_shift($args); //first element is not an argument but the query itself, should removed

    $reponse = parent::prepare($query);
    $arg = isset($args[0]) ? $args[0] : NULL;
    $reponse->execute($arg);
    return $reponse;
  }
}
