<?php   // models/Animales.php

class Animales extends Model{     
    private const EXT_PERMITIDAS= array('gif','png','jpg','jpeg','psd');

    public function getTodos($id_usuario){
        /*id_usuario viene de SESSION*/ 
        $this->db->query("SELECT a.id_animal, a.nombre, a.especie, r.nombre as raza, a.edad, a.tamanio, a.peso, l.nombre as localidad,
                                  a.direccion, a.sexo, a.descripcion, a.imagen, n.descripcion as tipo_necesidad, a.id_usuario
                            FROM animales as a, razas as r, localidades as l, necesidades as n 
                            WHERE   a.raza=r.id_raza and
                                    a.id_localidad=l.id_localidad and
                                    a.tipo_necesidad=n.id_necesidad and
                                    a.id_receptor is NULL and
                                    a.id_usuario <> $id_usuario");
        return $this->db->fetchAll();
    }

    public function getTodos_Filtered($filtros, $id_usuario){
        $query4where= "";

        #region VALIDACIONES
        /*id_usuario viene de SESSION */
        //tipo de adopcion
        if($filtros['tipo'] != ""){
            if(strlen($filtros['tipo']) >20) throw new ValidacionException('Error de validacion en busqueda');
            $filtros['tipo']=$this->db->escape($filtros['tipo']);
            $filtros['tipo']=$this->db->escapeWildCard($filtros['tipo']);
            $query4where= $query4where. "and n.descripcion LIKE '".$filtros['tipo']."%'";
        }
        //especie
        if($filtros['especie'] != ""){
            if(strlen($filtros['especie']) > 10) throw new ValidacionException('Error de validacion en busqueda');
            $filtros['especie']=$this->db->escape($filtros['especie']);
            $filtros['especie']=$this->db->escapeWildCard($filtros['especie']);
            $query4where= $query4where. "and a.especie ='".$filtros['especie']."'";
        }
        //sexo
        if($filtros['sexo'] != ""){
            if(strlen($filtros['sexo']) > 1) throw new ValidacionException('Error de validacion en busqueda');
            $filtros['sexo']=$this->db->escape($filtros['sexo']);
            $filtros['sexo']=$this->db->escapeWildCard($filtros['sexo']);
            $query4where= $query4where. "and a.sexo ='".$filtros['sexo']."'";
        }
        //tamanio
        if($filtros['tamanio'] != ""){
            if(strlen($filtros['tamanio']) > 7) throw new ValidacionException('Error de validacion en busqueda');
            $filtros['tamanio']=$this->db->escape($filtros['tamanio']);
            $filtros['tamanio']=$this->db->escapeWildCard($filtros['tamanio']);
            $query4where= $query4where. "and a.tamanio ='".$filtros['tamanio']."'";
        }
        //localidad
        if($filtros['localidad'] != ""){
            if(strlen($filtros['localidad']) > 50 ) throw new ValidacionException('Error de validacion en busqueda');
            $filtros['localidad']=$this->db->escape($filtros['localidad']);
            $filtros['localidad']=$this->db->escapeWildCard($filtros['localidad']);
            $query4where= $query4where. "and l.nombre ='".$filtros['localidad']."'";
        }
        var_dump($query4where );
        
        #endregion
        $this->db->query("SELECT a.id_animal, a.nombre, a.especie, r.nombre as raza, a.edad, a.tamanio, a.peso, l.nombre as localidad,
                            a.direccion, a.sexo, a.descripcion, a.imagen, n.descripcion as tipo_necesidad, a.id_usuario
                        FROM animales as a, razas as r, localidades as l, necesidades as n 
                        WHERE   a.raza=r.id_raza and
                                a.id_localidad=l.id_localidad and
                                a.tipo_necesidad=n.id_necesidad and
                                a.id_receptor is NULL and
                                a.id_usuario <> $id_usuario $query4where");
        return $this->db->fetchAll();
    }

    public function getTodosFrom($id_usuario){
        if(!ctype_digit($id_usuario)) throw new ValidacionException('ID no valido');
        
        $this->db->query("SELECT a.id_animal, a.nombre, a.especie, r.nombre as raza, a.edad, a.tamanio, a.peso, l.nombre as localidad,
                                  a.direccion, a.sexo, a.descripcion, a.imagen, n.descripcion as tipo_necesidad, a.id_usuario
                            FROM animales as a, razas as r, localidades as l, necesidades as n 
                            WHERE   a.raza=r.id_raza and
                                    a.id_localidad=l.id_localidad and
                                    a.tipo_necesidad=n.id_necesidad and
                                    a.id_usuario=$id_usuario");
        return $this->db->fetchAll();
    }
    public function getPerros(){
        $this->db->query("SELECT* FROM animales
                            WHERE animales.especie= 'perro'");
        return $this->db->fetchAll();
    }

    public function getGatos(){
        $this->db->query("SELECT* FROM animales
                            WHERE animales.especie= 'gato'");
        return $this->db->fetchAll();
    }

    public function getAnimal($id){
        if(!ctype_digit($id)) throw new Exception('ID de animal invalido');

        $this->db->query("SELECT a.id_animal, a.nombre, a.especie, r.nombre as raza, a.edad, a.tamanio, a.peso, l.nombre as localidad,
                                a.direccion, a.sexo, a.descripcion, a.imagen, n.descripcion as tipo_necesidad, a.id_usuario
                            FROM animales as a, razas as r, localidades as l, necesidades as n 
                            WHERE   a.raza=r.id_raza and
                                    a.id_localidad=l.id_localidad and
                                    a.tipo_necesidad=n.id_necesidad and
                                id_animal='$id'");
        return $this->db->fetch();
    }

    public function crearAnimal($nombre, $especie, $raza, $edad, $sexo, $tamanio, $peso, $idlocalidad, $direccion, $descripcion,
                                 $tipo_necesidad, $id_usuario){
        
        #region VALIDACIONES

        //nombre
        if(strlen($nombre)<=0) throw new ValidacionException("Error de animal 9");   //
        if(strlen($nombre)>20) throw new ValidacionException("Error de animal 10"); //deberia hacerlo en javascript?
        $nombre=$this->db->escape($nombre);
        $nombre=$this->db->escapeWildCard($nombre);
        

        //especie
        if($especie != 'gato' && $especie!= 'perro') throw new ValidacionException("Error de animal 11");
        $especie=$this->db->escape($especie);
        $especie=$this->db->escapeWildCard($especie);

        //raza
        if(!ctype_digit($raza)) throw new ValidacionException("Error animal 12"); //chequear que exista en raza
        if($raza <0) throw new ValidacionException("Error animal 13");
        
        //edad
        if(!ctype_digit($edad)) throw new ValidacionException("Error animal 14");
        if($edad <0) throw new ValidacionException("Error animal 15");
        
        //sexo
        if($sexo != 'H' && $sexo!= 'M') throw new ValidacionException("Error de animal 16");
        $sexo=$this->db->escape($sexo);
        $sexo=$this->db->escapeWildCard($sexo);

        //tamanio
        if($tamanio != 'chico' && $tamanio!= 'mediano' && $tamanio!= 'grande') throw new ValidacionException("Error de animal 17");
        $tamanio=$this->db->escape($tamanio);
        $tamanio=$this->db->escapeWildCard($tamanio);
        //peso
        if(!ctype_digit($peso) && $peso!=null) throw new ValidacionException("Error animal 18");
        
        //localidad
        if(!ctype_digit($idlocalidad)) throw new ValidacionException("Error animal localidad");
        if($idlocalidad <0) throw new ValidacionException("Error animal localidad");

        //direccion     
        if(strlen($direccion)<0) throw new ValidacionException("Error de animal ubicacion");   
        if(strlen($direccion)>20) throw new ValidacionException("Error de animal ubicacion"); 
        $direccion=$this->db->escape($direccion);
        $direccion=$this->db->escapeWildCard($direccion);
        

        //descripcion
        if(strlen($descripcion)>300) throw new ValidacionException("Error de animal 19");
        $descripcion=$this->db->escape($descripcion);
        $descripcion=$this->db->escapeWildCard($descripcion);


        //imagen        
        $imagen_path=null;

        //tipo_necesidad
        if(!ctype_digit($tipo_necesidad)) throw new ValidacionException("Error animal 20");
        if($tipo_necesidad <0) throw new ValidacionException("Error animal 21");

        //id_usuario
        if(!ctype_digit($id_usuario)) throw new ValidacionException("Error animal 22");
        #endregion

        $this->db->query("INSERT INTO animales
                            (nombre,especie,raza,edad,sexo,tamanio,peso,id_localidad,direccion,descripcion,imagen,tipo_necesidad,id_usuario)VALUES
                            ('$nombre','$especie',$raza,$edad,'$sexo','$tamanio',$peso,$idlocalidad,'$direccion','$descripcion','$imagen_path',$tipo_necesidad,$id_usuario) ");
        
        /*Actualizar imagen y subirla a carpeta en sv*/
        $imagen= $_FILES['imagen']['name'];
        $lastID= $this->db->insertID();
        
        if($imagen != NULL){
            $path=pathinfo($imagen);
            $ext = $path['extension'];
            if (!in_array($ext,self::EXT_PERMITIDAS))  throw new ValidacionException("Error de animal 20, tipo de archivo no permitido");
            $imagen= "animal_".($lastID+1).".".$ext;
            $target="../imagenes/".basename($imagen);
            $imagen_path=$imagen;
        } 
        if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $target))  $imagen_path="error.png";
        $this->db->query("UPDATE animales
                            SET imagen='$imagen_path'
                            WHERE id_animal='$lastID'"); 
    }
    
    public function eliminarAnimal($id_animal, $id_usuario){
        
        #region VALIDACIONES
        //id_usuario
        if(!ctype_digit($id_usuario)) throw new ValidacionException("Error al eliminar publicacion");  
        //id_animal
        if(!ctype_digit($id_animal)) throw new ValidacionException("Error al eliminar publicacion");  

        #end region
        $this->db->query("DELETE FROM animales
                            WHERE animales.id_animal= $id_animal and
                                  animales.id_usuario= $id_usuario");
        return true;
    }

    public function ActualizarReceptor($id_animal, $id_usuario, $id_receptor){
        
        #region VALIDACIONES
        //id_usuario
        if(!ctype_digit($id_usuario)) throw new ValidacionException("Error al actualizar publicacion");  
        //id_animal
        if(!ctype_digit($id_animal)) throw new ValidacionException("Error al actualizar publicacion");  
        //id_receptor
        if(!ctype_digit($id_receptor)) throw new ValidacionException("Error al actualizar publicacion");  
        #end region

        $this->db->query("UPDATE animales
                            SET animales.id_receptor= $id_receptor
                            WHERE animales.id_animal= $id_animal and
                                  animales.id_usuario= $id_usuario");
        return true;
    }

    public function AnularReceptor($id_animal, $id_usuario, $id_receptor){
         #region VALIDACIONES
        //id_usuario
        if(!ctype_digit($id_usuario)) throw new ValidacionException("Error al actualizar publicacion");  
        //id_animal
        if(!ctype_digit($id_animal)) throw new ValidacionException("Error al actualizar publicacion");  
        //id_receptor
        if(!ctype_digit($id_animal)) throw new ValidacionException("Error al actualizar publicacion");  
        #end region

        $this->db->query("UPDATE animales
                            SET animales.id_receptor= null
                            WHERE animales.id_animal= $id_animal and
                                  (animales.id_usuario= $id_usuario OR animales.id_receptor=$id_receptor)");
        return true;
    }
   
}

class ValidacionException extends Exception{

}

?>