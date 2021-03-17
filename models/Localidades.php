<?php   // models/Localidades.php

class Localidades extends Model{     
   
    public function getTodos(){
        $this->db->query("SELECT* FROM localidades");
        return $this->db->fetchAll();
    }

    public function getLocalidad($id_l){
        if(!ctype_digit($id_l)) throw new Exception('ID de localidad invalido');
        $this->db->query("SELECT* FROM localidades
                            WHERE id_localidad = $id_l");
        
        $fila = $this->db->fetch();
        return $fila;
    }
}

?>