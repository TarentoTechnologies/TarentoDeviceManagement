<?php
/**
 * File_name: curl_class.php
 * 
  *
   *
 */
//require_once 'Generic_class.php';

class curl_class 
{
	public function __construct()
	{
	  
	}
	/**
	 * method_name:curl_process
	 * tasks:
	 * to set curl property
	 * to hit api url
	 * return the  output
	 *
     *
     *
     *
	 */
	public static function curl_process($_infoArray)
	{
		//print_r($_infoArray);
		//$header[]="apiResponse json";
		error_log(print_r($_infoArray,1));
		$header[]="apiResponse: json";
		$header[]="Content-type: application/json";
	
		//$header[]="Accept application/x-www-form-urlencoded";
		if($_infoArray['method'])
		$ch = curl_init($_infoArray['api_url'].'?'.$_infoArray['post_data']);
	    else
	    $ch = curl_init($_infoArray['api_url']);	
	error_log($_infoArray['api_url'].'?'.$_infoArray['post_data']);
		//header("HTTP/1.0 404 Not Found");
		curl_setopt($ch, CURLOPT_HEADER, 0);
	    if(!$_infoArray['method'])
		curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		if(!$_infoArray['method'])
		curl_setopt($ch, CURLOPT_POSTFIELDS,$_infoArray['post_data']);
         
         
		$output = curl_exec($ch);
		error_log($output);
      // $output=$header;
		if($output === false)
		{
			//echo 'Curl error: ' . curl_error($ch);
			//curl_close($ch);
			$output=curl_error($ch);
			
		}
		curl_close($ch);
		return $output;

		// Close handle

       


	}


}
/*$test=array();
$test["api_url"]="http://localhost:9000/add-device-info";
//$test["post_data"]=json_encode(array("appId"=>1,"apiToken"=>"111111"));
$test["post_data"]=json_encode(array("appId"=>1,"apiToken"=>"111111","deviceId"=>"shhhdfsa","name"=>"test","make"=>"tttt","type"=>"xxxx","os"=>"xxx","IMEI"=>"xxx","accessoryinfo"=>"xqwww","comments"=>"wqweqwewqe","employee_id"=>"111","purpose"=>"someText"));


$test["method"]=0;

$response=curl_class::curl_process($test);
echo "<pre>";
print_r($response);
echo "</pre>";*/

/*
$test=array();
    $link =  "http://$_SERVER[HTTP_HOST]";

    $test["api_url"]="http://localhost:9595/list-device-details";
    
    $test["post_data"]=json_encode(array("appId"=>1,"apiToken"=>"111111"));

    $test["method"]=0;

    $response=curl_class::curl_process($test);

echo "<pre>";
print_r($response);
echo "</pre>";*/

?>


