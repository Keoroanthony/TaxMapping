<?php
include('db.php');
	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"ownerpic/" . $_FILES["image"]["name"]);
			
			$location="ownerpic/" .$_FILES["image"]["name"];
			$roomid=$_POST['roomid'];
			$sql = "UPDATE zonecoordinates SET image = '$location' WHERE id='$roomid'";
		    $result = mysqli_query($mysqli, $sql);
			if(!$result) {
			
				echo mysql_error();
				
				
			}
			else{
			
			header("location: seachrecord.php");
			exit();
			}
			}
	}


?>