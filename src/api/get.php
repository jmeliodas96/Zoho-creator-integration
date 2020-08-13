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
        
        // $employeeArr = array();
        // $employeeArr["body"] = array();
        // $employeeArr["itemCount"] = $itemCount;

        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        //     extract($row);
        //     $e = array(
        //         "id" => $id,
        //         "name" => $name,
        //         "email" => $email,
        //         "age" => $age,
        //         "designation" => $designation,
        //         "created" => $created
        //     );

        //     array_push($employeeArr["body"], $e);
        // }
        echo json_encode($stmt);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>