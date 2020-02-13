<?php
session_start();
require_once("funciones.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post modificado!</title>
    <?php include_once('include/head.php');?>
</head>
<body class="animated fadeIn bg-verde">
    <div class="container text-center vh-100 py-2 py-md-5">
        <div class="row procesando shadow my-2 my-md-5 mx-2 mx-md-0">

            <div class="col-12 col-md-5 d-flex flex-column align-items-center bg-white justify-content-center">
                    <h1 class="color-verde">Post modificado con exito</h1>
                    <p>Serás redireccionado al feed. <br><span class="small">  <a href="feed.php">Clickeá acá si no sos redireccionado en 5 segundos</a></span></p>       
            </div>

            <div class="col-12 col-md-7 processing">
            </div>
            <?php header( "refresh:5;url=feed.php" )?> 
        </div>
        <div class="row">
            <div class="col-12">
                <img  style="width:200px;" src="img/logo_chally.svg" alt="">
            </div>
        </div>

    </div>

</body>
</html>


