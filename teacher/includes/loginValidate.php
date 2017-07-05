<?php
    //Include Database Connection File
    include_once '../includes/db_connect.php';

    //Session Started
    session_start();

    //Checking SESSION Variable
    if(isset($_SESSION['email'])){
        header('Location:index.php');
    }

    //check if the POST data contains the required info if not redirect it to Login Page
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newPassword = md5($password);//md5 the password
        //Preparing SQL statement
        $validate_statement = $conn -> prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $validate_statement->execute(array($email,$newPassword));
        if($result = $validate_statement -> fetch()){
            $_SESSION['email'] = $email;
            header('Location: index.php');
        }
        else{
            header('Location : login.php?error="Username or Password didn\'t match"');
        }
    }

    elseif (!isset($_POST['email']) && isset($_POST['password'])) {
        header('Location : login.php?error="Username can\'t be blank"');
    }

    elseif (isset($_POST['email']) && !isset($_POST['password'])) {
        header('Location : login.php?error="Password can\'t be blank"');
    }

    else{
        header('Location : login.php?error="Username & Password can\'t be blank"');
    }