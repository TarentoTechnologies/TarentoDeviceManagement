<?php
use App\lib\DB;

Flight::route('/', function()
{
    Flight::redirect('home');
});

Flight::route('/role', function()
{
    Flight::redirect('device-management/check-user-role');
});





Flight::route('POST /login-check', function()
{
   
    $user=$_POST['txtUserName'];
    $pass=$_POST['txtPassword'];


    $url=$user.":".$pass."@greenpine.idc.tarento.com/users/current.xml?include=memberships,groups";

    $url="https://".$url;


    $str=@file_get_contents($url);    
    if ($str!="") 
    {

        $xml = simplexml_load_string($str);    
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        

        $url="http://inet.idc.tarento.com/getPeople";
         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        if(!empty($post)) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            //print_r($post);
        } 

        $result = curl_exec($ch);
        $res=json_decode($result,TRUE);
        curl_close($ch);
        foreach ($res["people"] as $value) 
        {
            if (strtolower($user)==strtolower($value["email"])) 
            {

                $dbobj=new DB();                
                $tdm_obj=new tdm_class($dbobj);
                $role=$tdm_obj->tdmdash($value["employee_id"]);    

/* To add new user if not existing */
                $userDetails=array();
                $userDetails[0]=$array["firstname"];
                $userDetails[1]=$array["lastname"];
                $userDetails[2]=$value["employee_id"];
                $userDetails[3]="111";                
                $userDetails[4] = date('Y-m-d h:i:s a', time());
                $userDetails[5] = date('Y-m-d h:i:s a', time());
                //print_r($userDetails);

                $userentry=$tdm_obj->addNewUser($userDetails);




                Session::put('user', $value["employee_id"]);
                Session::put('pass', $pass);
                Session::put('name', $array["firstname"]." ".$array["lastname"]);
                Session::put('role', $role);
                //print_r($_SESSION);


                    if ($userentry==1) { }
                    else
                    {
                          Flight::redirect('resetpin');   
                    }

            }   
        }








/*
$test["post_data"]=json_encode(array("appId"=>1,"apiToken"=>"111111","first_name"=>"111111","last_name"=>"111111","employee_id"=>"102031","pin"=>"111111"));
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost:9191/add-user");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$test["post_data"]);

$resultUser=curl_exec ($ch);
$resUser=json_decode($resultUser,TRUE);
print_r($resUser);
curl_close ($ch); 




*/        
     
    }
    else
    {
         Flight::redirect('/homeRedirect');
    }



if (isset($_SESSION['user']))
 { 
    if ($_SESSION['role']=='1')
    {
        Flight::redirect('dash');
    }
    else
    {
       Flight::redirect('devices-user');   
    }
 }
 else
 {
    Flight::redirect('/homeRedirect');   
 }

    

});

Flight::route('/home', function()
{

    session::destroy();
    Flight::render('TDM/TDM/login',array('msg'=>""));

});
Flight::route('/homeRedirect', function()
{
    session::destroy();    
    Flight::render('TDM/TDM/login',array('msg'=>"Invalid"));
});


Flight::route('/dash', function()
{

 if (isset($_SESSION['user']))
 {    
    if ($_SESSION['role']=='1')
    {
        Flight::render('TDM/TDM/dash-layout', array(),'content');    
        Flight::render('TDM/TDM/layout');
    }
    else
    {
        print_r("<html><head></head><body><h1>404 Not Found</h1><h3>The page you have requested could not be found.</h3></body></html>");
    }
 }
 else
 {
    Flight::redirect('/');   
 }
 


});
Flight::route('/layout-check', function(){
        
    Flight::render('TDM/TDM/sample', array(),'content');    
    Flight::render('TDM/TDM/layout');   

});


Flight::route('/changepwd', function()
{

 
 if (isset($_SESSION['user']))
 {
    Flight::redirect("https://greenpine.idc.tarento.com/my/password");
 }
 else
 {
    Flight::redirect('/');
 } 

});

Flight::route('/resetpin', function()
{
 if (isset($_SESSION['user']))
 {

    Flight::render('TDM/TDM/resetpin-layout', array('user_id'=>$_SESSION["user"],'user'=>$_SESSION["name"]),'content');
    Flight::render('TDM/TDM/layout-user');
 }
 else
 {
    Flight::redirect('/');
 } 

});

Flight::route('/resetpin-admin', function()
{
 if (isset($_SESSION['user']))
 {

    Flight::render('TDM/TDM/resetpin-layout', array('user_id'=>$_SESSION["user"],'user'=>$_SESSION["name"]),'content');
    Flight::render('TDM/TDM/layout');
 }
 else
 {
    Flight::redirect('/');
 } 

});

Flight::route('/newdevice', function(){
    
if (isset($_SESSION['user']))
 {    
    if ($_SESSION['role']=='1')
    {
        Flight::render('TDM/TDM/newdevice-layout', array('user_id'=>$_SESSION["user"]),'content');    
        Flight::render('TDM/TDM/layout');
    }
    else
    {
        print_r("<html><head></head><body><h1>404 Not Found</h1><h3>The page you have requested could not be found.</h3></body></html>");
    }
 }
 else
 {
    Flight::redirect('/');   
 }
    

});


Flight::route('POST /device', function(){

    $device_id=$_POST['hidid'];
    $device_type=$_POST['hid-type'];    
    $device_auto_id=$_POST['hidautoid'];
    

    Flight::render('TDM/TDM/device-layout', array('device_id' => $device_id,'device_type' => $device_type,'device_auto_id' => $device_auto_id),'content');    
    Flight::render('TDM/TDM/layout');

});

Flight::route('/devices', function()
{
    if (isset($_SESSION['user']))
     {    
        if ($_SESSION['role']=='1')
        {   
            Flight::render('TDM/TDM/devices-layout', array('device_type' => 'All','device_version' => 'All','device_status' => 'All'),'content');    
            Flight::render('TDM/TDM/layout');
        }
        else
        {
            print_r("<html><head></head><body><h1>404 Not Found</h1><h3>The page you have requested could not be found.</h3></body></html>");
        }
     }
     else
     {
        Flight::redirect('/');   
     }

});

Flight::route('/devices-user', function(){


 if (isset($_SESSION['user']))
 {    
    if ($_SESSION['role']!='1')
    {    
        Flight::render('TDM/TDM/devices-layout-user', array('device_type' => 'All','device_version' => 'All','device_status' => 'All','user_id' => $_SESSION["user"],'user'=>$_SESSION["name"]),'content');
        Flight::render('TDM/TDM/layout-user');
    }
    else
    {
        print_r("<html><head></head><body><h1>404 Not Found</h1><h3>The page you have requested could not be found.</h3></body></html>");
    }
 }
 else
 {
    Flight::redirect('/');   
 }

});


Flight::route('POST /devicesPost', function(){
    
    $device_type=$_POST['hidtype'];
    Flight::render('TDM/TDM/devices-layout', array('device_type' => $device_type,'device_version' => 'All','device_status' => 'All'),'content');    
    Flight::render('TDM/TDM/layout');


});
Flight::route('POST /devicesPie', function(){
    
    
    $device_type=$_POST['hidtype'];
    $device_version=$_POST['hidversion'];


    Flight::render('TDM/TDM/devices-layout', array('device_type' => $device_type,'device_version' => $device_version,'device_status' => 'All'),'content');    
    Flight::render('TDM/TDM/layout');


});


Flight::route('POST /devicesStatus', function(){
    
    
    $device_type=$_POST['hidtype'];
    $device_status=$_POST['hidstatus'];


    Flight::render('TDM/TDM/devices-layout', array('device_type' => $device_type,'device_version' => "All",'device_status' => $device_status),'content');    
    Flight::render('TDM/TDM/layout');


});


?>