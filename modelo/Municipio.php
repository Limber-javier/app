<?php 
require_once '../config/conexion.php';
class Municipio{
    public function __construct(){

    }
    public function create($detalles,$gastronomia,$atractivos,$ruta,$hospedaje,$imagen,$nombre,$idprovincia){
        $sql = "INSERT INTO municipio (detalles,gastronomia,atractivos,ruta,hospedaje,imagen,nombre,idprovincia) 
        VALUES('$detalles','$gastronomia','$atractivos','$ruta','$hospedaje','$imagen','$nombre',$idprovincia)"; 

        return ejecutarConsulta($sql);
    }
    public function read($idmunicipio){
        $sql = "SELECT *FROM municipio Where idmunicipio = $idmunicipio";
        return ejecutarConsultaSimpleFila($sql);
        
    }
    public function update($detalles,$gastronomia,$atractivos,$ruta,$hospedaje,$imagen,$nombre){
        $sql = "UPDATE municipio SET detalles = '$detalles', gastronomia = '$gastronomia', atractivos = '$atractivos', ruta = '$ruta', hospedaje = '$hospedaje',imagen = '$imagen',nombre = '$nombre'";
        return ejecutarConsulta($sql);
    }
    public function delete($idmunicipio){
        $sql = "DELETE FROM municipio WHERE idmunicipio = $idmunicipio";
        return ejecutarConsulta($sql);
    }
    public function getTable(){
        $sql = "SELECT *FROM municipio";
        return ejecutarConsulta($sql);
    }
    public function getMunicipio($idprovincia){
        $sql ="SELECT *FROM municipio WHERE idprovincia=$idprovincia";
        return ejecutarConsulta($sql);
    }
}
?>