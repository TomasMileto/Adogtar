<!-- html/MisPublicaciones.php-->


    <h1 class='titulo'> Listado de animales publicados</h1>


    <div class='animales-publicados'>
    <?php  $tiene_solicitud=false;
    foreach($this->animales as $a) {?>
        <section class='animal-publicado'>

            <img class='img-animal miniatura' src=<?="imagenes/".$a['imagen']?> alt="<?=$a['nombre']?>"> 

            <h2><?= $a['nombre']?></h2>
              
            <ul class='solicitudes-animal'> 
                <h3>►Solicitudes</h3>
                <?php foreach($this->solicitudes_animales as $sa) {
                        if($sa['id_animal'] == $a['id_animal']){ $tiene_solicitud=true;?>
                            <li class='solicitud-animal'> 
                                <span><b>Nombre</b>: <?=$sa['nombre']?></span>
                                <span><b>Telefono</b>: <?=$sa['telefono']?></span>
                                <span><b>Email</b>: <?=$sa['email']?></span> 
                                <span><b>Antiguedad</b>: <?php
                                    if($sa['anios_ant'] !=0) echo($sa['anios_ant'].' A, ');
                                    if($sa['meses_ant'] !=0) echo($sa['meses_ant'].' M, ');
                                    if($sa['dias_ant']  !=0) echo($sa['dias_ant'].'  D.');
                                ?></span>
                            </li>
                    <?php }/*if*/}/*foreach*/?>

                    <?php if($tiene_solicitud==false) { ?>
                        <li>No hay solicitudes por ahora</li>
                    <?php } ?>
                    <?php $tiene_solicitud=false;?>
            </ul>
            
            <form class='contenedor-concretar'action="asignar-<?=str_replace(" ","_",$a['tipo_necesidad'])?>-<?=$a['nombre']?>" method='POST'>
                    <input type="hidden" name="id_animal" value=<?=$a['id_animal']?> >
                    <input class='submit-concretar'type="submit" value="Concretar <?=$a['tipo_necesidad']?>">
            </form>
            <form class='contenedor-eliminar' action="eliminar-publicacion" onsubmit="return confirm('¿Seguro que quiere ELIMINAR la publicacion de <?=$a['nombre']?>?');" method='POST'>
                    <input type="hidden" name="id_animal" value=<?=$a['id_animal']?> >
                    <input class='submit-eliminar' type="submit" value="Eliminar Publicacion">
            </form>
            <?php } ?>
        </section> 
    </div>
    </table>

    <br><br>

    <a class='link' href="mi-perfil">Volver a mi perfil</a>
    
</body>
</html>