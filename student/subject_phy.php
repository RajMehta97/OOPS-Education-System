
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

	$sql="SELECT * FROM topics WHERE subject = 4 AND validity =1;";

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

			$sql="SELECT * FROM quiz WHERE subject = 4 AND validity =1;";

	if ($conn->query($sql) == TRUE) {
				//echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}

			$result2 = $conn->query($sql);
	$num2=0;
			if($result2->num_rows)
			$num2=$result2->num_rows;

		$_SESSION["subject"]=4;
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
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>
</head>
<body  >

    <nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PHYSICS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li class="active"><a href="http://$host$path/scoresheet.php">SCORE CARD</a></li>

      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
	<br>
	<br>
      <h2>PHYSICS</h2>
      <ul class="nav nav-pills nav-stacked">
	  <br>

	  <br>

        <li class="active"><a href="http://<?php echo $host.$path;?>/scoresheet.php">SCORE CARD</a></li>

      </ul><br>
    </div>

	<br>
	<br>
	<br>
	<h1><center>LEARN THEORY</center></h1>
	<br><br><br>

   <?php
	$i = 0;


	while($row=$result->fetch_assoc())
	{?>

	<!--<div class="row">-->
        <div class="col-sm-3">
          <div class="well">
            <h4><a href="<?php echo $row['link'];?>"><?php echo $row['name'];?></a></h4>

          </div>

     <!-- </div>
 -->
    </div>
	<?php }?>

	<br>
	<br>
	<br>
	<br>
	<br><br>
	<h1><center>LETS QUIZ</center> </h1>
	<br><br><br>

	<?php


	while($row2=$result2->fetch_assoc())
	{?>

	<!--<div class="row">-->
        <div class="col-sm-3">
          <div class="well">

            <h4><a href="http://<?php echo $host.$path;?>/quiz.php/?id=<?php echo $row2['quizid'];?>" name ="<?php $i ?>" ><?php echo $row2['topic'];?><br><br><?php echo "(quiz_id ".$row2['quizid'].")";?></a></h4>
			<?php //echo $row2['quizid'];?>

          </div>

		   <div id="mainSection">


     <!-- </div>
 -->
    </div>
	<?php }?>
  </div>
</div>

</body>
</html>
