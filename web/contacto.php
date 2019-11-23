<!DOCTYPE html>
<html lang="en">
<?php
$title="Inicio";
include("include/head.php");
?>


<body class="animated fadeIn">
    <div class="contenedor-perfil">

    <section class="container-fluid px-5">
        <div class="row d-flex align-items-center vh-100 flex-wrap">
            <div class="d-none d-sm-none d-md-flex d-lg-flex  col-sm-7 col-md-7 col-lg-8">
                <!-- <h1 class="text-white display-4 d-none d-md-block">Superá tus límites participando en la primera red social de desafíos digitales</h1>
                <h1 class="text-white d-block d-md-none">Superá tus límites participando en la primera red social de desafíos digitales</h1> -->
            </div>

            <div class="col-12 col-sm-12 col-md-5 col-lg-4 shadow contacto-form p-5 d-flex flex-column align-items-center">
                <a href="index.php"><img class="mb-4" src="img/logo_c.svg" alt=""></a>
                <h3 class="color-verde text-center mb-4">Contactanos</h3>
                <form class="w-100">

                <div class="form-group" method="POST" action="register.php">
                    <label for="inputName">Tu nombre y Apellido</label>
                    <input type="text" class="form-control" id="inputName" required>
                </div>

                <div class="form-group">
                    <label for="inputMail">Tu mail</label>
                    <input type="email" class="form-control" id="inputMail" required>
                </div>

                <div class="form-group">
                    <label for="inputConsulta">Dejanos tu consulta:</label>
                    <textarea class="form-control" id="inputConsulta" rows="3" required></textarea>
                    <!-- <input type="" class="form-control" id="inputConsulta" required> -->
                </div>


                <a class="btn btn-secondary w-100" href="#" role="button">Avanzar</a>
                </form>                
            </div>
    
    </div>
</body>