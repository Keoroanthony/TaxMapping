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
	echo 'Location: Brgy. Balete, Zone'.$row['zone'].'<br>';
	echo 'Area: '.$row['area'].'Sqm<br>';
	echo 'Owned By: '.$row['owner'].'<br>';
	}
?>
</div>