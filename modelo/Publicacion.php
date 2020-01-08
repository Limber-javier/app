<?php
require_once '../config/conexion.php';
class Publicacion{

    public function __construct(){}

    public function getPublicacion(){
        $sql = "SELECT p.idempresa as empresa,p.idpublicacion as id,p.fecha as fecha
            ,p.detalle as detalle ,e.nombre as nombre,e.imagen as logo,p.imagen as portada
             FROM publicacion p inner join empresa e on p.idempresa = e.idempresa 
             where e.condicion='1' ORDER BY (p.idpublicacion) desc";
        return ejecutarConsulta($sql);
    }

    public function getCountLikes($id){
        $sql = "SELECT count(idpublicacion) as likes FROM like_publicacion WHERE idpublicacion =$id";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function getCountComentarios($id){
        $sql = "SELECT count(idpublicacion) as comentario FROM comentario_publicacion WHERE idpublicacion =$id";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function getBooleanlike($idusuario,$idpublicacion){
        $sql = "SELECT * FROM like_publicacion WHERE idusuario=$idusuario AND idpublicacion=$idpublicacion";
        $resp  = ejecutarConsultaSimpleFila($sql);
        if(count($resp)>0){
            return true;
        }
        return false;
    }
    

    
}