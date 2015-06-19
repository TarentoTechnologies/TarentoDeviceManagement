<!DOCTYPE html>
<html>
<head>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
</head>
<body>





  <section class="content">
                   

        <div class="alert alert-success alert-dismissable fadealert" id="success-alert" style="position:fixed;width:50%;margin-left:50%;">
            <p>New device added successfully</p>
        </div>
        <div class="alert alert-danger alert-dismissable fadealert" id="exists-alert" style="position:fixed;width:50%;margin-left:50%;">
            <p>Already exists. try with different</p>
        </div>


        <input id="log_user_id" name="log_user_id" type="hidden" value="<?php print_r($user_id) ?>"></input>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <section class="panel">
                              <header class="panel-heading">
                                 New Device
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" method="POST" id="deviceForm" name="deviceForm">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">ID</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="device-id" name="device-id">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Tag</label>
                                          <div class="col-sm-10">
                                              <input type="text" id="device-tag" name="device-tag" class="form-control">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Make</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="make" name="make">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Model</label>
                                          <div class="col-sm-10">
                                              <input type="select" class="form-control" id="model" name="model">                                              
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Type</label>
                                          <div class="col-sm-10">
                                              <!-- <input type="text" class="form-control" id="device_type" name="device_type"> -->
                                              <select class="form-control" id="device_type" name="device_type" >
                                               
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">OS</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="os" name="os">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Version</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="version" name="version">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">IMEI</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="imei" name="imei">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Comments</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="comment" name="comment">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         
                                          <div class="col-sm-10 col-md-offset-2">
                                               <button type="button" class="btn btn-info" onclick="add_newdevice()">Submit</button>
                                          </div>
                                      </div>
                                      

                                      
                                  </form>
                              </div>
                            </section>
                        
                        </div>
                    </div>
                </section><!-- /.content --> 



 <script type="text/javascript">
  

$(document).ready(function(){
  document.getElementById("device_type").innerHTML +="<option value='-1'></option><option value='0'>Iphone</option><option value='1'>Android</option><option value='2'>Android Tablet</option><option value='3'>ipad</option>";
});





  function add_newdevice() {




    var inputVal = $("#device-id").val();
    
    $(document).trigger("clear-alert-id.example");

    if (inputVal.length <=0) {

      $(document).trigger("set-alert-id-example", [
        {
          message: "Please enter at least 3 characters",
          priority: "error"
        },
        {
          message: "This is an info alert",
          priority: "info"
        }
      ]);
      
    }











    $("#device-id").css("border-color","#ccc");
    $("#device-tag").css("border-color","#ccc");
    $("#make").css("border-color","#ccc");
    $("#model").css("border-color","#ccc");
    $("#os").css("border-color","#ccc");
    $("#version").css("border-color","#ccc");
    $("#imei").css("border-color","#ccc");
    $("#comment").css("border-color","#ccc");
    $("#device_type").css("border-color","#ccc");



    var device_id=document.getElementById("device-id").value;
    var device_tag=document.getElementById("device-tag").value;
    var make=document.getElementById("make").value;
    var model=document.getElementById("model").value;
    var os=document.getElementById("os").value;
    var version=document.getElementById("version").value;
    var imei=document.getElementById("imei").value;
    var comment=document.getElementById("comment").value;
    var device_type=document.getElementById("device_type").value;
    var user_id=document.getElementById("log_user_id").value;

    if (device_id!="" & device_tag!="" & make!="" & model!=""& os!=""& version!="" & imei!="" & comment!="" & device_type!=-1) 
    {

            

          var stuff = new Object();
              stuff = {

           "appId":1,

           "apiToken":"111111",

            "deviceId":""+device_id+"",

            "name":""+device_tag+"",

            "make":""+make+"",

            "type":""+model+"",

            "os":""+os+"",

            "IMEI":""+imei+"",

            "accessoryinfo":"somInfo",

            "comments":""+comment+"",

            "employee_id":""+user_id+"",

            "purpose":"someText",

            "version":""+version+"",

            "type_id":""+device_type+""

          };
              

               $.ajax({
              url: 'device-management/add-device-info',
              type: 'POST',
             
              data: JSON.stringify(stuff),

              dataType: 'json',
              contentType: "application/json; charset=utf-8",
              success: function(result) {
              
              var getres=result["statusCode"];
              if (getres=="200" ) 
              {
                if (result["statusMessage"]=="Successfully added the device") 
                {
                    document.getElementById("device-id").value="";
                    document.getElementById("device-tag").value="";
                    document.getElementById("make").value="";
                    document.getElementById("model").value="";
                    document.getElementById("os").value="";
                    document.getElementById("version").value="";
                    document.getElementById("imei").value="";
                    document.getElementById("comment").value="";
                    document.getElementById("device_type").value=-1;

                    $("#success-alert").fadeTo(2000, 50).slideUp(500, function(){
                    $("#success-alert").addClass("in");

                    });

                    $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
                    $("#success-alert").addClass("in");
                     });

                }
                else
                {
                    $("#exists-alert").fadeTo(2000, 50).slideUp(500, function(){
                    $("#exists-alert").addClass("in");

                    });

                    $("#exists-alert").fadeTo(1000, 500).slideUp(500, function(){
                    $("#exists-alert").addClass("in");
                     });

                    $("#device-id").css("border-color","red");
                    $("#model").css("border-color","red");

                }
                
              }
              

                $.each(getres, function(i, item) {
                    })

              
            }
          });

/*          document.getElementById("device-id").value="";
          document.getElementById("device-tag").value="";
          document.getElementById("make").value="";
          document.getElementById("model").value="";
          document.getElementById("os").value="";
          document.getElementById("version").value="";
          document.getElementById("imei").value="";
          document.getElementById("comment").value="";
          document.getElementById("device_type").value=-1;

          $("#success-alert").fadeTo(2000, 50).slideUp(500, function(){
          $("#success-alert").addClass("in");

          });

          $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
          $("#success-alert").addClass("in");
           });
*/


     }
     else
      {

        if(device_id=="")  {$("#device-id").css("border-color","red"); }
        if(device_tag==""){$("#device-tag").css("border-color","red");} 
        if(make==""){$("#make").css("border-color","red");}
        if(model==""){$("#model").css("border-color","red");}
        if(os==""){$("#os").css("border-color","red");}
        if(version==""){$("#version").css("border-color","red");}
        if(imei=="")$("#imei").css("border-color","red");{}
        if(comment==""){$("#comment").css("border-color","red");}
        if(device_type==-1) {$("#device_type").css("border-color","red");}
      }
  }
  </script>



<script>
$(function(){
  $("#deviceForm").submit(function() {
   
    var inputVal = $("#device-id").val();
    
    $(document).trigger("clear-alert-id.example");
    if (inputVal.length <=0) {
      $(document).trigger("set-alert-id-example", [
        {
          message: "Please enter at least 3 characters",
          priority: "error"
        },
        {
          message: "This is an info alert",
          priority: "info"
        }
      ]);
    }
  });
});
</script>



</body>
</html>