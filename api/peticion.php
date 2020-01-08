<?php
 require_once '../modelo/Prueba.php';
 $prueba = new Prueba();

 $id = isset($_GET['id'])?limpiarCadena($_GET['id']):"";

 if(empty($id)){
    $resp = $prueba->getAllData();
   
   $data  = array();
   //echo "'usuario':";
   while($fetch = $resp->fetch_object()){
      $data[]= array('nombre'=>$fetch->nombre,'apellido'=>$fetch->apellidos,'edad'=>$fetch->edad);
   }
   print_r(json_encode($data));
 }else{
    $resp = $prueba->getData($id);
    
    echo json_encode($resp);
    
 }