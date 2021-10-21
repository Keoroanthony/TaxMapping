<?php
	include('db.php');
	$id = $_POST['id'];
	$area=$_POST['area'];
	$owner=$_POST['owner'];
	$cat=$_POST['category'];
	$address=$_POST['address'];
	$sql = "UPDATE zonecoordinates SET area='$area', owner='$owner', category='$cat', address='$address' WHERE id='$id'";
	$result = mysqli_query($mysqli, $sql);
	header("location: seachrecord.php");
?>