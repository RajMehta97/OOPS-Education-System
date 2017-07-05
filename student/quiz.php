


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
      include 'stu_class.php';
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

	$id= $_GET['id'];

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
<html >
<head>
</head>
<body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> -->

<div class="container">
  <!--
  -->
  <!--Progress Bar-->
  <!--Content-->
  <!--Question-->
  <!--Answers-->
  <!--Explaination-->
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
      <span class="sr-only">60% Complete</span>
    </div>
  </div>


  <h4 class="question"><?php echo $row['q1'] ?></h4>

   <form  action="#" method="post">
  <input type="radio" name="ans" value="a"> a<br>
  <input type="radio" name="ans" value="b"> b<br>
  <input type="radio" name="ans" value="c"> c<br>
  <input type="radio" name="ans" value="d"> d<br>


 <h4 class="question"><?php echo $row['q2'] ?></h4>


  <input type="radio" name="ans2" value="a"> a<br>
  <input type="radio" name="ans2" value="b"> b<br>
  <input type="radio" name="ans2" value="c"> c<br>
  <input type="radio" name="ans2" value="d"> d<br>



  <h4 class="question"><?php echo $row['q3'] ?></h4>


  <input type="radio" name="ans3" value="a"> a<br>
  <input type="radio" name="ans3" value="b"> b<br>
  <input type="radio" name="ans3" value="c"> c<br>
  <input type="radio" name="ans3" value="d"> d<br>


  <h4 class="question"><?php echo $row['q4'] ?></h4>


  <input type="radio" name="ans4" value="a"> a<br>
  <input type="radio" name="ans4" value="b"> b<br>
  <input type="radio" name="ans4" value="c"> c<br>
  <input type="radio" name="ans4" value="d"> d<br>


  <h4 class="question"><?php echo $row['q5'] ?></h4>


  <input type="radio" name="ans5" value="a"> a<br>
  <input type="radio" name="ans5" value="b"> b<br>
  <input type="radio" name="ans5" value="c"> c<br>
  <input type="radio" name="ans5" value="d"> d<br>

	<br>
	<button type="submit" name="submit" value="submit"><a href ="http://<?php echo $host.$path;?>/ans.php"> SUBMIT</a> </button>

		<?php
		if(isset($_POST['submit']))
		{

			$val1=$val2=$val3=$val4=$val5=0;
	if(isset($_POST['ans']))
		$val1 = $_POST['ans'];  // Storing Selected Value In Variable

	if(isset($_POST['ans2']))
		$val2 = $_POST['ans2'];

	if(isset($_POST['ans3']))
		$val3 = $_POST['ans3'];

	if(isset($_POST['ans4']))
		$val4 = $_POST['ans4'];

	if(isset($_POST['ans5']))
		$val5 = $_POST['ans5'];

		$score=0;
		if($val1===$row['a1'])
		{

			$score=$score+1;
			echo "1";
		}
		if($val2===$row['a2'])
		{
			$score=$score+1;
			echo "2";
		}

		if($val3===$row['a3'])
		{
			$score=$score+1;
			echo "3";
		}

		if($val4===$row['a4'])
		{
			$score=$score+1;
			echo "4";
		}

		if($val5===$row['a5'])
		{
			$score=$score+1;
			echo "5";
		}
		$subject=$_SESSION['subject'];
		$user=$_COOKIE['user'];
		$topic=$row['topic'];

echo $subject.$user;
      $student = new stu_class;
      $student->settopic($topic);
      $student->setscore($score);
      $student->setusername($user);
      $student->setsubject($subject);
		echo $subject.$score.$user;
		$sql="INSERT INTO results ( topic , score , username ,subject) values ( '$student->topic' ,' $student->score', '$student->username','$student->subject');";

			if ($conn->query($sql) == TRUE) {
				echo "query run successfuly";
			} else {
				echo "Error in query " . $conn->error;
			}

			$result = $conn->query($sql);
		//session_start();
		$_SESSION["score"] =$score;
		$_SESSION["quizid"] =$row['quizid'];

		echo "You have selected :" .$val1.$val2.$val3.$val4.$val5.$score;//$row['a1'].$row['a2'].$row['a3'].$row['a4'].$row['a5'];  // Displaying Selected Value
		}
		?>
 </form>
  </div>



</div>


<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>





</body>
</html>
