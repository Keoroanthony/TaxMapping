<?php
	require_once('auth.php');
?>
<html>
<head>
<title>Kajiado Tax Mapping</title>
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
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
	#slideshow{
	background-color:#F5F5F5;
	border:1px solid #FFFFFF;
	height:340px;
	margin:0 auto;
	position:relative;
	width:640px;
}

#slideshow ul{
	height:320px;
	left:10px;
	list-style:none outside none;
	overflow:hidden;
	position:absolute;
	top:10px;
	width:620px;
	margin:0;
	padding:0;
}

#slideshow li{
	position:absolute;
	display:none;
	z-index:10;
}

#slideshow li:first-child{
	display:block;
	z-index:1000;
}

#slideshow .slideActive{
	z-index:1000;
}

#slideshow canvas{
	display:none;
	position:absolute;
	z-index:100;
}

#slideshow .arrow{
	height:86px;
	width:60px;
	position:absolute;
	background:url('img/arrows.png') no-repeat;
	top:50%;
	margin-top:-43px;
	cursor:pointer;
	z-index:5000;
}

#slideshow .previous{ background-position:left top;left:0;}
#slideshow .previous:hover{ background-position:left bottom;}

#slideshow .next{ background-position:right top;right:0;}
#slideshow .next:hover{ background-position:right bottom;}
	</style>
</head>
<body>
<div id="mainwrapper" style="width: 641px; margin-top: 12px;">
	<h1>
	Welcome 
	<?php
	include('db.php');
	$oper_id=$_SESSION['SESS_MEMBER_ID'];
	$sql = "SELECT * FROM user where id='$oper_id'";
		$result = mysqli_query($mysqli, $sql);
					while($row = mysqli_fetch_array($result))
						{
						echo $row['username'];
						}
	?>
	<div style="float:right; width:auto;">Tax Mapping System
	</div>
	</h1>
	<div id="slideshow">
		<ul class="slides">
			<li><img src="img/photos/1.jpg" width="620" height="320" alt="Marsa Alam underawter close up" /></li>
			<li><img src="img/photos/2.jpg" width="620" height="320" alt="Turrimetta Beach - Dawn" /></li>
			<li><img src="img/photos/3.jpg" width="620" height="320" alt="Power Station" /></li>
			<li><img src="img/photos/4.jpg" width="620" height="320" alt="Colors of Nature" /></li>
		</ul>

		<span class="arrow previous"></span>
		<span class="arrow next"></span>
	</div>
	<div id="homecontent" style="width: 100%;">
		
		<div style="float:left; width:auto; padding:10px;"><a href="map.php" id="addq"><img src="images/Map-icon.png" height="64" width="64"><br>Graphical Map</a></div>
		<div style="float:left; width:auto; padding:10px;"><a href="seachrecord.php" id="addq"><img src="images/reord.png" height="64" width="64"><br>Search Record</a></div>
		<div style="float:left; width:auto; padding:10px;"><a href="taxrecord.php" id="addq"><img src="images/reord.png" height="64" width="64"><br>Tax Record</a></div>
		<div style="float:left; width:auto; padding:10px;"><a href="index.php" id="addq"><img src="images/logouthindi.png" height="64" width="64"><br>Logout</a></div>
		<div class="clearfix"></div>
	</div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="slide/script.js"></script>
<script src="slide/autoadvance.js"></script>
</body>
</html>
