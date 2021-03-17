<?php   // models/Razas.php

class Razas extends Model{     
   
    public function getTodos(){
        $this->db->query("SELECT* FROM razas");
        return $this->db->fetchAll();
    }

    public function getPerros(){
        $this->db->query("SELECT* FROM razas
                            WHERE razas.especie= 'perro'");
        return $this->db->fetchAll();
    }

    public function getGatos(){
        $this->db->query("SELECT* FROM razas
                            WHERE razas.especie= 'gato'");
        return $this->db->fetchAll();
    }

    public function getRaza($id_r){
        if(!ctype_digit($id_r)) throw new Exception('ID no valido');

        $this->db->query("SELECT* FROM razas
                            WHERE id_raza = $id_r");
        
        $fila = $this->db->fetch();
        return $fila;
    }
    public function getNombreRaza($id_r){
        if(!ctype_digit($id_r)) throw new Exception('ID no valido');
        
        $this->db->query("SELECT* FROM razas
                            WHERE id_raza = $id_r");
        
        $fila = $this->db->fetch();
        return $fila['nombre'];
    }
    //Aca se hacen validaciones??
}

?>