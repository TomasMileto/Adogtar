<?php   // .../controllers/EliminarAnimal.php

require '../fw/fw.php';            
require '../models/Animales.php';
require '../models/Usuarios.php';
require '../models/Solicitudes_Animales.php';   
require '../views/BajaAnimalOK.php';

    session_start();        
                           
    if(!isset($_SESSION['logueado'])) { 
        header("Location: iniciar-sesion");
        exit;
    }

    if(!isset($_POST['id_animal'])) {
        echo('ERROR');
        die('error al intentar eliminar animal');
    }
    $a= new Animales();
    $sa= new Solicitudes_Animales();

    $animal=$a->getAnimal($_POST['id_animal']);

    if($animal==null) die("No existe el animal especificado");
    if($animal['id_usuario'] != $_SESSION['id_usuario']) die("Usted no tiene permiso para borrar esta publicacion");

    //eliminar animal y sus solicitudes
    $sa->eliminarSolicitudesPara($_POST['id_animal']);
    $a->eliminarAnimal($_POST['id_animal'], $_SESSION['id_usuario']); //el segundo parametro es redundante pero es un extra para asegurar
    

    $v= new BajaAnimalOK();
    $v->render();
?>
