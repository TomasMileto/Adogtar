<?php       // controllers/ListAnimales.php

require '../fw/fw.php';            
require '../models/Animales.php';
require '../models/Localidades.php';
require '../views/ListadoAnimales.php';

session_start();

$a = new Animales();      
$v= new ListadoAnimales(); 
$l= new Localidades();
$id_usuario;

if(!isset($_SESSION['logueado'])){
    $id_usuario=0;
}else{
    $id_usuario= $_SESSION['id_usuario'];
}

$filtros= array(
    'tipo'=> "",
    'especie'=> "",
    'sexo' => "",
    'localidad'=>"",
    'tamanio'=> ""
    /*agregar edad*/    
);

if(count($_GET)>0){
   

    $v->titulo='';

    if(isset($_GET['tipo'])) {
        $filtros['tipo']= $_GET['tipo'];
        $v->titulo= $v->titulo. ucfirst($_GET['tipo'].' de animales');
    }
    if(isset($_GET['especie'])) {
        $filtros['especie']= $_GET['especie'];
        if($v->titulo==''){
            $v->titulo=ucfirst($_GET['especie']).'s';
        }else
            $v->titulo= str_replace('animales',$_GET['especie'].'s',$v->titulo);  
    }
    if(isset($_GET['tamanio'])) {
        $filtros['tamanio']= $_GET['tamanio'];
        if($v->titulo==''){
            $v->titulo=ucfirst('Animales '.$_GET['tamanio']).'s';
        }else
            $v->titulo= $v->titulo.' '.$_GET['tamanio'].'s';
    }
    if(isset($_GET['sexo'])){ 
        $filtros['sexo']= $_GET['sexo'];
        if($v->titulo==''){
            $v->titulo=$_GET['sexo']=='M'? 'Machos':'Hembras';
        }else
            $v->titulo= $v->titulo.($_GET['sexo']=='M'? ' macho':' hembra');
        
    }
    if(isset($_GET['localidad'])) {
        $filtros['localidad']= $_GET['localidad'];
        if($v->titulo==''){
            $v->titulo='Animales en '. $_GET['localidad'];
        }else
            $v->titulo= $v->titulo.' en '. $_GET['localidad'];
    }

    $v->animales= $a-> getTodos_Filtered($filtros, $id_usuario);
}
else{
    $v->animales= $a->getTodos($id_usuario);
    $v->titulo= 'Listado de Todos los Animales';
}
$v->s_filtros= $filtros;
$v->localidades= $l->getTodos();

$v->render();



?>