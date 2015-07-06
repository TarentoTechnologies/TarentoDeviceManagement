<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Device Management | Tarento Mobility</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Tarento Device Management">
        <!-- bootstrap 3.0.2 -->
        <link href="./public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="./public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="./public/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="./public/css/style.css" rel="stylesheet" type="text/css" />

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
                        <div class="col-md-8 col-md-offset-2">
                            <section class="panel">
                              <header class="panel-heading">
                                 New Device
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" method="POST">
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
                                              <input type="text" class="form-control" id="model" name="model">
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
                <div class="footer-main">
                    Copyright &copy Tarento India, 2015
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="./public/js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="./public/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="./public/js/Director/app.js" type="text/javascript"></script>



 <script type="text/javascript">
  

  function add_newdevice() {
    var device_id=document.getElementById("device-id").value;
    var device_tag=document.getElementById("device-tag").value;
    var make=document.getElementById("make").value;
    var model=document.getElementById("model").value;
    var os=document.getElementById("os").value;
    var version=document.getElementById("version").value;
    var imei=document.getElementById("imei").value;
    var comment=document.getElementById("comment").value;

    if (device_id!="" & device_tag!="" & make!="" & model!=""& os!=""& version!="" & imei!="" & comment!="") 
    {

            

        //alert(device_id);
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

            "accessoryinfo":"xqwww",

            "comments":""+comment+"",

            "employee_id":"111",

            "purpose":"someText",

            "version":""+version+""

          };
              
              console.log(stuff);

               $.ajax({
              url: 'device-management/add-device-info',
              type: 'POST',
             
              data: JSON.stringify(stuff),

              dataType: 'json',
              contentType: "application/json; charset=utf-8",
              success: function(result) {
              console.log(result["responseData"][0]["id"]);
              var getres=result["responseData"];

                $.each(getres, function(i, item) {
                    console.log(getres[i].type);
                   
                   var date = getres[i].created_at;
                   
                 })

              
            }
          });

document.getElementById("device-id").value="";
document.getElementById("device-tag").value="";
document.getElementById("make").value="";
document.getElementById("model").value="";
document.getElementById("os").value="";
document.getElementById("version").value="";
document.getElementById("imei").value="";
document.getElementById("comment").value="";


     }
     else
     {
      
     }
  }




</script>  


    </body>


</html>
