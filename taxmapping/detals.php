
<?php
include('db.php');
	$id=$_GET['id'];
	$sql = "SELECT * FROM zonecoordinates WHERE id='$id'";
	$result = mysqli_query($mysqli, $sql);
	while($row = mysqli_fetch_array($result))
	{
	echo '<img src="'.$row['image'].'" style="height:auto; width:193px;"><br>';
	echo 'Zone: '.$row['zone'].'<br>';
	echo 'Lot Category: '.$row['category'].'<br>';
	echo 'Location: Kajiado, Zone'.$row['zone'].'<br>';
	echo 'Area: '.$row['area'].'Sqm<br>';
	echo 'Owned By: '.$row['owner'].'<br>';
	$area=(int)$row['area'];
	$marketvalue=$area*70;
	$cat=$row['category'];
	if ($cat=='Commercial Lot'){
	$alevel='10%';
	$aval=.10;
	}
	if ($cat=='Residential Lot'){
	$alevel='5%';
	$aval=.05;
	}
	$assesdval=$marketvalue*$aval;
	$tax=$assesdval*2.5;
	$_SESSION['amount'] = $tax;
	echo 'Tax: '.$tax.'<br><a href="mpesa.php">Pay</a>';
	}
?>