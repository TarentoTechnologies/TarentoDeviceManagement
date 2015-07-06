


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="bg-black" xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Tarento Device Management System</title>
 
 <script src="./public/js/jquery.min.js" type="text/javascript"></script>
     <link href="./public/css/login-style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100">
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 100;
  src: local('Roboto Thin'), local('Roboto-Thin'), url(http://fonts.gstatic.com/s/roboto/v15/2tsd397wLxj96qwHyNIkxPesZW2xOQ-xsNqO47m55DA.woff2) format('woff2'), url(http://fonts.gstatic.com/s/roboto/v15/vzIUHo9z-oJ4WgkpPOtg1_esZW2xOQ-xsNqO47m55DA.woff) format('woff');
}
</link>

</head>
<body>
<form id="form1" action="login-check" method="post">


<div class="flat-form">
<ul class="tabs">
<li>
<a class="active" href="#">Login</a>
</li>
<!-- <li>
<a href="#reset"></a>
</li> -->
</ul>
<div id="login" class="form-action show">
<h1>Device Management System</h1>
<p> Please sign in with your intranet credentials. </p>
<ul>
<li>
<input id="txtUserName" type="text" placeholder="Username" name="txtUserName">
</li>
<li>
<input id="txtPassword" type="password" placeholder="Password" name="txtPassword">
</li>
<input id="txtmsg" type="hidden" name="txtmsg" value="<?php print_r($msg) ?>">
<!-- <li>
<p>
<input id="chkBoxKeepMeSigned" type="checkbox" name="chkBoxKeepMeSigned">
<label for="chkBoxKeepMeSigned">Keep me signed in</label>
</p>
</li> -->
<li>
<input id="btnSignIn" class="button" type="submit" onclick="return checkvalidation();" value="Login" name="btnSignIn">
</li>
<li id="errordiv" class="error" > </li>
</ul>
</div>
</div>


<script type="text/javascript">


$(document).ready(function()
{
	var msg = $('#txtmsg').val();
	if ($.trim(msg) != "") 
	{
        $("#errordiv").text('Invalid credentials');
        //alert("dskjf");
        //document.getElementById("txtmsg").innerHTML="";
     //   return false;
    }
})
		    
            function checkvalidation() {

		        var userName = $('#txtUserName').val();
		        var passWord = $('#txtPassword').val();
		        var msg = $('#txtmsg').val();
		        
		        if ($.trim(userName) == "") {
		            $("#errordiv").text('Please enter username');
		            return false;
		        }

		        if ($.trim(passWord) == "") {
		            $("#errordiv").text('Please enter password');
		            return false;
		        }
		        

		        return true;
		    }

		
</script>

</form>
</body>
</html>