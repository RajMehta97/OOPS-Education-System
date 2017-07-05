<?php
/*
    This API returns All the delivery_boy Data as per the Requirement. This API accepts '$id', '$name' as GET Parameters,
But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

 */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allBikes.json');

    include_once '../includes/db_connect.php';
    

    //All Variables
    $assignedDeliveryBoys ="";
    $id = "";
    $name = "";
    $deliveryBoyArray = array ();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        $id = "";
    }

    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }
    else{
        $name = "";
    }

    if( $id != "" && $name != "" ) {

        $assignedDeliveryBoys = "SELECT * FROM delivery_boy WHERE id = '".$id."' AND name = '".$name."'";
    }
    elseif ($id != "" && $name == "" ) {

        $assignedDeliveryBoys = "SELECT * FROM delivery_boy WHERE id = '".$id."'";
    }
    elseif ($id == "" && $name != "" ) {

        $assignedDeliveryBoys = "SELECT * FROM delivery_boy WHERE name = '".$name."'";
    }

    else if ($id == "" && $name == "" ){

        $assignedDeliveryBoys = "SELECT * FROM delivery_boy";
    }

    $result = $conn->query($assignedDeliveryBoys);
    while ($row = mysqli_fetch_assoc($result)) {
        $deliveryBoyArray[$row['name'][] = $row;
    }

    echo json_encode($deliveryBoyArray,JSON_PRETTY_PRINT);
