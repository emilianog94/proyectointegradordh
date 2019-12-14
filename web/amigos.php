<?php
require_once("funciones.php");

session_start();
//SI EXISTE LA COOKIE, LA USA PARA CARGAR LA SESIÓN
if(isset($_COOKIE["email"])) {
    crearSesionConCookies();
}
//SI LA SESIÓN NO ESTÁ INICIADA NO SE PUEDE ACCEDER A LA PÁGINA DE AMIGOS
if(!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
    <?php
        $title="Vista De Amigos";
        // include("include/head.php");
    ?>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/959125d25f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/animate.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.js"></script>    
    <script>
	var scroll = new SmoothScroll('a[href*="#"]');
    </script>
 
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/style.css">

    <title><?php echo $title;?></title>
</head>
    
<body class="perfil animated fadeIn">
    <?php include("include/header-user.php");?>
    
    <!--Seccion PORTADA -->
    <div class="contenedor-principal-amigos">
    <header class="profile">
        <div class="container">
        <!-- <div class="row"> -->
            <!-- <div class="col-12"> -->
            <div class="text-white info_profile text-center pt-5 pb-5">
                <img class="img-thumbnail rounded-circle profile-pic" src="avatars/<?=$_SESSION['avatar'];?>" alt="head_profile">        
                <h1><?=$_SESSION['name'] . " " . $_SESSION['lastname'];?></h1>
                <h2>@<?=$_SESSION['username'];?></h2>
                <h3>challys solved:123</h3>
                <h3>challys created:123</h3>
            </div>
            <!-- </div> -->
        <!-- </div> -->
        </div>
    </header>

    <div class="container">
        <div class="barra-amigos">
            <h6>Amigos de <?=$_SESSION['name'] . " " . $_SESSION['lastname'];?> (7)</h6>
        </div>
    </div>
    <div class="contenedor-amigos container">
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
    </div>
    </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>