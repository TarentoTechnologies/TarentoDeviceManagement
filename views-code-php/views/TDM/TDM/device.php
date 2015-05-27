<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Device Management | Tarento Mobility</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Tarento Device Management">
        <!-- bootstrap 3.0.2 -->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="/public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="/public/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="/public/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Tarento
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span>Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="#">
                                    <i class="fa fa-clock-o fa-fw pull-right"></i>
                                        <span class="badge badge-success pull-right">10</span> Updates</a>
                                    <a href="#">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        <span class="badge badge-danger pull-right">5</span> Messages</a>
                                    <a href="#"><i class="fa fa-magnet fa-fw pull-right"></i>
                                        <span class="badge badge-info pull-right">3</span> Subscriptions</a>
                                    <a href="#"><i class="fa fa-question fa-fw pull-right"></i> <span class=
                                        "badge pull-right">11</span> FAQ</a>
                                </li>

                                <li class="divider"></li>

                                    <li>
                                        <a href="#">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <a data-toggle="modal" href="#modal-user-settings">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="#"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="dash">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="devices">
                                <i class="fa fa-gavel"></i> <span>Devices</span>
                            </a>
                        </li>

                        <li>
                            <a href="newdevice">
                                <i class="fa fa-globe"></i> <span>New Device </span>
                            </a>
                        </li>

                

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                   
                    <div class="row">
                        <div class="col-md-6">
                            <section class="panel">
                              <header class="panel-heading">
                                 <?php 
                                   print_r($device_id);

                                 ?>
                                 <input id="device_id" name="device_id" type="hidden" value=<?php print_r($device_id) ?> ></input>
                                 <input id="device_type" name="device_type" type="hidden" value=<?php print_r($device_type) ?> ></input>
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" method="get">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">ID</label>
                                          <div class="col-sm-10">
                                              <p id="auto_id"> 004 </p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Tag</label>
                                          <div class="col-sm-10">
                                              <p id="tag"> Tarento/iPhone/004 </p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Make</label>
                                          <div class="col-sm-10">
                                              <p id="make"> Apple </p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Model</label>
                                          <div class="col-sm-10">
                                              <p id="model"> iPhone4 </p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">OS</label>
                                          <div class="col-sm-10">
                                              <p id="os"> iOS </p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Version</label>
                                          <div class="col-sm-10">
                                              <p id="version"> 7.0.1 </p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">IMEI</label>
                                          <div class="col-sm-10">
                                              <p id="imei"> 8152340304682042 </p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Comments</label>
                                          <div class="col-sm-10">
                                             <p id="comment"> Data cable and Charger </p>
                                          </div>
                                      </div>
                                      
                                  </form>
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
                                      
                                    </table>
                                  
                              </div>
                            </section>

                        </div>

                    </div> <!-- end row 2-->

                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy Tarento India, 2015
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="/public/js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="/public/js/Director/app.js" type="text/javascript"></script>



         <script type="text/javascript">
  

$(document).ready(function(){var stuff = new Object();
  

  var device_id=document.getElementById("device_id").value;
  var device_type=document.getElementById("device_type").value;

    stuff = {

          "appId":1,

          "apiToken":"111111",

          "device_id":""+device_id+"",

          "type":""+device_type+""

          };
       

     $.ajax({
    url: 'device-management/get-device-info',
    type: 'POST',
   
    data: JSON.stringify(stuff),

    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function(result) {
    console.log(result["responseData"].id);
    var getres=result["responseData"];

      $.each(getres, function(i, item) {
          console.log(getres.type);
      
         document.getElementById("auto_id").innerHTML=getres.id;
         document.getElementById("tag").innerHTML=getres.device_id;
         document.getElementById("make").innerHTML=getres.make;
         document.getElementById("model").innerHTML=getres.type;
         document.getElementById("os").innerHTML=getres.os;
         document.getElementById("version").innerHTML=getres.version;
         document.getElementById("imei").innerHTML=getres.IMEI;
         document.getElementById("comment").innerHTML=getres.comments;
   })

    
  }
});
   });
       



</script>    



    </body>
</html>
