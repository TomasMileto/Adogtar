<?php   // .../controllers/CerrarSesion.php

    session_start();        
                           
    
    unset($_SESSION['logueado']); //Bajar la bandera de logueado
   
    header("Location: ../adogtar/");

?>
