<?php       // controllers/VerMisPublicaciones.php

require '../fw/fw.php';            
require '../models/Animales.php';
require '../models/Usuarios.php';
require '../models/Solicitudes_Animales.php';
require '../views/MisPublicaciones.php';

session_start();
if(!isset($_SESSION['logueado'])) { 
    header("Location: iniciar-sesion");
    exit;
}

$u = new Usuarios();      
$usuario=$u->getUsuarioByID($_SESSION['id_usuario']);

$a= new Animales();
$sa= new Solicitudes_Animales();

$v= new MisPublicaciones();    
$v->titulo='Mis Publicaciones';
$v->usuario= $usuario;
$v->animales=$a->getTodosFrom($usuario['id_usuario']);
$v->solicitudes_animales=$sa->getTodosFor($usuario['id_usuario']);
$v->render();

?>