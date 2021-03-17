<!-- html/FormCrearUsuaroi.php-->

    <?php if($this->existenSolicitudes){?>
        <form action="" method="post">
            <label for="solicitudes"> Usuarios solicitante:  </label>    
            <select name="solicitante" id="solicitudes">
                <option value="" selected disabled hidden>Usuario que recibirá a <?=$this->animal['nombre']?></option>
                <?php foreach ($this->solicitudes as $s) { ?>
                    <option value="<?=$s['id_usuario']?>">  <?= $s['nombre'] ?>, <?=$s['email']?>   </option>
                <?php }?>
            </select> 
            
            <input type="hidden" name="id_animal" value=<?=$this->animal['id_animal']?>>
            <input type="submit" value="Elegir Receptor"/>  
            
        </form>
    <?php } else{?>
        <h3>Aun no existen solicitudes para <?=$this->animal['nombre']?></h3>
    <?php } ?>

    <a href="mis-publicaciones">Volver Atras</a>


</body>
</html>
