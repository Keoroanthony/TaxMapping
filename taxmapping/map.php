<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tax Mapping System</title>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery.maphilight.min.js"></script>
	<script type="text/javascript">$(function() {
		$('.map').maphilight();
	});</script>
	<style>
	body{
		background: url("images/stripey.png") repeat scroll 0 0 transparent;
		height:100%;
		width:100%;
		padding: 0;
		margin:0;
		font:14px/1.3 'Segoe UI',Arial, sans-serif;
	}
	#header{
		position:absolute;
		top:0;
		padding:10px ;
		background-color: #252525;
		width:100%;
		background-image: url("twitter_web_sprite_bgs.png");
		background-repeat: repeat-x;
		color:#BBBBBB;
		font-size:11px;
		font-family:arial;
	}
	#headercontent{
		margin:0 auto;
		width:100%;
		text-align:center;
		float:left;
		padding-left: 10px;
	}
	</style>
</head>
<body>
<div id="header">
	<div id="headercontent">
		<h1>Map Of Kajiado County</h1><a href="home.php" title="click to go back"><img src="images/back.png"></a>
	</div>
</div>
<div style="width:553px; margin:0 auto;margin-top: 104px;background-color: white;border: 2px solid #DDDDDD;box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);padding: 10px 25px;">
	<img class="map" src="images/balete.png" usemap="#usa" style="">
	<map name="usa">
	<?php
		include('db.php');
		$sql = "SELECT * FROM coordinates";
		$result = mysqli_query($mysqli, $sql);
		while($row = mysqli_fetch_array($result))
		{
	?>
	<area shape="poly" coords="<?php echo $row['coordinates'];?>" href="#" onClick="window.open('zone.php?id=<?php echo $row['id'];?>','mywindow','scrollbars=yes,width=1050,height=700')"> 
	<?php
		}
	?>
	</map>
</div>
</body>
</html>
