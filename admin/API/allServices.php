<?php
/*
    This API returns All the Service Data as per the Requirement. This API accepts '$serviceId', '$serviceName' as GET Parameters,
But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

 */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allBikes.json');

    include_once '../includes/db_connect.php';


    //All Variables
    $selectServices ="";
    $serviceId = "";
    $serviceName = "";
    $serviceArray = array ();

    if(isset($_GET['serviceId'])){
        $serviceId = $_GET['serviceId'];
    }
    else{
        $serviceId = "";
    }

    if(isset($_GET['serviceName'])){
        $serviceName = $_GET['serviceName'];
    }
    else{
        $serviceName = "";
    }

    if( $serviceId != "" && $serviceName != "" ) {

        $selectServices = "SELECT * FROM service WHERE serviceId = '".$serviceId."' AND serviceName = '".$serviceName."'";
    }
    elseif ($serviceId != "" && $serviceName == "" ) {

        $selectServices = "SELECT * FROM service WHERE serviceId = '".$serviceId."'";
    }
    elseif ($serviceId == "" && $serviceName != "" ) {

        $selectServices = "SELECT * FROM service WHERE serviceName = '".$serviceName."'";
    }

    else if ($serviceId == "" && $serviceName == "" ){

        $selectServices = "SELECT * FROM service";
    }

    $result = $conn->query($selectServices);
    while ($row = mysqli_fetch_assoc($result)) {

        $serviceArray[$row['serviceName'][] = $row;


    }

    echo json_encode($serviceArray,JSON_PRETTY_PRINT);
