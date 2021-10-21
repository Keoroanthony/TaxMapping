
<?php
//Start session
session_start();
 
//Include database connection details
require_once('db.php');
 
//Array to store validation errors
$errmsg_arr = array();
 
//Validation error flag
$errflag = false;
 
/*Function to sanitize values received from the form. Prevents SQL injection
function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc())
			{
			$str = stripslashes($str);
			}
		return mysqli_real_escape_string($str);
	}*/
 
//Sanitize the POST values
$username = $_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

 
//Create query
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($mysqli, $sql);
//Check whether the query was successful or not
if($result) 
{
	if(mysqli_num_rows($result) > 0) {
	//Login Successful
	session_regenerate_id();
	$member = mysqli_fetch_assoc($result);
	$_SESSION['SESS_MEMBER_ID'] = $member['id'];
	$_SESSION['SESS_FIRST_NAME'] = $member['position'];
	session_write_close();
	header("location: home.php");
	exit();
	}
	else {
		//Login failed
		$errmsg_arr[] = 'user name and password not found';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
		}
	}
}
else {
die("Query failed");
}
?>