<?php       // controllers/Inicio.php

require '../fw/fw.php';            
require '../views/PantallaInicio.php';            
session_start();

$v = new PantallaInicio();
$v->render();
?>
