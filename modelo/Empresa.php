<?php 
    require_once '../config/conexion.php';
class Empresa{

    public function __construct(){}

    public function insertar($nombre,$apellido,$imagen,$numero,$email){
        $sql = "INSERT INTO usuario (token,nombre,apellido,imagen,numero,email)
                VALUES ('','$nombre','$apellido','$imagen','$numero','$email')";
        return ejecutarConsulta($sql);
    }
    public function actualizar($idusuario,$nombre,$apellido,$imagen,$numero,$email){
        $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', imagen = '$imagen', numero = '$numero', email = '$email'  WHERE idusuario = $idusuario";
        return ejecutarConsulta($sql);
    }
//empresa
    public function agregar($idempresa,$telefono,$nombre,$precio_promedio,$fecha_inicio,$fecha_plazo,$horario,$direccion,$descripcion,$web,$imagen,$imagen_portada){
        if($this->verificarEmpresa($idempresa)){
        $sql = "INSERT INTO empresa (token,telefono,nombre,precio_promedio,fecha_inicio,fecha_plazo,horario,direccion,descripcion,web,imagen,imagen_portada)
                VALUES ('','$telefono','$nombre','$precio_promedio','$fecha_inicio','$fecha_plazo','$condicion','$horario','$direccion','$descripcion','$web','$imagen','$imagen_portada')";
        return ejecutarConsulta($sql);
        }
        return 0;
    }
    public function editar($telefono,$nombre,$precio_promedio,$fecha_inicio,$fecha_plazo,$horario,$direccion,$descripcion,$web,$imagen,$imagen_portada){
        $sql = "UPDATE empresa SET telefono = '$telefono',nombre = '$nombre',precio_promedio = '$precio_promedio',fecha_inicio = '$fecha_inicio',fecha_plazo = '$fecha_plazo',
        horario = '$horario',direccion = '$direccion',descripcion = '$descripcion',web = '$web',imagen = '$imagen',imagen_portada = '$imagen_portada'";
        return ejecutarConsulta($sql);
    }
    public function eliminar($idempresa){
        $sql = "DELETE FROM empresa WHERE idempresa = $idempresa";
        return ejecutarConsulta($sql);
    }
    public function mostrar($idempresa){
        if($this->verificarEmpresa($idempresa)){
        $sql = "SELECT *FROM empresa WHERE idempresa = $idempresa";
        return ejecutarConsultaSimpleFila($sql);
        }
        return 0;
    }
    public function verificarEmpresa($idempresa){
        $consulta = "SELECT *FROM empresa WHERE idempresa = $idempresa";
        $re = ejecutarConsulta($sql);
        $fetch = $re->fetchObject();
        return isset($fetch)?1:0;
    }
}
?>