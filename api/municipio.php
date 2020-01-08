<?php 
    session_start();
    require_once '../modelo/Municipio.php';

    $municipio = new Municipio();
    $idmunicipio = isset($_POST['idmunicipio'])?limpiarCadena($_POST['idmunicipio']):"";
    $detalles = isset($_POST['detalles'])?limpiarCadena($_POST['detalles']):"";
    $gastronomia = isset($_POST['gastronomia'])?limpiarCadena($_POST['gastronomia']):"";
    $atractivos = isset($_POST['atractivos'])?limpiarCadena($_POST['atractivos']):"";
    $ruta = isset($_POST['ruta'])?limpiarCadena($_POST['ruta']):"";
    $hospedaje = isset($_POST['hospedaje'])?limpiarCadena($_POST['hospedaje']):"";
    $imagen = isset($_POST['imagen'])?limpiarCadena($_POST['imagen']):"";
    $nombre = isset($_POST['nombre'])?limpiarCadena($_POST['nombre']):"";
    $provincia = isset($_POST['idprovincia'])?limpiarCadena($_POST['idprovincia']):"";


    switch ($_GET['op']) {
        case 'createupdate':
            if(!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])){
                $imagen=$_POST["imagenactual"];
            }else{
                $ext = explode(".",$_FILES["imagen"]["name"]);
                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
                    $imagen = round(microtime(true)). '.' . end($ext);
                    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/municipio/".$imagen);
                }
            }
            if (empty($idmunicipio)){
                $rspta=$municipio->create($detalles,$gastronomia,$atractivos,$ruta,$hospedaje,$imagen,$nombre,$provincia);
                echo $rspta ? "Municipio registrado" : "No se pudieron registrar todos los datos del municipio";
            }
            else{
                $rspta=$municipio->update($idmunicipio);
            }
            break;
        
        case 'read':
            $read = $municipio->read($idmunicipio);
            echo json_encode($read);
            break;
        case 'delete':
            $delete = $municipio->delete($idmunicipio);
        break;

        case 'getdataTable':
            if(isset($_SESSION['permiso'])){
                $resp  = $municipio->getTable();
                $data = Array();
                while($row = $resp->fetch_object()){
                    $data[] = array(
                        "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>',
                        "1"=>$row->idmunicipio,
                        "2"=>$row->nombre,
                        "3"=>$row->idprovincia
                        
                    );
                }
                $result = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data
                );
                echo json_encode($result);
            }
            else{
                echo null;
            }
        break;
        case 'getMunicipio':
            $resp = $municipio->getMunicipio($provincia);

            $data  = array();
            
            while($fetch = $resp->fetch_object()){
              
                
                $data[]= array('id'=>$fetch->idmunicipio,'provincia'=>$fetch->idprovincia,'nombre'=>$fetch->nombre,'ruta'=>$fetch->ruta
                ,'imagen'=>$fetch->imagen,'detalles'=>$fetch->detalles,'atractivos'=>$fetch->atractivos
                ,'hospedaje'=>$fetch->hospedaje,'gastronomia'=>$fetch->gastronomia);
            }
            print_r(json_encode($data));
            
        break;
    }
?>