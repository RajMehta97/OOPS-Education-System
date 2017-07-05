<?php
/*
    This API returns All the Service Data as per the Requirement. This API accepts '$merchantId', '$merchant' as GET Parameters,
But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

 */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allBikes.json');

    include_once '../includes/db_connect.php';

    

// Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    

    //All Variables
    $selectMerchants ="";
    $merchantId = "";
    $merchantName = "";
    $merchantArray = array ();

    if(isset($_GET['merchantId'])){
        $merchantId = $_GET['merchantId'];
    }
    else{
        $merchantId = "";
    }

    if(isset($_GET['merchantName'])){
        $merchantName = $_GET['merchantName'];
    }
    else{
        $merchantName = "";
    }

    if( $merchantId != "" && $merchantName != "" ) {

        $selectMerchants = "SELECT * FROM merchant WHERE merchantId = '".$merchantId."' AND merchantName = '".$merchantName."'";
    }
    elseif ($merchantId != "" && $merchantName == "" ) {

        $selectMerchants = "SELECT * FROM merchant WHERE merchantId = '".$merchantId."'";
    }
    elseif ($merchantId == "" && $merchant != "" ) {

        $selectMerchants = "SELECT * FROM merchant WHERE merchant = '".$merchant."'";
    }

    else if ($merchantId == "" && $merchant == "" ){

        $selectMerchants = "SELECT * FROM merchant";
    }

    $result = $conn->query($selectMerchants);
    while ($row = mysqli_fetch_assoc($result)) {
        $merchantArray["merchants"][] = $row;
    }

    echo json_encode($merchantArray,JSON_PRETTY_PRINT);
