<!-- html/FormCrearUsuaroi.php-->

    <form class='form-login' action="" method="post">

    <p>
    <label for="nombre"> Nombres: </label>
        <input type="text" name="nombre" id="nombre"/>
    </p>
   
    <p>
    <label for="apellido"> Apellidos: </label>
    <input type="text" name="apellido" id="apellido"/>
    </p>
        
    <p>
        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad">
    </p>

    <p>
        <label for="telefono"> Telefono: </label>
        <input type="text" name="telefono" id="telefono"/>

    </p>
        
    

    <p>
        <label for="localidad"> Localidad:  </label>    
        <select class='form-select' name="localidad" id="localidad">
            <?php foreach ($this->localidades as $l) { ?>
                <option value="<?= $l['id_localidad']?>">   <?=  $l['nombre'] ?>     </option>
            <?php }?>
        </select> 
    </p>
        
    <p>
        <label for="direccion"> Direccion: </label>
        <input type="text" name="direccion">
    </p>
    <p>
        <label for="email"> Email: </label>
        <input type="text" name="email" id="email"/>
    </p>
    
    <p>
        <label for="password"> Contraseña: </label>
        <input type="password" name="password"/><br/>
    </p>
        <input type="submit" value="Crear Usuario"/>  
        <a class='link' href="iniciar-sesion">Cancelar</a>
    </form>


</body>
</html>
