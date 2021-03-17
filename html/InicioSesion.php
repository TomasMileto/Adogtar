<!-- html/InicioSesion.php-->

    <p class='error-login'><?=$this->error?></p>
    <form class='form-login' action="" method="post">
        <p>
            <label for="email">Email: </label>
            <input type="text" name="email"  /> 
        </p>    
        
        <p>
            <label for="email">Contraseña: </label>
            <input type="password" name="password" />
        </p>

        <p>
            <input type="submit" name='login' value="Iniciar sesion"/>
        </p>

        <p>
            <input type="submit" name='create'value="Crear Usuario"/>
        </p> 
    
    </form>


</body>
</html>
