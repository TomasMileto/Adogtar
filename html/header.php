<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../adogtar/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title><?=$this->titulo?></title>

    <script>
        window.addEventListener("beforeunload", function () {
        document.main.classList.add("animate-out");
    });
    </script>

</head>
<body>


    <nav id='navbar'>
        <ul class='navbar-nav'>
            <li class='nav-item'><a href="../adogtar" class=nav-link>Inicio</a></li>
            <li class='nav-item'><a href="listado-animales?tipo=adopcion" class=nav-link>Adoptar</a></li>
            <li class='nav-item'><a href="listado-animales?tipo=transito" class=nav-link>Brindar Transito</a></li>
            <li class='nav-item'><a href="dar-en-adopcion" class=nav-link>Dar en adopcion</a></li>
            <li class='nav-item'><a href="dar-en-transito" class=nav-link>Dar en transito</a></li>
            <?php if(!isset($_SESSION['logueado'])){?>
                <li class='nav-item'><a href="iniciar-sesion" class=nav-link>Iniciar Sesion</a></li>
            <?php }else{ ?>
                <li class='nav-item'><a href="mi-perfil" class=nav-link>Mi Perfil</a></li>
                <!--<li class='nav-item'><a href="#" class=nav-link>Cerrar Sesion</a></li>-->
            <?php } ?>
            
        </ul>
    </nav>

    <main class='animate-in'>

    