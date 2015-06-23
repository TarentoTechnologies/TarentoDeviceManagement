<!DOCTYPE html>
<html>
<head>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
</head>
<body>




            <!-- Right side column. Contains the navbar and content of the page -->
           

                <!-- Main content -->
                <section class="content">
                   
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                   Assigned Devices

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                      <!--   <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 350px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div> -->
                                    </div>
                                    
                                    <input type="hidden" id="typetext" name="typetext" value="<?php print_r($device_type);?>">


                                    <input type="hidden" id="versiontext" name="versiontext" value="<?php print_r($device_version);?>">

                                    <input type="hidden" id="statustext" name="statustext" value="<?php print_r($device_status);?>">

                                    <input type="hidden" id="usertext" name="usertext" value="<?php print_r($user);?>">

                                    <input type="hidden" id="useridtext" name="useridtext" value="<?php print_r($user_id);?>">
                                    
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>Device-ID</th>
                                            <th>Tag</th>
                                            <th>Make</th>
                                            <th>Type</th>
                                            <th>Model</th>
                                            <th>OS</th>
                                            <th>Version</th>
                                            <!-- <th>Status</th> -->
                                            <!-- <th>Owner</th> -->
                                            <th>Last verified</th>
                                        </tr>
                                        <tbody id="tbl_devices" >

                                       </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->





<script type="text/javascript">
  

        $(document).ready(function()
        {
            listdevicedetails();
       });
           
function listdevicedetails()
{

            var useridtext=document.getElementById("useridtext").value;

            var stuff = new Object();



            stuff = {

                    "appId":1,

                    "apiToken":"111111",

                    "user_id":""+useridtext+""

                    };
              
            

             $.ajax({
            url: 'device-management/list-device-details-user',
            type: 'POST',
           
            data: JSON.stringify(stuff),

            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            success: function(result) {
            var getres=result["responseData"];
            getres=getres[0];
            var typetext=document.getElementById("typetext").value
            var versiontext=document.getElementById("versiontext").value
            var statustext=document.getElementById("statustext").value

              $.each(getres, function(i, item) {
                 //getres[i].type_id==typetext 
                 var chk=0;
                 if (versiontext=="All" & typetext=="All") {                    
                    chk=1;
                 }
                 else if (versiontext=="All" & typetext!="All" & getres[i].type_id==typetext ) {
                    chk=1;
                 }
                 else if (versiontext!="All" & typetext=="All" & getres[i].version==versiontext ) {
                    chk=1;  
                 }
                 else if(getres[i].version==versiontext & getres[i].type_id==typetext ) {
                    chk=1;
                 }

                 if (chk==1) {
                    if (getres[i].device_status==statustext || statustext=="All") {
                        var date = getres[i].created_at;                 
                        /*<td>"+(getres[i].first_name)+"</td>*/
                        document.getElementById("tbl_devices").innerHTML += "<tr><td>"+(getres[i].id)+"</td><td>"+(getres[i].device_id)+" </td><td>"+(getres[i].name)+"</td><td>"+(getres[i].make)+"</td><td>"+(getres[i].type_id)+"</td><td>"+(getres[i].type)+"</td><td>"+(getres[i].os)+"</td><td>"+(getres[i].version)+"</td><td>"+(date)+"</td></tr>";
                    }
                    
                 }
                 
                 })

                
              }
            });
}


</script>   



</body>
</html>