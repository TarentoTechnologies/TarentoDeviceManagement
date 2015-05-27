<?php
 

Flight::route('/', function()
{
Flight::redirect('dash');
});

Flight::route('/dash', function()
{


    Flight::render('TDM/TDM/dash-layout', array(),'content');    
    Flight::render('TDM/TDM/layout');


});
Flight::route('/layout-check', function(){
	

    
    Flight::render('TDM/TDM/sample', array(),'content');    
    Flight::render('TDM/TDM/layout');     


});


Flight::route('/changepwd', function()
{


    Flight::render('TDM/TDM/changepassword-layout', array(),'content');    
    Flight::render('TDM/TDM/layout');


});

Flight::route('/resetpin', function()
{


    Flight::render('TDM/TDM/resetpin-layout', array(),'content');    
    Flight::render('TDM/TDM/layout');


});

Flight::route('/newdevice', function(){
	
    Flight::render('TDM/TDM/newdevice-layout', array(),'content');    
    Flight::render('TDM/TDM/layout');
    

});


Flight::route('POST /device', function(){

    $device_id=$_POST['hidid'];
    $device_type=$_POST['hid-type'];
    $device_auto_id=$_POST['hidautoid'];
    
    

    Flight::render('TDM/TDM/device-layout', array('device_id' => $device_id,'device_type' => $device_type,'device_auto_id' => $device_auto_id),'content');    
    Flight::render('TDM/TDM/layout');


    

});

Flight::route('/devices', function(){
	

    Flight::render('TDM/TDM/devices-layout', array('device_type' => 'All','device_version' => 'All','device_status' => 'All'),'content');    
    Flight::render('TDM/TDM/layout');


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


