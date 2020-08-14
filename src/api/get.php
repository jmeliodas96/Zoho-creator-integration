<?php

    require "../init.php";
    
  
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include_once '../config/database.php';
    include_once '../class/record.php';


    $items = new record();
    $stmt = $items->getEmployees();

    // counter
    // $itemCount = count($stmt);
    // echo json_encode($stmt);

    if($stmt != null){
        echo json_encode($stmt);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>