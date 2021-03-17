<?php 

abstract class Model{
    protected $db;      //para que los hijos la puedan usar

    public function __construct(){
        $this->db= Database::getInstance();
    }

    // public function renameFile(){

    // }
}
    
?>