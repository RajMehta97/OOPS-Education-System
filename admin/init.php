<?php
$db_name="elearning";
$mysql_user="root";
$mysql_pass="";
$server_name="localhost";
$conn=mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
if(!$conn){
	die("Error in connection\t". mysqli_connect_error());
}
else{
	//mysqli_select_db($conn,$db_name);
	//echo"<h3>Database Connection Success... </h3>";
}
?>
