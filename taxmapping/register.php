<?php
include('db.php');
//Start session
session_start();

 
//Array to store validation errors
$errmsg_arr = array();
 
//Validation error flag
$errflag = false;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$username=$_POST['username'];
$password=$_POST['password'];

$sql = "INSERT INTO user (username, password, fname, lname, mname, position)
VALUES ('$username', '$password', '$fname', '$lname', '$mname', 'user')";
$result = mysqli_query($mysqli, $sql);

$errmsg_arr[] = 'Registration Success, You can now login';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
		}
?>