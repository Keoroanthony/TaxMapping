<?php
	include('db.php');
	$id=$_GET['id'];
	$sql = "SELECT * FROM zonecoordinates where id='$id'";
	$result = mysqli_query($mysqli, $sql);
		while($row = mysqli_fetch_array($result))
			{
				$image=$row['image'];
			}
?>
<img src="<?php echo $image ?>">
<form action="editpicexec.php" method="post" enctype="multipart/form-data">
	<br>
	<input type="hidden" name="roomid" value="<?php echo $id=$_GET['id']; ?>">
	Select Image
	<br>
	<input type="file" name="image"><br>
	<input type="submit" value="Upload">
</form>