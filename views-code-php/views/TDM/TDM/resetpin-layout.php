<!DOCTYPE html>
<html>
<head>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
</head>
<body>


  <section class="content">


        <div class="alert alert-success alert-dismissable fadealert" id="success-alert" style="position:fixed;">
            <p>Pin successfully updated.</p>
        </div>


        <div class="alert alert-danger alert-dismissable fadealert" id="fail-alert" style="position:fixed;">
            <p>Something went wrong</p>
        </div>



                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <section class="panel">
                              <header class="panel-heading">
                                 Reset Pin
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" id="pwdForm" name="pwdForm">
                                     <!--  <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">User ID</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="user-id" name="user-id">
                                          </div>
                                      </div> -->
                                      <input type="hidden" id="useridtxt" name="useridtxt" value=<?php print_r($user_id); ?>>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">PIN</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="pass" name="pass" autocomplete="off">
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



$("#pass").on("keydown",function search(e) {
    if(e.keyCode == 13) {
        //console.log($(this).val());
        changepwd()
    }
});




function changepwd() {

//console.log("sdfkj");

    $("#useridtxt").css("border-color","#ccc");
    
    $("#pass").css("border-color","#ccc");
   


    var user_id=document.getElementById("useridtxt").value;

    var pin=document.getElementById("pass").value;
    
    if (user_id!="" & pin!="") 
    {
         
          var stuff = new Object();
              stuff = 
                      {

                      "appId":1,

                      "apiToken":"111111",

                      "employee_id":""+user_id+"",

                      "pin":""+pin+""

                      };

              


            
              $.ajax({
              url: 'device-management/reset-user-pin',
              type: 'POST',
             
              data: JSON.stringify(stuff),

              dataType: 'json',
              contentType: "application/json; charset=utf-8",
              success: function(result) {
                /*console.log(result);
                console.log(user_id);
                console.log(pin);*/
              if(result["statusCode"]==200)
              {
                var getres=result["statusMessage"];
               
                /*document.getElementById("user-id").value="";
                document.getElementById("old").value="";*/
                document.getElementById("pass").value="";

                            console.log(window.location.href);



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
        if(pin==""){$("#pass").css("border-color","red");}
      }
  }


  </script>



<script>

</script>



</body>
</html>