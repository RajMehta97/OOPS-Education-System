<?php

    include_once 'psl-config.php';   // Needed because functions.php is not included

    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        header("Location: ../error.php?err=Unable to connect to MySQL");
        exit();
    }
