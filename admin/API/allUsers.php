<?php
    /*
        This API returns All the user Data as per the Requirement. This API accepts 'userId', 'useruserName', 'useremail' as GET Parameters,
    But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

     */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allusers.json');

     $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "greesyhands";

// Create connection
    $conn = new mysqli($servername, $username, $password,$database);


    //All Variables
    $selectUser ="";
    $id = "";
    $userName = "";
    $email = "";
    $userArray = array ();
    $verb = $_SERVER['REQUEST_METHOD'];

    if($verb == 'GET'){
        if(isset($_GET['userID'])){
            $id = $_GET['userID'];
        }
        else{
            $id = "";
        }

        if(isset($_GET['userName'])){
            $userName = $_GET['userName'];
        }
        else{
            $userName = "";
        }

        if(isset($_GET['email'])){
            $email = $_GET['email'];
        }
        else{
            $email = "";
        }


        if( $id != "" && $userName != "" && $email != "") {

            $selectUser = "SELECT * FROM user WHERE userId = '".$id."' AND userName = '".$userName."' AND email = '".$email."'";
        }
        elseif ($id != "" && $userName != "" && $email == "") {

            $selectUser = "SELECT * FROM user WHERE userId = '".$id."' AND userName = '".$userName."'";
        }
        elseif ($id != "" && $userName == "" && $email != "") {

            $selectUser = "SELECT * FROM user WHERE userId = '".$id."' AND email = '".$email."'";
        }
        elseif ($id != "" && $userName == "" && $email == "") {

            $selectUser = "SELECT * FROM user WHERE userId = '".$id."'";
        }
        elseif ( $id == "" && $userName != "" && $email != "") {

            $selectUser = "SELECT * FROM user WHERE userName = '".$userName."' AND email = '".$email."'";
        }
        elseif ($id == "" && $userName != "" && $email == "") {

            $selectUser = "SELECT * FROM user WHERE userName = '".$userName."'";
        }
        elseif ($id == "" && $userName == "" && $email != "") {

            $selectUser = "SELECT * FROM user WHERE email = '".$email."'";
        }
        else if ($id == "" && $userName == "" && $email == ""){

            $selectUser = "SELECT * FROM user";
        }
    }
    elseif ($verb == 'POST'){
        //Nothing to do now
    }


     $result = $conn->query($selectUser);
    while ($row = mysqli_fetch_assoc($result)) {
       
       
            $userArray["user"] = $row;
             
               
            }
    

    echo json_encode($userArray,JSON_PRETTY_PRINT);
