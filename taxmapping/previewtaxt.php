<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content">
<table cellpadding="5" cellspacing="0" id="resultTable" border="1" width="1000">
		<tr>
			<th> TD # </th>
				<th width="10%"> Class </th>
				<th width="10%"> Area </th>
				<th width="10%"> Unit Value </th>
				<th width="13%"> Market Value </th>
				<th width="13%"> Assessment level </th>
				<th width="13%"> Assessed Value </th>
				<th width="13%"> Percentage Tax </th>
				<th width="13%"> Tax </th>
		</tr>
	<?php
		include('db.php');
		$sql = "SELECT * FROM zonecoordinates ORDER BY id ASC";
		$result = mysqli_query($mysqli, $sql);
		while($row = mysqli_fetch_array($result))
			{
			?>
				<tr class="record">
					<td>027-<?php echo $row['id'] ?></td>
					<td><div align="left"><?php echo $row['category'] ?></div></td>
					<td><div align="left"><?php echo $row['area'] ?></div></td>
					<td><div align="left">70</div></td>
					<td><div align="left"><?php
					$area=$row['area'];
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
					$area=$row['area'];
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
</table>
</div>