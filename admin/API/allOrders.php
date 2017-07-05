<?php
/*
    This API returns All the Service Data as per the Requirement. This API accepts '$orderId', '$userId' as GET Parameters,
But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

 */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allBikes.json');

    include_once '../includes/db_connect.php';
   

    //All Variables
    $selectOrders ="";
    $orderId = "";
    $userId = "";
    $orderArray = array ();

    if(isset($_GET['orderId'])){
        $orderId = $_GET['orderId'];
    }
    else{
        $orderId = "";
    }

    if(isset($_GET['userId'])){
        $userId = $_GET['userId'];
    }
    else{
        $userId = "";
    }

    if( $orderId != "" && $userId != "" ) {

        $selectOrders = "SELECT * FROM order WHERE orderId = '".$orderId."' AND userId = '".$userId."'";
    }
    elseif ($orderId != "" && $userId == "" ) {

        $selectOrders = "SELECT * FROM order WHERE orderId = '".$orderId."'";
    }
    elseif ($orderId == "" && $userId != "" ) {

        $selectOrders = "SELECT * FROM order WHERE userId = '".$userId."'";
    }

    else if ($orderId == "" && $userId == "" ){

        $selectOrders = "SELECT * FROM order";
    }

    $result = $conn->query($selectOrders);
    while ($row = mysqli_fetch_assoc($result)) {
        $orderArray['orders'][] = $row;
    }

    echo json_encode($orderArray,JSON_PRETTY_PRINT);
