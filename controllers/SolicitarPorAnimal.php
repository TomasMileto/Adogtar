<?php   // .../controllers/SolicitarPorAnimal.php

require '../fw/fw.php';            
require '../models/Animales.php';
require '../models/Usuarios.php';
require '../models/Solicitudes_Animales.php';
require '../views/AltaSolicitudOK.php';
require '../views/ErrorSolicitud.php';


    session_start();        
    if(!isset($_SESSION['logueado'])) { 
        header("Location: iniciar-sesion");
        exit;
    }                
    
    if(count($_POST) == 0) {
        echo('ERROR');
        die('error de solicitud');
    }
    
    $animales= new Animales();
    $a= $animales->getAnimal($_POST['id_animal']);

    $usuarios= new Usuarios();
    $u= $usuarios->getUsuarioByID($_SESSION['id_usuario']);

    $s= new Solicitudes_Animales();

    if($s->solicitudExiste($a['id_animal'], $u['id_usuario'])){
        $v= new ErrorSolicitud();
        $v->mensaje_error= 'Ya envio solicitud para este animal';
        $v->titulo='Error de solicitud';
        $v->url_retorno=str_replace(' ','_',$a['tipo_necesidad'])."-animal-".$a['id_animal'];
    }else{
        $s->crearNuevaSolicitud($a['id_animal'], $u['id_usuario'], $_POST['comentario']);
        $v= new AltaSolicitudOK();
        $v->titulo='Solicitud confirmada';
    }

    $v->render();
?>
