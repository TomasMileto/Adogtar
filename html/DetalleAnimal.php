<!-- html/DetalleAnimal.php-->

    <?php $u= $this->usuario ?>
    <?php $a= $this->animal ?>

    

    <div class="contenedor-animal">
        <a class='link' href="listado-animales?tipo=<?=substr($a['tipo_necesidad'],0,8)?>">Volver a la lista</a>
        <h1 class='nombre'> <?=ucwords($a['tipo_necesidad'])?> de <?=$a['nombre']?></h1>
    
        <img class='img-animal' src=<?="imagenes/".$a['imagen']?> alt="" >

        <section class='informacion-animal'>
            <h3><?=ucfirst($a['especie'])?> • <?=$a['raza']?> </h3>             
            <h4>Ubicacion: <?=$a['localidad']?>, <?=$a['direccion']?> </h4> 
        
            <p><b>Sexo:</b> <?php if($a['sexo']=='H') echo('Hembra'); else echo('Macho'); ?></p> 
        
            <p><b>Tamaño:</b> <?=ucwords($a['tamanio'])?> </p>
            <p><b>Peso:</b> <?=$a['peso']?> Kg.</p>
            <p class='descripcion-animal'>
                <span><b>Descripcion</b></span> 
                <span><?=$a['descripcion']?></span>
            </p>
        </section>
        
        <section class='informacion-contacto'>
            <h2>Datos de Usuario</h2>    
            <p><?=$u['nombre']?>, <?=$u['edad']?> años</p>
            <p>Mail: <?=$u['email']?></p>
            <p>Telefono: <?=$u['telefono']?></p>
        </section>

        <section class='solicitud <?=str_replace(' ','_',$a['tipo_necesidad'])?>'>
            <h2>Solicitar recepción de <?=ucwords($a['nombre'])?></h2>
            <form action="nueva-solicitud" method="POST">
                <textarea name="comentario" id="comentario" cols="50" rows="3">Hola! Estoy interesado en <?=$a['nombre']?>.</textarea>
                <input type="hidden" name="id_animal" value="<?=$a['id_animal']?>">
                <input class='solicitud-submit' type="submit" value="Postularse para <?=$a['tipo_necesidad']?>">
            </form>
        </section>
        
    </div>
    
</body>
</html>