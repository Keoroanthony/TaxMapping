<?php
	require_once('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tax Mapping System</title>
	<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<!--sa poip up-->
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
	</style>
</head>
<body>
<div id="header">

	<div id="headercontent">
		<h1>Search Record</h1>
	</div>
</div>
<div style="width:1000px; margin:0 auto;margin-top: 104px;">
	<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" /><a href="home.php" title="click to go back"><img src="images/back.png"></a>
	<a href="#" onClick="window.open('previewtaxt.php','mywindow','scrollbars=yes,width=1050,height=700')">Preview</a>
	<table cellpadding="1" cellspacing="1" id="resultTable" style="width:1000px;">
		<thead>
			<tr>
				<th  style="border-left: 1px solid #C1DAD7" width="10%"> TD # </th>
				<th width="10%"> Class </th>
				<th width="10%"> Area </th>
				<th width="10%"> Unit Value </th>
				<th width="13%"> Market Value </th>
				<th width="13%"> Assessment level </th>
				<th width="13%"> Assessed Value </th>
				<th width="13%"> Percentage Tax </th>
				<th width="13%"> Tax </th>
			</tr>
		</thead>
		<tbody>
		<?php
			include('db.php');
			$sql = "SELECT * FROM zonecoordinates ORDER BY id ASC";
			$result = mysqli_query($mysqli, $sql);
			while($row = mysqli_fetch_array($result))
				{
				?>
					<tr class="record">
					<td style="border-left: 1px solid #C1DAD7;">027-<?php echo $row['id'] ?></td>
					<td><div align="left"><?php echo $row['category'] ?></div></td>
					<td><div align="left"><?php echo $row['area'] ?></div></td>
					<td><div align="left">70</div></td>
					<td><div align="left"><?php
					$area=(int)$row['area'];
					$marketvalue=$area*70;
					echo $marketvalue;
					?></div></td>
					<td><div align="left"><?php
					$cat=$row['category'];
					if ($cat=='Commercial Lot'){
					$alevel='10%';
					$aval=.10;
					}
					if ($cat=='Residential Lot'){
					$alevel='5%';
					$aval=.05;
					}
					echo $alevel;
					?></div></td>
					<td><div align="left"><?php
					$area=(int)$row['area'];
					$assesdval=$marketvalue*$aval;
					echo $assesdval;
					?></div></td>
					<td><div align="left">2.5%</div></td>
					<td><div align="left"><?php
					$tax=$assesdval*2.5;
					echo $tax;
					?></div></td>
					</tr>
				<?php
                }
			?> 
		</tbody>
	</table>
</div>
</body>
</html>
