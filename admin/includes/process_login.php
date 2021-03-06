<?php
    include_once 'db_connect.php';
    include_once 'functions.php';

    //Starting a secure session
    sec_session_start();

    if (isset($_POST['email'], $_POST['p'])) {
        $email = $_POST['email'];
        $password = $_POST['p']; // The hashed password.

        if (login($email, $password, $conn) == true) {
            // Login success
            header('Location: ../index.php');
        } else {
            // Login failed
            header('Location: ../login.php?error=1');
        }
    } else {
        // The correct POST variables were not sent to this page.
        echo 'Invalid Request';
    }