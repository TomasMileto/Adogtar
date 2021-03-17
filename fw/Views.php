<?php   // ../fw/Views.php

abstract class Views{
   public $titulo='Adogtar';
    public function render(){
        include '../html/header.php';
        include '../html/' . get_class($this) . '.php';     
    }
}
    
?>