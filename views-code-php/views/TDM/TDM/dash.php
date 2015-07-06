<!DOCTYPE html>
<html lang="en">
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
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="./public/css/style.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
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
                                <li>
                                    <a href="resetpin">
                                        <i class="glyphicon glyphicon-lock"></i> <span>Reset PIN </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="changepwd">
                                        <i class="glyphicon glyphicon-lock"></i> <span>Change Password </span>
                                    </a>
                                </li>
                        

                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">

                    <div class="row" style="margin-bottom:5px;">


                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
                                    <span>12</span>
                                    iPhones
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                    <span>11</span>
                                    Android Phones
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                                <div class="sm-st-info">
                                    <span>6</span>
                                    iPads
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                                <div class="sm-st-info">
                                    <span>4</span>
                                    Android Tablets
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main row -->
                    
                    <div class="row">

                        <div class="col-md-12">
                           
<table>
  <tbody id="tbl_dash"></tbody>
</table>
          </div><!--end col-6 -->
          

                    </div>
                    
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy Tarento, 2015
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="./public/js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="./public/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="./public/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="./public/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
             <!-- Director App -->
        <script src="./public/js/Director/app.js" type="text/javascript"></script>

    

        <script type="text/javascript">
  

$(document).ready(function(){var stuff = new Object();
    stuff = {'appId':'1','apiToken':'111111'};
    
    console.log(stuff);

     $.ajax({
    url: 'device-management/list-device-types',
    type: 'POST',
   
    data: JSON.stringify(stuff),

    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function(result) {
    //console.log(result["responseData"][0]["id"]);
    var getres=result["responseData"];

      $.each(getres, function(i, item) {
          console.log(getres[i].type);
         
         var date = getres[i].created_at;

         document.getElementById("tbl_dash").innerHTML += "<tr><td>"+(getres[i].type)+"</td><td>"+(getres[i].cnt)+"</td></tr>";
         
         //document.getElementById("tbl_dash").innerHTML += "<tr><td>"+(getres[i].id)+"</td><td><form id=myform"+(getres[i].device_id)+" action=device method=POST><input type=hidden value="+(getres[i].device_id)+" id=hidid name=hidid></input><input type=hidden value="+(getres[i].type)+" id=hid-type name=hid-type></input><a id=dev_id name=dev_id href=# onclick=document.getElementById('myform"+(getres[i].device_id)+"').submit();>"+(getres[i].device_id)+"</a></form> </td><td>"+(getres[i].make)+"</td><td>"+(getres[i].type)+"</td><td>"+(getres[i].os)+"</td><td>"+(getres[i].version)+"</td><td><span class='label label-success'>Verified</span></td><td>"+(getres[i].first_name)+"</td><td>"+(date)+"</td></tr>";
      })

    
  }
});
   });
       



</script>    
</body>
</html>