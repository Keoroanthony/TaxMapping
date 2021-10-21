

<style type="text/css">

.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}

</style>
<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<?php
include('db.php');
$id=$_GET['id'];
$sql = "SELECT * FROM zonecoordinates WHERE id='$id'";
$result = mysqli_query($mysqli, $sql);
while($row = mysqli_fetch_array($result))
	{
	$area=$row['area'];
	$owner=$row['owner'];
	$cat=$row['category'];
	$address=$row['address'];
	}
?>
<form action="editdetailsexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
<input name="id" type="hidden" id="rate" class="ed" value="<?php echo $id; ?>" />
 Lot Category<br />
    <select name="category" class="ed">
	<option>Commercial Lot</option>
	<option>Residential Lot</option>
	</select>
	<br />
 Total Land Area<br />
    <input name="area" type="text" id="rate" class="ed" value="<?php echo $area; ?>" /><br />
 Owner<br />
    <input name="owner" type="text" id="qty" class="ed" value="<?php echo $owner; ?>" /><br />
 Address<br />
    <input name="address" type="text" id="address" class="ed" value="<?php echo $address; ?>" /><br />
 
    <input type="submit" name="Submit" value="save" id="button1" />
 
</form>
