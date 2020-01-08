<?php
require "../config/conexion.php";
Class Prueba{

    public function __construct(){}

    public function getData($id){
        $sql = "SELECT * FROM prueba where id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function getAllData(){
        $sql = "SELECT * FROM prueba";
        return ejecutarConsulta($sql);    
    }
}
?>