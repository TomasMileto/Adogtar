<?php       // controllers/DarEnAdopcion.php

require '../fw/fw.php';            
require '../models/Razas.php';
require '../models/Localidades.php';
require '../models/Animales.php';
require '../models/Necesidades.php';
require '../views/FormAltaAnimal.php';
require '../views/AltaAnimalOk.php';

session_start();

if(!isset($_SESSION['logueado'])) { 
    header("Location: iniciar-sesion");
    exit;
}



if(count($_POST) > 0){     //Algun campo (cualquiera), para entrar a PASO 2,    count($_POST) >0
    
    $a= new Animales();
    
    #region Validaciones    
    if(!isset($_POST['nombre']))  die("error validacion 1");
    if(!isset($_POST['especie']))  die("error validacion 1.1");
    if(!isset($_POST['raza']))  die("error validacion 2");
    if(!isset($_POST['edad']))  die("error validacion 3");
    if(!isset($_POST['tamanio']))  die("error validacion 4");
    if(!isset($_POST['sexo']))  die("error validacion 4.5");
    if(!isset($_POST['localidad']))  die("error validacion 5");
    if(!isset($_POST['direccion']))  die("error validacion 5.5");
    if(!isset($_POST['descripcion']))  die("error validacion 6");
    if(!isset($_POST['necesidad']))  die("error validacion 7");
    #endregion

    $a->crearAnimal(
        $_POST['nombre'], 
        $_POST['especie'], 
        $_POST['raza'], 
        $_POST['edad'], 
        $_POST['sexo'], 
        $_POST['tamanio'], 
        $_POST['peso'], 
        $_POST['localidad'], 
        $_POST['direccion'], 
        $_POST['descripcion'], 
        $_POST['necesidad'], 
        $_SESSION['id_usuario'],
    );
    $v = new AltaAnimalOk();      
    // $v->tipo
}

else{
    if(!isset($_GET['tipo'])) die('error: el tipo no fue especificado');
    
    $r = new Razas();
    $l= new Localidades();
    $n= new Necesidades();

    $v= new FormAltaAnimal();    
    $v->razas_perro= $r->getPerros();
    $v->razas_gato= $r->getGatos();
    $v->localidades= $l->getTodos();
    $v->tipos= $n->getNecesidadesLike($_GET['tipo']);
    $v->tipo= $_GET['tipo'];
}

$v->render();

?>
