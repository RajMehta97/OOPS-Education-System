<?php
/*
    This API returns All the Service Data as per the Requirement. This API accepts '$priceId', '$price' as GET Parameters,
But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

 */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allBikes.json');

    //include_once '../includes/db_connect.php';

     $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "greesyhands";

// Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    

    //All Variables
    $selectPrices ="";
    $priceId = "";
    $price = "";
    $priceArray = array ();

    if(isset($_GET['priceId'])){
        $priceId = $_GET['priceId'];
    }
    else{
        $priceId = "";
    }

    if(isset($_GET['price'])){
        $price = $_GET['price'];
    }
    else{
        $price = "";
    }

    if( $priceId != "" && $price != "" ) {

        $selectPrices = "SELECT * FROM price WHERE priceId = '".$priceId."' AND price = '".$price."'";
    }
    elseif ($priceId != "" && $price == "" ) {

        $selectPrices = "SELECT * FROM price WHERE priceId = '".$priceId."'";
    }
    elseif ($priceId == "" && $price != "" ) {

        $selectPrices = "SELECT * FROM price WHERE price = '".$price."'";
    }

    else if ($priceId == "" && $price == "" ){

        $selectPrices = "SELECT * FROM price";
    }

    $result = $conn->query($selectPrices);
    while ($row = mysqli_fetch_assoc($result)) {
        $priceArray["prices"][] = $row;
    }

    echo json_encode($priceArray,JSON_PRETTY_PRINT);
