<!DOCTYPE html>
<html>
<head>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
</head>
<body>


  <section class="content">


        <div class="alert alert-success alert-dismissable fadealert" id="success-alert" style="position:fixed;">
            <p>Password successfully changed.</p>
        </div>


        <div class="alert alert-danger alert-dismissable fadealert" id="fail-alert" style="position:fixed;">
            <p>Old password is wrong</p>
        </div>



                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <section class="panel">
                              <header class="panel-heading">
                                 Change Password
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" method="POST" id="pwdForm" name="pwdForm">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">User ID</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="user-id" name="user-id">
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="pass" name="pass">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         
                                          <div class="col-sm-10 col-md-offset-2">
                                               <button type="button" class="btn btn-info" onclick="changepwd()">Update</button>
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

});



function changepwd() {



    $("#user-id").css("border-color","#ccc");
    
    $("#pass").css("border-color","#ccc");
   


    var user_id=document.getElementById("user-id").value;
    var oldp=document.getElementById("old").value;
    var newp=document.getElementById("pass").value;
    
    if (user_id!="" & oldp!="" & newp!="") 
    {

         
          var stuff = new Object();
              stuff = 
              {

              "appId":1,

              "apiToken":"111111",

              "employee_id":""+user_id+"",

              "old_pin":""+oldp+"",

              "new_pin":""+newp+""

              };


            
               $.ajax({
              url: 'device-management/change-user-pin',
              type: 'POST',
             
              data: JSON.stringify(stuff),

              dataType: 'json',
              contentType: "application/json; charset=utf-8",
              success: function(result) {
              if(result["statusCode"]==200)
              {
                var getres=result["statusMessage"];
               
                document.getElementById("user-id").value="";
                document.getElementById("old").value="";
                document.getElementById("pass").value="";
                                



                $("#success-alert").fadeTo(2000, 50).slideUp(500, function(){
                $("#success-alert").addClass("in");

                });

                $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
                $("#success-alert").addClass("in");
               });

 
              }
              else
              {
               var getres=result["errorMessage"];
             
               $("#old").css("border-color","red"); 


                $("#fail-alert").fadeTo(2000, 50).slideUp(500, function(){
                $("#fail-alert").addClass("in");

                });

                $("#fail-alert").fadeTo(1000, 500).slideUp(500, function(){
                $("#fail-alert").addClass("in");
                });


              }


                $.each(getres, function(i, item) {
                  })

              
            }
          });

         


     }
     else
      {

        if(user_id=="")  { $("#user-id").css("border-color","red"); }
        
        if(newp==""){$("#pass").css("border-color","red");}
       }
  }


  </script>



<script>

</script>



</body>
</html>