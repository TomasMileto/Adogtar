<?php   // models/Neceisdades.php

class Necesidades extends Model{     
   
    public function getTodos(){
        $this->db->query("SELECT* FROM necesidades");
        return $this->db->fetchAll();
    }

    public function getNecesidad($id_n){
        if(!ctype_digit($id_n)) throw new Exception('ID no valido');
        $this->db->query("SELECT* FROM necesidades
                            WHERE id_necesidad = $id_n");
        
        $fila = $this->db->fetch();
        return $fila;
    }

    public function getNecesidadesLike($tipo){
        if(strlen($tipo)<0) throw new Exception('tipo no valido');                
        if(strlen($tipo)>20) throw new Exception('tipo no valido');  
        $tipo=$this->db->escape($tipo);
        $tipo=$this->db->escapeWildCard($tipo);

        $queryLike= "descripcion LIKE'".$tipo."%'";
        $this->db->query("SELECT* FROM necesidades 
                            WHERE $queryLike");
        
        return $this->db->fetchAll();
    }

    public function getNombreNecesidad($id_n){
        if(!ctype_digit($id_n)) throw new Exception('ID no valido');
        $this->db->query("SELECT* FROM necesidades
                            WHERE id_necesidad = $id_n");
        
        $fila = $this->db->fetch();
        return $fila['descripcion'];
    }

}

?>