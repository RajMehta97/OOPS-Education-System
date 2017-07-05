<!DOCTYPE html>
<html>
<body>


<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hrs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM booking";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>NO OF GUEST</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["booking_id"]."</td><td>".$row["customer_name"]." ".$row["no_of_guest"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);

?>	



</body>
</html>