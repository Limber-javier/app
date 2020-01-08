<?php 
    require_once '../modelo/Empresa.php';
    $empresa = new Empresa();

    switch ($_POST['op']) {
        case 'insertayactualizar':
            $idusuario = isset($_POST['idusuario'])?limpiarCadena($_POST['idusuario']):'';
            $nombre = isset($_POST['nombre'])?limpiarCadena($_POST['nombre']):'';
            $apellido = isset($_POST['apellido'])?limpiarCadena($_POST['apellido']):'';
            $imagen = isset($_POST['imagen'])?limpiarCadena($_POST['imagen']):'';
            $numero = isset($_POST['numero'])?limpiarCadena($_POST['numero']):'';
            $email = isset($_POST['email'])?limpiarCadena($_POST['email']):'';
            if(empty($idusuario)){
                $resp = $empresa->insertar($nombre,$apellido,$imagen,$numero,$email);
            }else{
                $respt = $empresa->actualizar($idusuario,$nombre,$apellido,$imagen,$numero,$email);
            }
            break;
        case 'agregaryeditar':
            $idempresa = isset($_POST['idempresa'])?limpiarCadena($_POST['idempresa']):"";
            $telefono = isset($_POST['telefono'])?limpiarCadena($_POST['telefono']):"";
            $nombre = isset($_POST['nombre'])?limpiarCadena($_POST['nombre']):"";
            $precio_promedio = isset($_POST['precio_promedio'])?limpiarCadena($_POST['precio_promedio']):"";
            $fecha_inicio = isset($_POST['fecha_inicio'])?limpiarCadena($_POST['fecha_inicio']):"";
            $fecha_plazo = isset($_POST['fecha_plazo'])?limpiarCadena($_POST['fecha_plazo']):"";
            $horario = isset($_POST['horario'])?limpiarCadena($_POST['horario']):"";
            $direccion = isset($_POST['direccion'])?limpiarCadena($_POST['direccion']):"";
            $descripcion = isset($post['descripcion'])?limpiarCadena($_POST['descripcion']):"";
            $web = isset($_POST['web'])?limpiarCadena($_POST['web']):"";
            $imagen = isset($_POST['imagen'])?limpiarCadena($_POST['imagen']):"";
            $imagen_portada = isset($_POST['imagen_portada'])?limpiarCadena($_POST['imagen_portada']):"";
            if(empty($idempresa)){
                $respta = $empresa->agregar($telefono,$nombre,$precio_promedio,$fecha_inicio,$fecha_plazo,$horario,$direccion,$descripcion,$web,$imagen,$imagen_portada);
            }else{
                $re = $empresa->editar($telefono,$nombre,$precio_promedio,$fecha_inicio,$fecha_plazo,$horario,$direccion,$descripcion,$web,$imagen,$imagen_portada);
            }
            break;
        case 'eliminar':
            $idempresa = isset($_POST['idempresa'])?limpiarCadena($_POST['idempresa']):"";
            $eliminar = $empresa->eliminar($idempresa);
        break;
        case 'mostrar':
            $idempresa = isset($_POST['idempresa'])?limpiarCadena($_POST['idempresa']):"";
            $mostrar = $empresa->mostrar($idempresa);
        break;
        default:
            break;
    }
?>