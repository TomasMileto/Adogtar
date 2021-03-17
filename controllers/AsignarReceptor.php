<?php   // .../controllers/AsignarReceptor.php

require '../fw/fw.php';            
require '../models/Animales.php';
require '../models/Usuarios.php';
require '../models/Solicitudes_Animales.php';   
require '../views/FormAsignarReceptor.php';
require '../views/AltaSolicitudOK.php';

    session_start();        
                           
    if(!isset($_SESSION['logueado'])) { 
        header("Location: iniciar-sesion");
        exit;
    }

    if(!isset($_POST['id_animal'])) {
        echo('ERROR.');
        die(' Error al intentar crear solicitud');
    }else{
        $a= new Animales();
        // $u= new Usuarios();
        $sa= new Solicitudes_Animales();

        $animal=$a->getAnimal($_POST['id_animal']);

        if($animal==null) die("No existe el animal especificado");
        if($animal['id_usuario'] != $_SESSION['id_usuario']) die("Usted no tiene permiso para actualizar esta publicacion");

        if(!isset($_POST['solicitante'])){  
            $v= new FormAsignarReceptor();
            $v->solicitudes= $sa->getTodosForAnimal($_POST['id_animal']);
            if($v->solicitudes!= null) $v->existenSolicitudes=true;
            $v->animal= $animal;
            $v->titulo='Asignar receptor';
        }else{
            $a-> ActualizarReceptor($animal['id_animal'], $_SESSION['id_usuario'], $_POST['solicitante']);
            $v= new AltaSolicitudOK();
            $v->titulo='Actualizacion exitosa';
        }
    }
    
    
    $v->render();
?>
