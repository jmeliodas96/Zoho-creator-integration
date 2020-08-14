<?php

    require "../init.php";

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../class/record.php';

    $items = new record();

    $bodyRequest = json_decode(file_get_contents("php://input"));
    $Nombre_Completo = $bodyRequest->Nombre_Completo;
    $Correo_Electr_nico = $bodyRequest->Correo_Electr_nico;
    $Tel_fono = $bodyRequest->Tel_fono;
    $Observaciones = $bodyRequest->Observaciones;
    
    $obj = array(
      'data'=> array( 
        array(
          'Nombre_Completo'=>$Nombre_Completo,
          'Correo_Electr_nico'=>$Correo_Electr_nico,
          'Tel_fono'=>$Tel_fono,
          'Observaciones'=>$Observaciones,
        )
      ),

      'results'=>array(
        
        'fields'=>array(
          'Nombre_Completo',
          'Correo_Electr_nico',
          'Tel_fono',
          'Observaciones',
        ),
        'message'=>true,
        'tasks'=>true,
      )
    );

    $data = json_encode($obj);
    $items->createEmployee($data);



    if($items->curl->httpStatusCode == 200){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
?>