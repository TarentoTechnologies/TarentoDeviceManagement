<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>
<body>



 <section class="content">


<div class="alert alert-success alert-dismissable fadealert" id="success-alert" style="position:fixed;">
            <p>Updated successfully</p>
        </div>
   
                    <div class="row">

                        <div class="col-md-6">
                            <section class="panel">

                              <header class="panel-heading">
                                 <?php 
                                   print_r($device_id);
                                 ?>
                                 
                                 <span class="glyphicon glyphicon-edit" id="editDeviceForm" style="float: right;color:#333;cursor:pointer;"></span>
                                 
                                 
                                 <input id="device_id" name="device_id" type="hidden" value=<?php print_r($device_id) ?> ></input>
                                 <input id="device_type" name="device_type" type="hidden" value=<?php print_r($device_type) ?> ></input>
                                 <input id="device_auto_id" name="device_auto_id" type="hidden" value=<?php print_r($device_auto_id) ?> ></input>
                              </header>

                              <div class="panel-body">

<!-- editing start -->

                    <div class="row" id="editdiv" name="editdiv" style="z-index:1000;display:none;">
                        <div class="col-md-24 ">
                            <section class="panel">
                             
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" method="POST" id="deviceFormEdit" name="deviceFormEdit">
                                    
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Make</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="makeEdit" name="makeEdit">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Model</label>
                                          <div class="col-sm-10">
                                              <input type="select" class="form-control" id="modelEdit" name="modelEdit">                                              
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Type</label>
                                          <div class="col-sm-10">
                                              <select class="form-control" id="device_typeEdit" name="device_typeEdit" >
                                               
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">OS</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="osEdit" name="osEdit">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Version</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="versionEdit" name="versionEdit">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">IMEI</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="imeiEdit" name="imeiEdit">
                                          </div>
                                      </div>
                                     
                                      <div class="form-group">
                                         
                                          <div class="col-sm-10 col-md-offset-2">
                                               <button type="button" class="btn btn-info" onclick="deviceEditFun()">Update</button>
                                          </div>
                                      </div>
                                      

                                      
                                  </form>
                              </div>
                            </section>
                        
                        </div>
                    </div>
           


<!-- editing end -->


                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">ID</label>
                                          <div class="col-sm-10">
                                              <p id="auto_id"> <!-- 004 --> </p>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Tag</label>
                                          <div class="col-sm-10">
                                              <p id="tag"> <!-- Tarento/iPhone/004 --> </p>
                                              <input type="hidden" id="tagHidden" name="tagHidden"></input>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Make</label>
                                          <div class="col-sm-10">
                                              <p id="make"> <!-- Apple --> </p>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Model</label>
                                          <div class="col-sm-10">
                                              <p id="model"> <!-- iPhone4 --> </p>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Type</label>
                                          <div class="col-sm-10">
                                              <p id="type"> <!-- iPhone4 --> </p>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">OS</label>
                                          <div class="col-sm-10">
                                              <p id="os"> <!-- iOS --> </p>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Version</label>
                                          <div class="col-sm-10">
                                              <p id="version"> <!-- 7.0.1  --></p>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">IMEI</label>
                                          <div class="col-sm-10">
                                              <p id="imei"> <!-- 8152340304682042 --> </p>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Comments</label>

                                          <div class="col-sm-10">    
                                          <input type="text" id="commentarea" name="commentarea" placeholder="Enter your commant here..."  class="form-control" onfocus="cmtFocus()" onkeydown="cmtSubmit(event)"> </input>
                                             <div id="" style="overflow:scroll; height:200px;border-color:gray;background-color: rgb(240,243,244); border-color:rgb(240,243,244);border-width:1;border-style:solid;"><p id="comment"> <!-- Data cable and Charger --> </p></div>
                                          </div>
                                      </div>
                                      <br>
                                      
                                
                              </div>







                            </section>
                        
                        </div>
                        <div class="col-md-6">
                            <section class="panel">
                              <header class="panel-heading">
                                 Location Map
                              </header>
                              <div class="panel-body">


                              </div>
                            </section>
                         </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                          <section class="panel">
                              <header class="panel-heading">
                                 Trace
                              </header>
                              <div class="panel-body">
                                  <table class="table table-hover">
                                        <tr>
                                            
                                            <th>Owner</th>
                                            <th>Status</th>
                                            <th>IP</th>
                                            <th>Location</th>
                                            <th>WiFi</th>
                                            <th>Time</th>
                                        </tr>
                                        <tbody id="tbl_track"></tbody>
                                      
                                    </table>
                                  
                              </div>
                            </section>

                        </div>

                    </div> <!-- end row 2-->




  








                </section><!-- /.content -->



         <script type="text/javascript">
  

  
var devid;
var devmake;
var devtype;
var devos;
var devversion;
var devimei;
var devtypeid;



$(document).ready(function()
{

    $("#editDeviceForm").click(function(){


$("#makeEdit").css("border-color","#ccc");
  $("#modelEdit").css("border-color","#ccc");
  $("#osEdit").css("border-color","#ccc");
  $("#versionEdit").css("border-color","#ccc");
  $("#imeiEdit").css("border-color","#ccc");
  $("#device_typeEdit").css("border-color","#ccc");


        document.getElementById("makeEdit").value=devmake;
         document.getElementById("modelEdit").value=devtype;
         document.getElementById("osEdit").value=devos;
         document.getElementById("versionEdit").value=devversion;
         document.getElementById("imeiEdit").value=devimei;
         document.getElementById("device_typeEdit").value=devtypeid;


        $("#editdiv").toggle(500);  


    });

   
document.getElementById("device_typeEdit").innerHTML="";

 deviceFun();


 
   });





function deviceEditFun()
{


  $("#makeEdit").css("border-color","#ccc");
  $("#modelEdit").css("border-color","#ccc");
  $("#osEdit").css("border-color","#ccc");
  $("#versionEdit").css("border-color","#ccc");
  $("#imeiEdit").css("border-color","#ccc");
  $("#device_typeEdit").css("border-color","#ccc");




  var makeEdit=document.getElementById("makeEdit").value;
  var typeEdit=document.getElementById("modelEdit").value;
  var osEdit=document.getElementById("osEdit").value;
  var versionEdit=document.getElementById("versionEdit").value;
  var imeiEdit=document.getElementById("imeiEdit").value;
  var typeidEdit=document.getElementById("device_typeEdit").value;
 
 if (makeEdit!="" & typeEdit!="" & osEdit!="" & versionEdit!=""& imeiEdit!=""& typeidEdit!="") 
    {

      var stuff = new Object();
                  document.getElementById("commentarea").value="";
             



      document.getElementById("tbl_track").innerHTML="";
      document.getElementById("comment").innerHTML="";





          stuff = {

                "appId":1,

                "apiToken":"111111",

                "make":""+makeEdit+"",
                "type":""+typeEdit+"",
                "os":""+osEdit+"",
                "version":""+versionEdit+"",
                "imei":""+imeiEdit+"",
                "type_id":""+typeidEdit+"",
                "id":""+devid+""

                };

           $.ajax({
          url: 'device-management/edit-device-info',
          type: 'POST',
         
          data: JSON.stringify(stuff),

          dataType: 'json',
          contentType: "application/json; charset=utf-8",
          success: function(result) {

        }
      });
      $("#editdiv").toggle(500);  
      document.getElementById("device_type").value=typeEdit      
      deviceFun();
        $("#success-alert").fadeTo(2000, 50).slideUp(500, function(){
          $("#success-alert").addClass("in");

          });
    }
   else
      {

        if(makeEdit=="")  { $("#makeEdit").css("border-color","red"); }
        if(typeEdit==""){$("#modelEdit").css("border-color","red");} 
        if(osEdit==""){$("#osEdit").css("border-color","red");}
        if(versionEdit==""){$("#versionEdit").css("border-color","red");}
        if(imeiEdit==""){$("#imeiEdit").css("border-color","red");}
        if(typeidEdit==""){$("#device_typeEdit").css("border-color","red");}
        
      }
}




function deviceFun()
{
 

var stuff = new Object();
document.getElementById("commentarea").value="";


document.getElementById("tbl_track").innerHTML="";
document.getElementById("comment").innerHTML="";



  var device_id=document.getElementById("device_id").value;
  var device_type=document.getElementById("device_type").value;

    stuff = {

          "appId":1,

          "apiToken":"111111",

          "device_id":""+device_id+"",

          "type":""+device_type+""

          };
        

     $.ajax({
    url: 'device-management/get-device-info-track',
    type: 'POST',
   
    data: JSON.stringify(stuff),

    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function(result) {
    
    devtypeid=result["responseData"][0][0].type_id
    var getres=result["responseData"][0];

      $.each(getres, function(i, item) {
         
         
        if(getres[i].id==document.getElementById("device_auto_id").value)
        {
         
         document.getElementById("auto_id").innerHTML=getres[i].id;
         devid=getres[i].id;

         document.getElementById("tag").innerHTML=getres[i].device_id;
         document.getElementById("tagHidden").value=getres[i].device_id;
         document.getElementById("make").innerHTML=getres[i].make;
         devmake=getres[i].make;

         document.getElementById("model").innerHTML=getres[i].type;
         devtype=getres[i].type;

         document.getElementById("type").innerHTML=result["responseData"][3][devtypeid];
         

         document.getElementById("os").innerHTML=getres[i].os;
         devos=getres[i].os;

         document.getElementById("version").innerHTML=getres[i].version;
         devversion=getres[i].version;

         document.getElementById("imei").innerHTML=getres[i].IMEI;
         devimei=getres[i].IMEI;
      

//console.log(getres[i].id);
return false;
  }
      })

 getres=result["responseData"][1];
 $.each(getres, function(i, item) {
  if (getres[i].status==1)
          {
            document.getElementById("tbl_track").innerHTML += "<tr><td>"+(getres[i].first_name)+"</td><td><div class='progress'><div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'>Verified</div></div></td><td>"+(getres[i].ip)+"</td><td>"+(getres[i].current_location)+"</td><td>"+(getres[i].wifi)+"</td><td>"+(getres[i].track_create)+"</td></tr>";
          }
          else
          {
            document.getElementById("tbl_track").innerHTML += "<tr><td>"+(getres[i].first_name)+"</td><td><div class='progress'><div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'>Not - Verified</div></div></td><td>"+(getres[i].ip)+"</td><td>"+(getres[i].current_location)+"</td><td>"+(getres[i].wifi)+"</td><td>"+(getres[i].track_create)+"</td></tr>";
          }
 })

document.getElementById("device_typeEdit").innerHTML="";
for (var key in result["responseData"][3]) {
 

  
  if (devtypeid==key) 
  {
    document.getElementById("device_typeEdit").innerHTML +="<option selected value="+key+">"+result["responseData"][3][key]+"</option>";
   
  }
  else
  {
    document.getElementById("device_typeEdit").innerHTML +="<option value="+key+">"+result["responseData"][3][key]+"</option>";
  }
  
}

getres=result["responseData"][2];
 $.each(getres, function(i, item) {
         
         document.getElementById("comment").innerHTML+="------------<br>On "+getres[i].created_on+"<br>"+getres[i].comments+"<br>------------<br><br>";
         
        
  
      })




  }
});


}

function cmtFocus()
{
  $("#editdiv").hide(500);  
}

function cmtSubmit(e)
{

  

 if(e.which==13)
 {

  var device_id=document.getElementById("tagHidden").value;
  var cmt=document.getElementById("commentarea").value;

 

    if (device_id!="" & cmt!="") 
    {

          var stuff1 = new Object();
              stuff1 = {

           "appId":1,

           "apiToken":"111111",

            "device_id":""+device_id+"",

            "comment":""+cmt+""
            

          };
            

               $.ajax({
              url: 'device-management/add-comment',
              type: 'POST',
             
              data: JSON.stringify(stuff1),

              dataType: 'json',
              contentType: "application/json; charset=utf-8",
              success: function(result) {
              var getres=result["responseData"];

               /* $.each(getres, function(i, item) {
                      })*/

              
            }
          });

  deviceFun();




     }
     else {}


 }
}


</script>    




</body>
</html>