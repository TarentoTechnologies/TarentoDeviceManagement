<?php

namespace App\Controllers;

use \Flight;
use \GUMP;
use App\Models;

/*
 * AppController
 * To handle all the agent and app operations
 */
class AppController {
	protected $app;
	protected $admin;
	public function __construct($app,$admin) {
		$this->app = $app;
		$this->admin= $admin;

		// $this->dbObject=$databaseInstance;
	}
	/**
	 * deviceTransfer
	 *
	 * Assign device among user
	 *
	 * @param
	 *        	(type) (name) about this param
	 * @return (type) (name)
	 */
	public function deviceTransfer() {
		$deviceTransferInformationArray = array ();
		$deviceDetails = json_decode ( Flight::request ()->getBody (), true );
		$is_valid = GUMP::is_valid ( $deviceDetails, array (
				DEVICE_ID => 'required',
				DEVICE_TYPE=> 'required',
				OLD_USER_PIN => 'required',
				OLD_USER_IDENTIFIER => 'required',
				NEW_USER_PIN => 'required',
				NEW_USER_IDENTIFIER => 'required' 
		) );
		// print_r($deviceDetails);
		if ($is_valid === true) {
			$deviceTransferInformationArray [] = $deviceDetails [DEVICE_ID];
			$deviceTransferInformationArray [] = $deviceDetails [OLD_USER_IDENTIFIER];
			$deviceTransferInformationArray [] = $deviceDetails [OLD_USER_PIN];
			$deviceTransferInformationArray [] = $deviceDetails [NEW_USER_IDENTIFIER];
			$deviceTransferInformationArray [] = $deviceDetails [NEW_USER_PIN];
			$deviceTransferInformationArray [] = $deviceDetails [DEVICE_TYPE];

			$deviceInformationArray[]=$deviceDetails[DEVICE_ID];
           /*$deviceInformationArray[]=$deviceDetails[DEVICE_TYPE];*/
	
	
			
			// $deviceTransferInformationArray[]=(new \DateTime())->format('Y-m-d H:i:s');
			$response = $this->app->deviceTransferInfo ( $deviceTransferInformationArray );
            if($response["statusCode"]==200)
            {
			$responseDeviceInfo = $this->admin->getDeviceInfoFromIMEI($deviceInformationArray);
			$deviceDetails=$responseDeviceInfo[API_RESPONSE];
			$response[API_RESPONSE]=$deviceDetails;
		    }
		    else
		    {
		    	$response[API_RESPONSE]=array();
		    }
			Flight::json ( $response );
		} else {
			
			echo Flight::json ( array (
					API_RESPONSE_STATUS_CODE => 400,
					API_RESPONSE_STATUS_ERROR_MESSAGE => "Bad Request",
					API_RESPONSE => $is_valid 
			) );
		}
	}
	
	/**
	 * trackDevice
	 *
	 * Do device tracking
	 *
	 * @param
	 *        	(type) (name) about this param
	 * @return (type) (name)
	 */
	public function trackDevice() 
	{
		$deviceTransferInformationArray = array ();
		$deviceDetails = json_decode ( Flight::request ()->getBody (), true );
		$is_valid = GUMP::is_valid ( $deviceDetails, array (
				DEVICE_CURRENT_LOCATION => 'required',
				DEVICE_IP => 'required',
				WIFI_ADDRESS => 'required',
				DEVICE_ID => 'required',
				USER_PIN => 'required' 
		) );
		
		if ($is_valid === true) {
			$deviceTransferInformationArray [] = $deviceDetails [DEVICE_CURRENT_LOCATION];
			$deviceTransferInformationArray [] = $deviceDetails [DEVICE_IP];
			$deviceTransferInformationArray [] = $deviceDetails [WIFI_ADDRESS];
			$deviceTransferInformationArray [] = $deviceDetails [DEVICE_CURRENT_OS_VERSION];
			$deviceTransferInformationArray [] = $deviceDetails [DEVICE_ID];
			$deviceTransferInformationArray [] = $deviceDetails [USER_PIN];
			$response = $this->app->trackDeviceInformation ( $deviceTransferInformationArray );
			Flight::json ( $response );
		} else {
			
			echo Flight::json ( array (
					API_RESPONSE_STATUS_CODE => 400,
					API_RESPONSE_STATUS_ERROR_MESSAGE => "Bad Request",
					API_RESPONSE => $is_valid 
			) );
		}
	}
	
	/**
	 * sendPushToIphone
	 *
	 * It is doing push sending for Iphone
	 *
	 * @param  (type) (name) about this param
	 * @return (type) (name)
	 */
	/*public function sendPushToIphone($certificate, $data) {
		$tHost = 'gateway.push.apple.com';
		$tPort = 2195;
		// Provide the Certificate and Key Data.
		$tCert = $certificate;
		
		// Provide the Private Key Passphrase (alternatively you can keep this secrete
		
		// and enter the key manually on the terminal -> remove relevant line from code).
		
		// Replace XXXXX with your Passphrase
		
		$tPassphrase = 'changeit';
		
		// Provide the Device Identifier (Ensure that the Identifier does not have spaces in it).
		
		// Replace this token with the token of the iOS device that is to receive the notification.
		
		$tToken = $data ["registration_ids"];
		;
		
		error_log ( "device token" . $tToken );
		// The message that is to appear on the dialog.
		
		$tAlert = 'You have a LiveCode APNS Message';
		
		// The Badge Number for the Application Icon (integer >=0).
		
		$tBadge = 8;
		
		// Audible Notification Option.
		
		$tSound = 'default';
		
		// The content that is returned by the LiveCode "pushNotificationReceived" message.
		
		$tPayload = 'APNS Message Handled by LiveCode';
		
		// Create the message content that is to be sent to the device.
		
		$tBody ['aps'] = array (
				
				'alert' => $tAlert,
				
				'badge' => $tBadge,
				
				'sound' => $tSound,
				
				'appName' => $data ["data"] ["appName"] 
		);
		
		$tBody ['payload'] = $data ["data"];
		
		// Encode the body to JSON.
		
		$tBody = json_encode ( $tBody );
		
		// Create the Socket Stream.
		
		$tContext = stream_context_create ();
		
		stream_context_set_option ( $tContext, 'ssl', 'local_cert', $tCert );
		
		// Remove this line if you would like to enter the Private Key Passphrase manually.
		
		stream_context_set_option ( $tContext, 'ssl', 'passphrase', $tPassphrase );
		
		// Open the Connection to the APNS Server.
		
		$tSocket = stream_socket_client ( 'ssl://' . $tHost . ':' . $tPort, $error, $errstr, 30, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $tContext );
		
		// Check if we were able to open a socket.
		
		if (! $tSocket)
			
			exit ( "APNS Connection Failed: $error $errstr" . PHP_EOL );
			
			// Build the Binary Notification.
		
		$tMsg = chr ( 0 ) . chr ( 0 ) . chr ( 32 ) . pack ( 'H*', $tToken ) . pack ( 'n', strlen ( $tBody ) ) . $tBody;
		
		// Send the Notification to the Server.
		
		$tResult = fwrite ( $tSocket, $tMsg, strlen ( $tMsg ) );
		
		// echo 'Could not Deliver Message to APNS' . PHP_EOL;
		
		// Close the Connection to the Server.
		
		fclose ( $tSocket );
		if ($tResult) {
			
			error_log ( $tResult );
			return true;
		}  // echo 'Delivered Message to APNS' . PHP_EOL;

		else
			return false;
	}*/

	/**
	 * sendPushToAndroid
	 * It is doing send push for Android
	 *
	 *
	 * @param
	 *         (type) (name) about this param
	 * @return (type) (name)
	 */
	/*public function sendPushToAndroid() 
	{
		error_log ( print_r ( $_infoArray, 1 ) );
		define ( "GOOGLE_API_KEY", "BIzaSyCRLa4LQZWNQBcRCYcIVYA45i9i8zfClqc" );
		$header [] = "apiResponse: json";
		$header [] = "Content-type: application/json";
		$header [] = 'Authorization: key=' . GOOGLE_API_KEY;
		// $header[]="Accept application/x-www-form-urlencoded";
		if ($_infoArray ['method'])
			$ch = curl_init ( $_infoArray ['api_url'] . '?' . $_infoArray ['post_data'] );
		else
			$ch = curl_init ( $_infoArray ['api_url'] );
		error_log ( $_infoArray ['api_url'] . '?' . $_infoArray ['post_data'] );
		// header("HTTP/1.0 404 Not Found");
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		if (! $_infoArray ['method'])
			curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
		if (! $_infoArray ['method'])
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $_infoArray ['post_data'] );
		
		$output = curl_exec ( $ch );
		error_log ( $output );
		// $output=$header;
		/*
		 * if($output === false)
		 * {
		 * //echo 'Curl error: ' . curl_error($ch);
		 * //curl_close($ch);
		 * $output=curl_error($ch);
		 *
		 * }
		 */
		/*curl_close ( $ch );
		return $output;
	}*/

	public function sendPush()
	{
	
	}

}