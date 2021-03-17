<!-- html/MiPerfil.php-->

    <?php $u= $this->usuario ?>

    <div class='contenedor-perfil'>
        <h1 class='nombre'> <?= $u['nombre']?></h1>
        
        <section class='informacion-contacto'>
            <h4>Telefono: <?=$u['telefono']?></h3> 
            <h4>Email: <?=$u['email']?></h4>
        </section>
    
        
        <section class='informacion-personal'>
            <p>Edad: <?=$u['edad']?> años</p>
            <p>Antiguedad: <?php
                    if($u['anios_ant'] !=0) echo($u['anios_ant'].' Años, ');
                    if($u['meses_ant'] !=0) echo($u['meses_ant'].' Meses, ');
                    if($u['dias_ant']  !=0) echo($u['dias_ant'].'  Dias.');
                    ?>
            </p>
            <p>Ubicacion: <?=$u['nombre_localidad']?>, <?= $u['direccion']?></p>
        </section>
    </div>
    

    <a class='link-publicaciones' href="mis-publicaciones">Mis publicaciones</a> 


    <a class='link-cerrar-sesion' href="cerrar-sesion">Cerrar Sesion</a>
    
</body>
</html>