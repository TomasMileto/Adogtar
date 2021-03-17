<?php       // controllers/IniciarSesion.php

require '../fw/fw.php';            
require '../models/Usuarios.php';
require '../views/InicioSesion.php';
    
    
session_start();        
if(isset($_SESSION['logueado'])) { 
    header("Location: ../adogtar");
    exit;
}     

if(count($_POST) >0){

    $u=new Usuarios();
    $v= new InicioSesion();

    if(isset($_POST['login'])){

        if( ($usuario=$u->loguear()) != false){
            $_SESSION['logueado']= true; 
            $_SESSION['nombre']= $usuario['nombre'];
            $_SESSION['id_usuario']=$usuario['id_usuario'];
            $_SESSION['mensaje_error']="";
            header("Location: ".$_SESSION['retorno']."");
            exit;
        }else{
            $v->error= 'Contraseña o Usuario incorrectos';
        }

        
    }
    if(isset($_POST['create'])){
        header("Location: crear-usuario");
        exit;
    }
}
else{
    $_SESSION['retorno']=$_SERVER['HTTP_REFERER'];
    $v= new InicioSesion();
}

$v->render();
?>