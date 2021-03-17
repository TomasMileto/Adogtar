<?php       // controllers/VerPerfil.php

require '../fw/fw.php';            
require '../models/Animales.php';
require '../models/Usuarios.php';
require '../models/Razas.php';
require '../models/Necesidades.php';
require '../models/Localidades.php';
require '../views/DetalleAnimal.php';

session_start();
// if(!isset($_SESSION['logueado'])) { 
//     header("Location: IniciarSesion.php");
//     exit;
// }

if(!isset($_GET['id'])) {
    echo('ERROR');
    die('error al cargar detalle de animal');
}

$animales= new Animales();
$a= $animales->getAnimal($_GET['id']);

$u = new Usuarios();      


$v= new DetalleAnimal();    
$v->titulo= ucfirst($a['tipo_necesidad']).' de '. $a['nombre'];
$v->animal= $a;
$v->usuario= $u->getUsuarioByID($a['id_usuario']);
$v->render();


?>