<?php

    require "../init.php";

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../class/record.php';

    $items = new record();

    // $Fecha_de_Pago = "10-Aug-2020";
    // $Cliente =  "Jimmy Mena";
    // $Salario =  "1200";
    // $Estado = "Pendiente";
    
    $bodyRequest = json_decode(file_get_contents("php://input"));
    $Fecha_de_Pago = $bodyRequest->Fecha_de_Pago;
    $Salario = $bodyRequest->Salario;
    $Estado = $bodyRequest->Estado;


    $obj = array(
      'data'=> array( 
        'Fecha_de_Pago'=>$Fecha_de_Pago,
        'Salario'=>$Salario,
        'Estado'=>$Estado,
      ),

      'results'=>array(
        'message'=>true,
        'tasks'=>true,
      )
    );

    $data = json_encode($obj);
    $items->createPayment($data);



    if($items->curl->httpStatusCode == 200){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
?>