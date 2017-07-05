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

	$id = $_SESSION["quizid"];
	$score = $_SESSION["score"];

	$sql="SELECT * FROM quiz WHERE quizid = $id;";

	if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}

			$result = $conn->query($sql);
	$num=0;
			if($result->num_rows)
			$num=$result->num_rows;
		//echo $num;

		$row=$result->fetch_assoc();


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
      <h1>RESULTS </h1>
      <p><h3> YOU HAVE SCORED <?php  echo $score ;?> </h3></p>
	  <br><br><br>
	  <p><h4> THE ANSWERS FOR THE QUIZ ARE </h4></p>
	  <p><h4><?php echo $row['a1']."  ".$row['a2']."  ".$row['a3']."  ".$row['a4']."  ".$row['a5']; ?></h4> <p>
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
