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
	
	$flag = 0;
	
	// select database
    if (mysqli_select_db( $conn, $db) === false)
        die("Could not select database");
	
	 $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
	
		if(isset($_POST["user"])&&isset($_POST["username"])&&isset($_POST["pass"]))
		{
			
		$name=$_POST["user"];	
		$user=$_POST["username"];
		$pass=$_POST["pass"];
			
		if($user!=null && $name!=null && $pass!=null)
		{
			
			$sql2="SELECT * FROM members where username='$user';";
	
			if ($conn->query($sql2) == TRUE) {
				
				$result = $conn->query($sql2);
			    $row=$result->fetch_assoc();
			    $num=$result->num_rows;
				
				if($num>0)
				{
				$host = $_SERVER["HTTP_HOST"];
                $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
                header("Location: http://$host$path/reg.php/?error=1");
				}
				
				else{
					
					
			$sql="INSERT INTO members ( username , name , password ,type) values ( '$user' , '$name', '$pass','student');";
	
			if ($conn->query($sql) == TRUE) {
				$host = $_SERVER["HTTP_HOST"];
                $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
                header("Location: http://localhost/proj/index.php");
			} 
					
					
				}
			} 
			
				else {
				echo "Error in query " . $conn->error;
			}
			
		
			
		
			
			
		}
			
		}
		  
  
		

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Template">
    <meta name="keywords" content="admin dashboard, admin, flat, flat ui, ui kit, app, web app, responsive">
    <link rel="shortcut icon" href="img/ico/favicon.png">
    <title>Monte Carlo : REGISTER</title>

    <!-- Base Styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/e5e07c439b.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>

    <!--Encryption JS -->
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="login-logo">
    <img src="img/montecarlojpg.jpg" alt="Greesy Hands" style="height: auto; width: 10%"/>
</div>

<?php 

	if($_GET["error"]==1)
		echo "username already taken "
	?>

<h2 class="form-heading">Register</h2>
<div class="container log-row">
    <form class="form-signin" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
	 <div class="login-wrap">
              
			  <input name="user" class="form-control" type="text" value=""  placeholder="NAME">              
           
              <input name="username" class="form-control" type="text" value=""  placeholder="USERNAME">
           
			<input name="pass" class="form-control" type="password" placeholder="PASSWORD">
      
	   <input type="submit" class="btn btn-lg btn-success btn-block" value="REGISTER">
</div>	  
    </form>

<!--jquery-1.10.2.min-->
<script src="js/jquery-1.11.1.min.js"></script>
<!--Bootstrap Js-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jrespond..min.js"></script>

</body>
</html>