<?php       // controllers/VerPerfil.php

require '../fw/fw.php';            
require '../models/Usuarios.php';
require '../views/MiPerfil.php';

session_start();
if(!isset($_SESSION['logueado'])) { 
    header("Location: iniciar-sesion");
    exit;
}

$u = new Usuarios();      
$usuario=$u->getUsuarioByID($_SESSION['id_usuario']);

$v= new MiPerfil();    
$v->usuario= $usuario;
$v->titulo= $usuario['nombre'];
$v->render();

?>