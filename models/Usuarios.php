<?php   // models/Usuarios.php

class Usuarios extends Model{     
    
    // public function getUsuario(){
    //     $this->db->query("SELECT* FROM usuarios
    //                         WHERE id_usuario=$this->id");
    //     return $this->db->fetch();
    // }

    public function getUsuarioByID($id){
        if(!ctype_digit($id)) throw new Exception('ID de usuario no valido');

        $this->db->query("SELECT usuarios.*, localidades.nombre as nombre_localidad,
                                TIMESTAMPDIFF(DAY,fecha_incorporacion,NOW()) %30 as dias_ant,
                                TIMESTAMPDIFF(MONTH,fecha_incorporacion,NOW()) %12 as meses_ant,
                                TIMESTAMPDIFF(YEAR,fecha_incorporacion,NOW())  as anios_ant
                            FROM usuarios, localidades
                            WHERE usuarios.id_localidad=localidades.id_localidad and id_usuario=$id");
        return $this->db->fetch();
    }

    public function getUsuarioByEmail($email){
        //validaciones
        if(strlen($email)<0) throw new Exception('email de usuario no valido');                
        if(strlen($email)>20) throw new Exception('email de usuario no valido');  
        $email=$this->db->escape($email);
        $email=$this->db->escapeWildCard($email);

        $this->db->query("SELECT usuarios.*, localidades.nombre as nombre_localidad
                            FROM usuarios, localidades
                            WHERE usuarios.id_localidad=localidades.id_localidad and email='$email'");
        return $this->db->fetch();
    }
    public function loguear(){
        #region VALIDACIONES
        if(!isset($_POST['email'])) throw new LoginException("Error en login");
        $_POST['email']= $this->db->escape($_POST['email']);
        $_POST['email']= $this->db->escapeWildcard($_POST['email']);
        $email= $_POST['email'];
        
        if(!isset($_POST['password'])) throw new LoginException("Error en login");
        $_POST['password']= $this->db->escape($_POST['password']);
        $_POST['password']= $this->db->escapeWildcard($_POST['password']);
        $password= sha1($_POST['password']);
        #endregion
              

        $this->db->query("SELECT*
                            FROM usuarios
                            WHERE email='$email' and password='$password'
                            LIMIT 1");
        
        if($this->db->numRows() == 1){
            return $this->db->fetch();   
        }    
        return false;
    }
    public function crearUsuario($nombre, $apellido, $edad, $telefono, $email, $idlocalidad, $direccion, $password){
         #region VALIDACIONES  

        //nombre
        if(strlen($nombre)<0) throw new CreationException("Error creacion usuario: nombre");                  //
        if(strlen($nombre)>20) throw new CreationException("Error creacion usuario: nombre"); //deberia hacerlo en javascript?
        $nombre=$this->db->escape($nombre);
        $nombre=$this->db->escapeWildCard($nombre);

        //apellido
        if(strlen($apellido)<0) throw new CreationException("Error creacion usuario: apellido");                
        if(strlen($apellido)>20) throw new CreationException("Error creacion usuario: apellido"); 
        $apellido=$this->db->escape($apellido);
        $apellido=$this->db->escapeWildCard($apellido);
        
        $nombre_completo= ucwords($nombre) ." ".ucwords($apellido);     //pone primeras letras en mayusq

        //edad
        if(!ctype_digit($edad)) throw new CreationException("Error creacion usuario: edad"); 
        if($edad <0) throw new CreationException("Error creacion usuario: edad"); 

        //telefono
        if(!ctype_digit($telefono)) throw new CreationException("Error creacion usuario: telefono"); 
        if($telefono <8) throw new CreationException("Error creacion usuario: telefono"); 
        
        //email
        if(strlen($email)<0) throw new CreationException("Error creacion usuario: email");                  
        if(strlen($email)>50) throw new CreationException("Error creacion usuario: email"); 
        $email=$this->db->escape($email);
        $email=$this->db->escapeWildCard($email);
        
        //localidad
        if(!ctype_digit($idlocalidad)) throw new CreationException("Error creacion usuario: localidad");   
        if($idlocalidad <0) throw new CreationException("Error creacion usuario: localidad");   

        //direccion     
        if(strlen($direccion)<0) throw new CreationException("Error creacion usuario: direccion");    
        if(strlen($direccion)>20) throw new CreationException("Error creacion usuario: direccion");   
        $direccion=$this->db->escape($direccion);
        $direccion=$this->db->escapeWildCard($direccion);

        //password
        if(strlen($password)<0) throw new CreationException("Error creacion usuario: password");                  
        if(strlen($password)>50) throw new CreationException("Error creacion usuario: password"); 
        $password=$this->db->escape($password);
        $password=$this->db->escapeWildCard($password);
        $password= sha1($password);
        #endregion

        $this->db->query("INSERT INTO usuarios
                            (nombre, edad, telefono, email, fecha_incorporacion, id_localidad, direccion,password)VALUES
                            ('$nombre_completo', $edad, $telefono,'$email', NOW(), $idlocalidad, '$direccion', '$password') ");

  
        // $_SESSION['nombre']= $nombre_completo;
        return $this->db->insertID(); 
    }


    // public function getID(){
    //     return $this->id;
    // }
}

class LoginException extends Exception{

}
class CreationException extends Exception{

}

?>