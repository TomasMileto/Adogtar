<?php   // models/Solicitudes_Animales.php
//Trabaja con las tabla solicitudes_aniamles
/*
    Atributos:

        id_animal   -> int(10)       |   PK
        id_usuario  -> int(10)       |   PK
        comentario  -> varchar(250) 

*/

class Solicitudes_Animales extends Model{     
   
    public function getTodosFor($id_usuario){
        if(!ctype_digit($id_usuario)) return false;
        if($id_usuario<1) return false;

        $this->db->query("SELECT  sa.*, u.nombre, u.edad, u.telefono, u.email,
                                TIMESTAMPDIFF(DAY,u.fecha_incorporacion,NOW()) %30 as dias_ant,
                                TIMESTAMPDIFF(MONTH,u.fecha_incorporacion,NOW()) %12 as meses_ant,
                                TIMESTAMPDIFF(YEAR,u.fecha_incorporacion,NOW())  as anios_ant
                            FROM solicitudes_animales as sa
                            LEFT JOIN usuarios as u ON u.id_usuario=sa.id_usuario
                            LEFT JOIN animales as a ON a.id_animal=sa.id_animal
                            WHERE  a.id_usuario = $id_usuario");

        return $this->db->fetchAll();
    }

    public function getTodosForAnimal($id_animal){
        if(!ctype_digit($id_animal)) return false;
        if($id_animal<1) return false;

        $this->db->query("SELECT  sa.*, u.nombre, u.edad, u.telefono, u.email
                            FROM solicitudes_animales as sa
                            LEFT JOIN usuarios as u ON u.id_usuario=sa.id_usuario
                            LEFT JOIN animales as a ON a.id_animal=sa.id_animal
                            WHERE  a.id_animal = $id_animal");
                

        return $this->db->fetchAll();
    }

    public function solicitudExiste($id_animal, $id_usuario){
        if(!ctype_digit($id_animal)) return false;
        if(!ctype_digit($id_usuario)) return false;
        if($id_animal<1) return false;
        if($id_usuario<1) return false;

        $this->db->query("SELECT* FROM solicitudes_animales
                            WHERE id_animal = $id_animal and
                                  id_usuario = $id_usuario");
        
        if($this->db->numRows() != 1) return false;
        
        return true;
    }
    public function crearNuevaSolicitud($id_animal, $id_usuario, $comentario){
        #region VALIDACIONES  
        
       //id_usuario
       if(!ctype_digit($id_usuario)) throw new SolicitudException("Error al crear solicitud");  
        
       //id_animal
       if(!ctype_digit($id_animal)) throw new SolicitudException("Error al crear solicitud");  
    
       //comentario
       if(strlen($comentario)>250) throw new SolicitudException("Error al crear solicitud");                
       $comentario=$this->db->escape($comentario);
       $comentario=$this->db->escapeWildCard($comentario);
       #endregion
      

       $this->db->query("INSERT INTO solicitudes_animales
                           (id_animal, id_usuario, comentario)VALUES
                           ($id_animal, $id_usuario, '$comentario')");
   }
   public function eliminarSolicitudesPara($id_animal){  
    #region VALIDACIONES
    //id_animal
    if(!ctype_digit($id_animal)) throw new ValidacionException("Error al eliminar publicacion");  

    #end region
    $this->db->query("DELETE FROM solicitudes_animales
                        WHERE id_animal= $id_animal");
    return true;
}
}

class SolicitudException extends Exception{

}
?>