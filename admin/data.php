<?php header('Content-Type: application/json');

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
/*$sql="SELECT sum(score) as score from results  WHERE subject='1';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$score=$row['score'];*/


$sql = "SELECT sum(score) as score FROM `results` WHERE subject='1';";
$sql1 ="SELECT sum(score) as score FROM `results` WHERE subject='2';";
$sql2 ="SELECT sum(score) as score FROM `results` WHERE subject='3';";
$sql3 ="SELECT sum(score) as score FROM `results` WHERE subject='4';";

$query1="SELECT count(*) as count from `results` where subject='1';";
$query2="SELECT count(*) as count from `results` where subject='2';";
$query3="SELECT count(*) as count from `results` where subject='3';";
$query4="SELECT count(*) as count from `results` where subject='4';";


$res1=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql1);
$res3=mysqli_query($conn,$sql2);
$res4=mysqli_query($conn,$sql3);

$res5=mysqli_query($conn,$query1);
$res6=mysqli_query($conn,$query2);
$res7=mysqli_query($conn,$query3);
$res8=mysqli_query($conn,$query4);

$row1=mysqli_fetch_array($res1);
$row2=mysqli_fetch_array($res2);
$row3=mysqli_fetch_array($res3);
$row4=mysqli_fetch_array($res4);

$row5=mysqli_fetch_array($res5);
$row6=mysqli_fetch_array($res6);
$row7=mysqli_fetch_array($res7);
$row8=mysqli_fetch_array($res8);


$sc1=$row1['score']/$row5['count'];
$sc2=$row2['score']/$row6['count'];
$sc3=$row3['score']/$row7['count'];
$sc4=$row4['score']/$row8['count'];

$arr=array($sc1,$sc2,$sc3,$sc4);
print json_encode($arr);
?>
