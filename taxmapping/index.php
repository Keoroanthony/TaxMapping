<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["login"]["username"].value;
if (x==null || x=="")
  {
  alert("Username must be filled out");
  return false;
  }
var x=document.forms["login"]["password"].value;
if (x==null || x=="")
  {
  alert("Reference number must be filled out");
  return false;
  }
}
</script>
<script type="text/javascript">
function validateForms()
{
var x=document.forms["regs"]["password"].value;
if (x==null || x=="")
  {
  alert("password must be filled out");
  return false;
  }
var x=document.forms["regs"]["username"].value;
if (x==null || x=="")
  {
  alert("username must be filled out");
  return false;
  }
var x=document.forms["regs"]["fname"].value;
if (x==null || x=="")
  {
  alert("Firstname must be filled out");
  return false;
  }
var x=document.forms["regs"]["lname"].value;
if (x==null || x=="")
  {
  alert("Lastname must be filled out");
  return false;
  }
var password = document.forms["regs"]["password"].value;

        if (password.length < 5)
		{

            alert('Password should have miniumum 5 chars');
			return false;
		}
var username = document.forms["regs"]["username"].value;

        if (password.length < 5)
		{

            alert('Username should have miniumum 5 chars');
			return false;
		}
}
</script>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Tax Mapping</title>

        

        <!-- Our CSS stylesheet file -->

        <link rel="stylesheet" href="styles.css" />

        

        <!--[if lt IE 9]>

          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

        <![endif]-->

    </head>

    

<body>
<div id="header">
	<div id="headercontent">
		Tax Mapping System
		
	</div>
</div>
	
</div>


		<div id="formContainer">

			<form id="login" name="login" method="post" action="login.php" style="height: 222px;" onsubmit="return validateForm()">

				
				<h1>
				<div style="width: 190px; float:left;">
				<strong>Tax Mapping</strong>
				<br>Login your account!</br>
				</div>
				<div style="width: 60px; float:right;">
				<a href="#" id="flipToRecover" class="flipLink">Register User</a>
				</div>
				<div class="clearfix"></div>
				</h1>
					<div style="padding-left: 38px;">
					<?php
					if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
					echo '<ul class="err">';
					foreach($_SESSION['ERRMSG_ARR'] as $msg) {
					echo '<li>',$msg,'</li>';
					}
					echo '</ul>';
					unset($_SESSION['ERRMSG_ARR']);
					}
					?>
					</div>

				<input type="text" name="username" id="loginEmail" placeholder="Username" style="width: 240px;" />

				<input type="password" name="password" id="loginPass" placeholder="Password" style="width: 240px;" />

				<input type="submit" id="buttonxxxx" name="submit" value="Login" />

			</form>

			<form id="recover" name="regs" method="post" action="register.php" style="height: 340px;" onsubmit="return validateForms()">
				<h1>
				<div style="width: 60px; float:left;">
				<a href="#" id="flipToLogin" class="flipLink">Back To Login</a>
				</div>
				<div style="width: 208px; float:right;">
				Welcome to
				<strong>Tax Mapping System</strong>
				Register a new account!
				</div>
				<div class="clearfix"></div>
				</h1>
				<input type="text" name="password" id="loginEmail" placeholder="Password" style="width: 240px;" />
				<input type="text" name="username" id="loginEmail" placeholder="Username" style="width: 240px;" />
				<input type="text" name="fname" id="loginEmail" placeholder="First Name" style="width: 240px;" />
				<input type="text" name="lname" id="recoverEmail" placeholder="Lastname" style="width: 240px;" />
				<input type="text" name="mname" id="recoverEmail" placeholder="Middle Name" style="width: 240px;" />
				<input type="submit" id="buttonxxxx" name="submit" value="Save" />
			</form>

		</div>

	<div id="footer">
		&copy 2012 Tax Mapping System. All rights reserved. Powered by <a href="#" target="_blank">begie</a>
	</div>

    <!-- JavaScript includes -->

	<script src="jquery-1.7.1.min.js"></script>

		<script src="script.js"></script>


    

</body>

</html>



