<!-- html/ListadoAnimales.php-->
    <script src="https://kit.fontawesome.com/41c75b4f8f.js" crossorigin="anonymous"></script>

    <h1 class='titulo'> Listado Animales</h1>

    <form action='' class="filter" method='GET' id='filter-form'>
            <p>
                <label for="Tipo"> Tipo  </label>    
                <select class='filter-select' name="tipo" id="tipo">
                    <option value="" <?php if($this->s_filtros['tipo']=="") echo("selected")?> name='disabled'> Cualquiera</option>
                    <option value="adopcion" <?php if($this->s_filtros['tipo']=="adopcion") echo("selected")?>>  Adopcion  </option>
                    <option value="transito"<?php if($this->s_filtros['tipo']=="transito") echo("selected")?>>  Transito  </option>
                </select> 
            </p>
            <p>
                <label for="especie"> Especie  </label>    
                <select class='filter-select' name="especie" id="especie">
                    <option value="" <?php if($this->s_filtros['especie']=="") echo("selected")?>  name='disabled'> Cualquiera</option>
                    <option value="gato" <?php if($this->s_filtros['especie']=="gato") echo("selected")?>>  Gato  </option>
                    <option value="perro" <?php if($this->s_filtros['especie']=="perro") echo("selected")?>>  Perro  </option>
                </select> 
            </p>
            <p>
                <label for="tamanio"> Tamaño  </label>    
                <select class='filter-select' name="tamanio" id="tamanio">
                    <option value="" <?php if($this->s_filtros['tamanio']=="") echo("selected")?> name='disabled' > Cualquiera</option>
                    <option value="chico"<?php if($this->s_filtros['tamanio']=="chico") echo("selected")?>> <a href="">Chico</a> </option>
                    <option value="mediano"<?php if($this->s_filtros['tamanio']=="mediano") echo("selected")?>>  Mediano  </option>
                    <option value="grande"<?php if($this->s_filtros['tamanio']=="grande") echo("selected")?>>  Grande  </option>
                </select> 
            </p>
            <p>
                <label for="sexo"> Sexo  </label>    
                <select class='filter-select' name="sexo" id="sexo">
                    <option value="" <?php if($this->s_filtros['sexo']=="") echo("selected")?> name='disabled' > Cualquiera</option>
                    <option value="H"<?php if($this->s_filtros['sexo']=="H") echo("selected")?>>  Hembra  </option>
                    <option value="M"<?php if($this->s_filtros['sexo']=="M") echo("selected")?>>  Macho  </option>
                </select> 
            </p>

            <p>
                <label for="localidad"> Localidad  </label>    
                <select class='filter-select' name="localidad" id="localidad">
                    <option value="" <?php if($this->s_filtros['localidad']=="") echo("selected")?>  name='disabled' > Cualquiera</option>
                    <?php foreach ($this->localidades as $l) { ?>
                        <option value="<?= $l['nombre']?>"<?php if($this->s_filtros['localidad']==$l['nombre']) echo("selected")?>>   <?=  ucwords($l['nombre']) ?>     </option>
                    <?php }?>
                </select> 
            </p>
            
            <script>
                function disableSelects(){
                    var disabled=document.getElementsByName("disabled");
                    disabled.forEach(d =>{
                    d.disabled=true;
                    document.getElementById('filter-form').submit();
                });
                }
                
            </script>
            <input class='filter-submit' type="button" onclick="disableSelects();" value="Buscar"/>
    </form>


    <ul class='animal-list'>
    <?php  foreach($this->animales as $a) { ?>
        <?php $fixed_necesidad= str_replace(' ','_',$a['tipo_necesidad']);?>
        <li class='animal-list-item <?=$fixed_necesidad?>'>
            <img class='list-img'src=<?="imagenes/".$a['imagen']?> alt="" >
            <span class='tipo_necesidad'> <?=strtoupper($a['tipo_necesidad'])?></span>
            <span class='nombre'> <?= strtoupper($a['nombre'])?></span>
            <i class="fas fa-<?php if($a['especie']=='perro') echo('dog'); else echo('cat');?>"> </i>
            <!-- <span class='edad'> Edad: <?= $a['edad']?> año(s)</span> -->
            <a class='animal-item-link' href="<?=$fixed_necesidad?>-animal-<?=$a['id_animal']?>"></a></span>
            <span class='tooltip-text'>Click para ver más...</span>
        </li>
            
    <?php } ?>
    </ul>


    <br><br>

    
</body>
</html>