<?php       // controllers/DarEnAdopcion.php

require '../fw/fw.php';            
require '../models/Usuarios.php';
require '../models/Localidades.php';
require '../views/FormCrearUsuario.php';
require '../views/AltaUsuarioOK.php';

session_start();
if(isset($_SESSION['logueado'])) { 
    header("Location: ../adogtar");
    exit;
}     

$l = new Localidades();

if(count($_POST) > 0){     //Algun campo (cualquiera), para entrar a PASO 2,    count($_POST) >0
    
    $u= new Usuarios();
    
    #region Validaciones    
    if(!isset($_POST['nombre']))  die("error validacion 1");
    if(!isset($_POST['apellido']))  die("error validacion 2");
    if(!isset($_POST['edad']))  die("error validacion 3");
    if(!isset($_POST['telefono']))  die("error validacion 4");
    if(!isset($_POST['email']))  die("error validacion 5");
    if(!isset($_POST['localidad']))  die("error validacion 6");
    if(!isset($_POST['direccion']))  die("error validacion 6.5");
    if(!isset($_POST['password']))  die("error validacion 7");
    #endregion

    $idusuario=$u->crearUsuario(
        $_POST['nombre'], 
        $_POST['apellido'], 
        $_POST['edad'], 
        $_POST['telefono'], 
        $_POST['email'], 
        $_POST['localidad'], 
        $_POST['direccion'], 
        $_POST['password'], 
    );
    $_SESSION['logueado']= true; 
    $usuario= $u->getUsuarioByID($idusuario);
    $_SESSION['id_usuario']=$usuario['id_usuario'];
    $_SESSION['nombre']=$usuario['nombre'];
    $v = new AltaUsuarioOK();      
}

else{
    $v= new FormCrearUsuario();    
    $v->localidades= $l->getTodos();
}

$v->render();

?>
