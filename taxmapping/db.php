<?php
/*$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "taxmapping";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");*/
$dbuser="root";
$dbpass="";
$host="localhost";
$dbname = "taxmapping";
$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname)or die("Opps some thing went wrong");

?>