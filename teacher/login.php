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
	$db="hrs";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
	
	// select database
    if (mysqli_select_db( $conn, $db) === false)
        die("Could not select database");
  
   

    // if username and password were saved in cookie, check them
    if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"]))
    {
		echo $_COOKIE["user"];
        // if username and password are valid, log user back in
        // prepare SQL
        $sql = sprintf("SELECT 1 as res FROM administration WHERE username='%s' AND password='%s'",
                       mysqli_real_escape_string($conn, $_COOKIE["user"]),
                       mysqli_real_escape_string($conn, $_COOKIE["pass"]));
        // execute query
        $result = mysqli_query($conn,$sql);
		
	    if ($result === false)
            die("Could not query database");
		
        // check whether we found a row
        if (mysqli_num_rows($result) == 1)
        {
            // remember that user's logged in
            $_SESSION["authenticated"] = true;

            // re-save username and, ack, password in cookies for another week
            setcookie("user", $_COOKIE["user"], time() + 7 * 24 * 60 * 60);
            setcookie("pass", $_COOKIE["pass"], time() + 7 * 24 * 60 * 60);

            // redirect user to home page, using absolute path, per
            // http://us2.php.net/manual/en/function.header.php
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/index.php");
            exit;
        }
    }
      // else if username and password were submitted, grab them instead
    if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
		echo $_COOKIE["user"]+$_POST["user"];
        // prepare SQL
        $sql = sprintf("SELECT 1 as res FROM administration WHERE username='%s' AND password='%s'",
                       mysqli_real_escape_string($conn, $_POST["user"]),
                       mysqli_real_escape_string($conn, $_POST["pass"]));
        // execute query
        $result = mysqli_query($conn,$sql);
		
	    if ($result === false)
            die("Could not query database");
		
        // check whether we found a row
        if (mysqli_num_rows($result) == 1)
        {
            // remember that user's logged in
            $_SESSION["authenticated"] = true;

			// save username in cookie for a week
            setcookie("user", $_POST["user"], time() + 7 * 24 * 60 * 60);

            // save password in, ack, cookie for a week if requested
            if ($_POST["keep"])
                setcookie("pass", $_POST["pass"], time() + 7 * 24 * 60 * 60);
			
            // redirect user to home page, using absolute path, per
            // http://us2.php.net/manual/en/function.header.php
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/index.php");
            exit;
        
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
    <title>Monte Carlo : Login</title>

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

<h2 class="form-heading">login</h2>
<div class="container log-row">
    <form class="form-signin" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
	 <div class="login-wrap">
            <?php if (isset($_POST["user"])): ?>
              <input name="user" class="form-control" type="text" value="<?= htmlspecialchars($_POST["user"]) ?>" placeholder="USERNAME">
           
            <?php else: ?>
              <input name="user" class="form-control" type="text" value=""  placeholder="USERNAME">
            <?php endif ?>
			<input name="pass" class="form-control" type="password" placeholder="PASSWORD">
       <input name="keep" type="checkbox"><span style="color: white;"> &nbsp; keep me logged in until I click <b>log out</b></span>
	   <input type="submit" class="btn btn-lg btn-success btn-block" value="Log In">
</div>	  
    </form>

<!--jquery-1.10.2.min-->
<script src="js/jquery-1.11.1.min.js"></script>
<!--Bootstrap Js-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jrespond..min.js"></script>

</body>
</html>