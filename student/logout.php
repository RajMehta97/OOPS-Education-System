<?php
    /**
     * logout.php
     *
     * A simple logout module for all of our login module.
     *
     */

    // enable sessions
    session_start();

    // delete cookies, if any
    setcookie("user", "", time() - 7 * 24 * 60 * 60);
    setcookie("pass", "", time() - 7 * 24 * 60 * 60);

    // log user out
    setcookie(session_name(), "", time() - 7 * 24 * 60 * 60);

    session_destroy();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Log Out</title>
  </head>
  <body>
    <h1>You are logged out!</h1>
    <h3><a href="login.php">home</a></h3>
	<?php  $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host/proj/index.php");
            exit;
	?>
  </body>
</html>
