<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>jQuery maphilight documentation</title>
	<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
	<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
	<script type="text/javascript">

	hs.graphicsDir = 'highslide/graphics/';
	hs.outlineType = 'rounded-white';
	hs.outlineWhileAnimating = true;
	hs.wrapperClassName = 'draggable-header';

	</script>
	<style>
	body{
		background: none repeat scroll 0 0 #C4F0F1;
		height:100%;
		width:100%;
		padding: 0;
		margin:0;
		font:14px/1.3 'Segoe UI',Arial, sans-serif;
	}
	#header{
		position:absolute;
		top:0;
		padding: 2px 10px ;
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
		width:auto
		text-align:center;
		float:left;
		padding-left: 10px;
	}
	</style>
	<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/master.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.qtip.min.css" />
<link rel="stylesheet" type="text/css" href="css/demos.css" />

<!--JavaScript - Might want to move these to the footer of the page to prevent blocking-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
	
</head>
<body>

<div id="header">
	<div id="headercontent">
		<h1>Zoom Area of Zone <?php echo $_GET['id']; ?></h1>
	</div>
</div>
<div style="width:auto; margin:0 auto;margin-top: 104px;">
<?php
	include('db.php');
	$id=$_GET['id'];
	$sql = "SELECT * FROM zone WHERE id='$id'";
	$result = mysqli_query($mysqli, $sql);
	while($row = mysqli_fetch_array($result))
	{
?>
<img class="map" src="<?php echo $row['images'];?>" usemap="#usa">
<?php
	}
?>

<map name="usa">
<?php
	$sql = "SELECT * FROM zonecoordinates WHERE zone='$id'";
	$result = mysqli_query($mysqli, $sql);
	while($row = mysqli_fetch_array($result))
	{
	$fff=$row['id'];
	$catcat=$row['category'];
	$own=$row['owner'];
?>
<area shape="poly" alt="<?php echo $fff?><br><?php echo $own?><br><?php echo $catcat?>" coords="<?php echo $row['coordinates'];?>" href="detals.php?id=<?php echo $fff ?>" onClick="return hs.htmlExpand(this, { objectType: 'ajax'} )"> 
<?php
	}
?>
</map>
</div>
<script class="example" type="text/javascript">
// Create the tooltips only when document ready
$(document).ready(function()
{
	// We'll target all AREA elements with alt tags (Don't target the map element!!!)
	$('area[alt]').qtip(
	{
		content: {
			attr: 'alt' // Use the ALT attribute of the area map for the content
		},
		style: {
			classes: 'qtip-tipsy qtip-shadow'
		}
	});
});
</script>
</body>
</html>
