<?php
/*
    This API returns All the Service Data as per the Requirement. This API accepts '$billNo', '$userId' as GET Parameters,
But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

 */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allBikes.json');

    include_once '../includes/db_connect.php';
   

    //All Variables
    $selectedTransaction ="";
    $billNo = "";
    $userId = "";
    $transactionArray = array ();

    if(isset($_GET['billNo'])){
        $billNo = $_GET['billNo'];
    }
    else{
        $billNo = "";
    }

    if(isset($_GET['userId'])){
        $userId = $_GET['userId'];
    }
    else{
        $userId = "";
    }

    if( $billNo != "" && $userId != "" ) {

        $selectedTransactsion = "SELECT * FROM transaction WHERE billNo = '".$billNo."' AND userId = '".$userId."'";
    }
    elseif ($billNo != "" && $userId == "" ) {

        $selectedTransactsion = "SELECT * FROM transaction WHERE billNo = '".$billNo."'";
    }
    elseif ($billNo == "" && $userId != "" ) {

        $selectedTransactsion = "SELECT * FROM transaction WHERE userId = '".$userId."'";
    }

    else if ($billNo == "" && $userId == "" ){

        $selectedTransaction = "SELECT * FROM transaction";
    }

    $result = $conn->query($selectedTransaction);
    while ($row = mysqli_fetch_assoc($result)) {
        $transactionArray['transactions'][] = $row;
    }

    echo json_encode($transactionArray,JSON_PRETTY_PRINT);
