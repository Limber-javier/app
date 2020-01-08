<?php
    session_start();
    require_once '../modelo/Login.php';

    $usuario = new Login();
    switch($_GET['op']){
        
        case 'verificar':
            $logina=isset($_POST['logina'])?limpiarCadena($_POST['logina']):"";
            $clavea=isset($_POST['clavea'])?limpiarCadena($_POST['clavea']):"";

            //Hash SHA256 en la contraseña
            $clavehash=hash("SHA256",$clavea);
            
            $rspta=$usuario->verificar($logina, $clavehash);

            $fetch=$rspta->fetch_object();

            if (isset($fetch))
            {
                $_SESSION['permiso']="Y";
            }
            echo json_encode($fetch);
            //echo $clavehash;
        break;
       
        case 'salir':
            session_unset();
            //Destruìmos la sesión
            session_destroy();
            //Redireccionamos al login
            header("Location: ../vista/admin/");
        break;
        
    }
?>