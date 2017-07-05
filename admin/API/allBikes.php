<?php
    /*
        This API returns All the Bike Data as per the Requirement. This API accepts 'bikeId', 'bikeModel', 'bikeBrand' as GET Parameters,
    But after Deployment this API will only accept POST requests with a 'accessTokenId' Which will be salted and Hashed requesting Mobile's IMEI.

     */
    header('Content-Type: application/json');
    //header('Content-disposition: attachment; filename=allBikes.json');

    include_once '../includes/db_connect.php';

    //All Variables
    $selectBikes ="";
    $id = "";
    $model = "";
    $brand = "";
    $bikeArray = array ();

    if(isset($_GET['bikeID'])){
        $id = $_GET['bikeID'];
    }
    else{
        $id = "";
    }

    if(isset($_GET['bikeModel'])){
        $model = $_GET['bikeModel'];
    }
    else{
        $model = "";
    }

    if(isset($_GET['bikeBrand'])){
        $brand = $_GET['bikeBrand'];
    }
    else{
        $brand = "";
    }


    if( $id != "" && $model != "" && $brand != "") {

        $selectBikes = "SELECT * FROM bike WHERE bikeId = '".$id."' AND model = '".$model."' AND brand = '".$brand."'";
    }
    elseif ($id != "" && $model != "" && $brand == "") {

        $selectBikes = "SELECT * FROM bike WHERE bikeId = '".$id."' AND model = '".$model."'";
    }
    elseif ($id != "" && $model == "" && $brand != "") {

        $selectBikes = "SELECT * FROM bike WHERE bikeId = '".$id."' AND brand = '".$brand."'";
    }
    elseif ($id != "" && $model == "" && $brand == "") {

        $selectBikes = "SELECT * FROM bike WHERE bikeId = '".$id."'";
    }
    elseif ( $id == "" && $model != "" && $brand != "") {

        $selectBikes = "SELECT * FROM bike WHERE model = '".$model."' AND brand = '".$brand."'";
    }
    elseif ($id == "" && $model != "" && $brand == "") {

        $selectBikes = "SELECT * FROM bike WHERE model = '".$model."'";
    }
    elseif ($id == "" && $model == "" && $brand != "") {

        $selectBikes = "SELECT * FROM bike WHERE brand = '".$brand."'";
    }
    else if ($id == "" && $model == "" && $brand == ""){

        $selectBikes = "SELECT * FROM bike";
    }

    $result = $conn->query($selectBikes);
    while ($row = mysqli_fetch_assoc($result)) {
         $bikeArray[$row["brand"]][] = array("bikeId" => $row["bikeId"], "model"=>$row["model"]);
    }
    echo json_encode($bikeArray,JSON_PRETTY_PRINT);
