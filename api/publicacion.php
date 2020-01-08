<?php
require_once '../modelo/Publicacion.php';
$publicacion = new Publicacion();

switch($_GET['op']){

    case 'getpublicacion':
        $resp = $publicacion->getPublicacion();

        $data  = array();
        $idusuario = isset($_POST['idusuario'])?limpiarCadena($_POST['idusuario']):"";
        while($fetch = $resp->fetch_object()){
            $like = $publicacion->getCountLikes($fetch->id);
            $cometario = $publicacion->getCountComentarios($fetch->id);
            
            if(!empty($idusuario)){
                $bandera = $publicacion->getBooleanlike($idusuario,$fetch->id);
            }else{
                $bandera = false;
            }
            //
            
            $data[]= array('empresa'=>$fetch->empresa,'id'=>$fetch->id,'fecha'=>$fetch->fecha,'detalle'=>$fetch->detalle
            ,'nombre'=>$fetch->nombre,'logo'=>$fetch->logo,'portada'=>$fetch->portada
            ,'like'=>$like['likes'],'comentario'=>$cometario['comentario'],'like_usuario'=>$bandera);
        }
        print_r(json_encode($data));
    break;
}