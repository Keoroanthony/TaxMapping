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
			<td widtd="10%"> Lot Number </td>
			<td widtd="15%"> Lot Category </td>
			<td widtd="27%"> Location </td>
			<td widtd="10%"> Area </td>
			<td widtd="18%"> Owner </td>
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
				<td><div align="left">Kajiado, Zone<?php echo $row['zone'] ?></div></td>
				<td><div align="left"><?php echo $row['area'] ?></div></td>
				<td><div align="left"><?php echo $row['owner'] ?></div></td>
				</tr>
			<?php
            }
		?> 
</table>
</div>