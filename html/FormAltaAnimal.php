
<h1 class='titulo'> Dar en <?=ucfirst($this->tipo)?> </h1>

    <form class='form-animal <?=$this->tipo?>' action="" method="post" enctype="multipart/form-data">
        
        <div>
            <label class='form-animal-label' for="image">Imagen: </label>
            <input type="file" name="imagen">
        </div>
        
        <p id='nombre-div'>
            <label class='form-animal-label'for="nombre"> Nombre: </label>
            <input type="text" name="nombre" id="nombre"/>
        </p>
       
        
        <?php if(count($this->tipos)>1) { ?>
            <fieldset>
                <legend>Tipo de <?=$this->tipo?> </legend>
                <?php foreach($this->tipos as $t) { ?>
                <p>
                    <input type="radio" name="necesidad" id="<?=$t['descripcion']?>"  value="<?=$t['id_necesidad']?>">
                    <label for="<?=$t['descripcion']?>"> <?=ucfirst($t['descripcion'])?> </label>
                </p>
                <?php } ?>
            </fieldset>
        <?php } else{?>
            <input type="hidden" name="necesidad" value="<?=$this->tipos[0]['id_necesidad']?>">
        <?php } ?>

        <fieldset>
            <legend>Especie</legend>
            <p > 
                <input type="radio" name="especie" id="perro" value="perro" onclick="radioHandler();" >
                <label for="perro"> Perro </label>
            </p>
            <p>
                <input type="radio" name="especie" id="gato" value="gato" onclick="radioHandler();">
                <label for="gato"> Gato </label>
            </p>
        </fieldset>

        <script>
            function radioHandler(){
                var especies=document.getElementsByName("especie");
                var select_perros=document.getElementById('perros');
                var select_gatos=document.getElementById('gatos');

                document.getElementById('select-place-holder').classList.add('oculto');
                
                if(especies[0].checked){
                    select_gatos.classList.add('oculto');
                    select_perros.classList.remove('oculto');
                }
                if(especies[1].checked){
                    select_perros.classList.add('oculto');
                    select_gatos.classList.remove('oculto');
                }
            }
        </script>
       
        <p>
            <label class='form-animal-label'for="raza"> Raza:  </label>    
            <span id='select-place-holder'> *Seleccione una especie</span>  
            <select class='form-select oculto'name="raza" id="perros">
                <option value="" selected disabled hidden> Razas de perros </option>
                <?php foreach ($this->razas_perro as $rp) { ?>
                    <option value="<?= $rp['id_raza']?>">   <?=  $rp['nombre'] ?>     </option>
                <?php }?>
            </select>  
            <select class='form-select oculto'name="raza" id="gatos">
                <option value="" selected disabled hidden> Razas de gatos </option>
                <?php foreach ($this->razas_gato as $rg) { ?>
                    <option value="<?= $rg['id_raza']?>">   <?=  $rg['nombre'] ?>     </option>
                <?php }?>
            </select>  
        </p>
    
       
        <p>
            <label class='form-animal-label'for="edad">Edad: </label>
            <input type="number" name="edad" id="edad">
        </p>
        
        <fieldset>
            <legend>Sexo</legend>
            <p>
                <input type="radio" name="sexo" id="macho" value="M">
                <label for="macho"> Macho </label>
            </p>
            <p>
                <input type="radio" name="sexo" id="hembra" value="H">
                <label for="hembra"> Hembra </label>
            </p>
        </fieldset>

        <fieldset>
            <legend>Tamaño</legend>
            <p>
                
                <input type="radio" name="tamanio" id="chico" value="chico">
                <label for="chico"> Chico </label>
            </p>
            <p>
                <input type="radio" name="tamanio" id="mediano" value="mediano">
                <label for="mediano"> Mediano </label> 
            </p>
            <p>
                <input type="radio" name="tamanio" id="grande" value="grande">
                <label for="grande"> Grande </label>
            </p>
        </fieldset>

        <p>
            <label class='form-animal-label'for="peso"> Peso: </label>
            <input type="text" name="peso" id="peso"/>   kg.
        </p>
      
        <p>
            <label class='form-animal-label' for="localidad"> Localidad:  </label>    
            <select class='form-select' name="localidad" id="localidad">
                <?php foreach ($this->localidades as $l) { ?>
                    <option value="<?= $l['id_localidad']?>">   <?=  $l['nombre'] ?>     </option>
                <?php }?>
            </select> 
            <label class='form-animal-label' for="direccion"> Direccion: </label>
            <input type="text" name="direccion" id="direccion">
        </p>
      
        <div>
            <label for="descripcion">Descripcion:</label>
            <textarea class='form-textarea' name="descripcion" id="descripcion" cols="30" rows="10" placeholder="(Max. 300 caracteres)..."></textarea>
        <div>
      
        <input type="submit" class='form-submit' value="Dar en <?=ucfirst($this->tipo)?>"/>  
    </form>

</body>
</html>