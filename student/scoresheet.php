<?php
    /**
     * login.php
     *
     * A simple login module that lets a user stay logged in
     * by saving username and, ack, password in cookies.
     *
     * **/

    // enable sessions
    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="elearning";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);


	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

	  if (mysqli_select_db( $conn, $db) === false)
        die("Could not select database");

	 $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");


	$user=$_COOKIE["user"];

	$avg1=$avg2=$avg3=$avg4=0;
	$num1=$num2=$num3=$num4=0;

	$sql="SELECT * FROM results WHERE username='$user' AND subject = 1;";

	if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}



			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			$num1=$result->num_rows;
			//echo $row[0];

	$sql="SELECT AVG(score) FROM results WHERE username='$user' AND subject = 1;";
		if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}

			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			if($num1>0)
			$avg1=$row["AVG(score)"];

			//echo "***********".$avg1.$num1;



			$sql="SELECT * FROM results WHERE username='$user' AND subject = 2;";

	if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}



			$result = $conn->query($sql);

			$num2=$result->num_rows;
			$row=$result->fetch_assoc();
			//echo $row["username"];

	$sql="SELECT AVG(score) FROM results WHERE username='$user' AND subject = 2;";
		if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}

			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			if($num2>0)
			$avg2=$row["AVG(score)"];

			//echo "***********".$avg1.$num1.$user;

			$sql="SELECT * FROM results WHERE username='$user' AND subject = 3;";

	if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}



			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			$num3=$result->num_rows;
			//echo $row[0];

	$sql="SELECT AVG(score) FROM results WHERE username='$user' AND subject = 3;";
		if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}

			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			if($num3>0)
			$avg3=$row["AVG(score)"];


			$sql="SELECT * FROM results WHERE username='$user' AND subject = 4;";

	if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}



			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			$num4=$result->num_rows;
			//echo $row[0];

	$sql="SELECT AVG(score) FROM results WHERE username=' $user ' AND subject = 4;";
		if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}

			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			if($num4>0)
			$avg4=$row["AVG(score)"];

			$score=$num1+$num2+$num3+$num4;


	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://<?php echo $host.$path;?>/index.php"><span class="glyphicon glyphicon-log-in"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#"></a></p>
      <p><a href="#"></a></p>
      <p><a href="#"></a></p>
    </div>
    <div class="col-sm-8 text-left">
      <h1>YOUR SCORESHEET </h1>
      <p><h3> TOTAL NUMBER OF TESTS WRITTEN : <?php  echo $score ;?> </h3></p>
	  <br><br><br><br>
	  <p><h4> NUMBER OF TESTS WRITTEN FOR MATHEMATICS : <?php  echo $num1 ;?></h4></p>
	  <BR><BR>
	   <p><h4> AVERAGE SCORE  : <?php  echo $avg1 ;?></h4></p>
	   <br><br><br><br>
	  <p><h4> NUMBER OF TESTS WRITTEN FOR COMPUTER SCIENCE : <?php  echo $num2 ;?></h4></p>
	  <BR><BR>
	   <p><h4> AVERAGE SCORE  : <?php  echo $avg2 ;?></h4></p>
	  <br><br><br><br>
	  <p><h4> NUMBER OF TESTS WRITTEN FOR CHEMISTRY : <?php  echo $num3 ;?></h4></p>
	  <BR><BR>
	   <p><h4> AVERAGE SCORE  : <?php  echo $avg3 ;?></h4></p>
	   <br><br><br><br>
	  <p><h4> NUMBER OF TESTS WRITTEN FOR PHYSICS : <?php  echo $num4 ;?></h4></p>
	  <BR><BR>
	   <p><h4> AVERAGE SCORE  : <?php  echo $avg4 ;?></h4></p>

      <hr>

    </div>
    <div class="col-sm-2 sidenav">
      <div >
        <p></p>
      </div>
      <div >
        <p></p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">

</footer>

</body>
</html>
