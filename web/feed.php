<?php

require_once("funciones.php");

session_start();
//SI EXISTE LA COOKIE, LA USA PARA CARGAR LA SESIÓN
if(isset($_COOKIE["email"])) {
    crearSesionConCookies();
}
//SI LA SESIÓN NO ESTÁ INICIADA NO SE PUEDE ACCEDER AL FEED
if(!isset($_SESSION["email"])) {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
$title="Inicio";
include("include/head.php");
?>

<body class="animated fadeIn">
<?php include('include/header-user.php');?>
  
  <!--Seccion Posteos -->
  
	<div class="container contenedor-feed mt-3 mb-5">
    <div class="row">
        <div class="col-3">

            <aside class="d-none d-md-block sticky-top">

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-bell"></i>&nbsp;Alertas de Desafíos</p>
                <div class="card shadow  p-3 mt-1 mb-4 alert alert-danger">
                    <p><a href="#"><i class="fas fa-clock"></i> Creá una infografía sobre cascos de realidad virtual</a>
                        <br> ¡Termina en 6 horas!</p>

                    <p><a href="#"><i class="fas fa-clock"></i>Rediseñá la tapa de un juego actual con estilo Retro  </a>
                        <br> ¡Termina en 9 horas!</p>
                </div>

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-user-friends"></i>&nbsp;Invitaciones</p>
                <div class="card shadow  p-3 mt-1 mb-4">
                    <p>Tenés 6 invitaciones de amigos pendientes</p>
                    <a href="#" class="btn btn-secondary">Ver invitaciones</a>
                </div>

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-trophy"></i>&nbsp;Chally destacado de la semana</p>
                <div class="card shadow  p-3 mt-1 mb-4">
                    <p>Creá un pixel-art de un momento épico de la TV Argentina</p>
                    <img src="img/challys/pelea-samid-viale.jpg" alt="Desafío - Creá un pixel-art de un momento épico de la TV Argentina">
                    <a href="#" class="btn btn-secondary">Participar</a>
                </div>

            </aside>
        </div>

        <div class="col-12 col-md-9">

            <div class="seccion-derecha my-3">
                <!--Menu para elegir vista de posteos-->
                <!--Fin menu para elegir vista de posteos-->

                <div class="row">
                    <div class="col-12">

                        <div class="card mb-5">

                            <div class="card-header posteo d-flex align-items-center">
                                <img class="rounded-circle" src="img/foto-matias-bruno.jpg" alt="Foto de Usuario">
                                <p class="mb-0 ml-3">Matías Bruno <span class="text-secondary texto-chico">(hace 2 horas)</span></p>    
                                

                                <div class="ml-auto">
                                    <a class="" href="edit-post.php"><i class="fas fa-pen"></i></a>
                                    &nbsp;

                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></button>
                                </div>

                            </div>

                            <div class="card-contenido">
                                <div class="row">
                                    <div class="col-12">
                                        <p>Les recomiendo este desafío que está muy bueno para poder ejercitar habilidades de CSS y HTML</p>
                                    </div>

                                    <div class="row card-content-attached">
                                        <div class="col-12 col-md-4">
                                            <img src="img/challys/viajes-especiales.jpg" class="img-fluid" alt="Desafío Viajes Espaciales">
                                        </div>

                                        <div class="col-12 col-md-8">
                                            <h3 class="ml-0">Diseñá una landing page para una agencia ficticia de viajes interplanetarios.</h3>

                                            <div class="metadata d-flex justify-content-between">
                                                <span class="dificultad">Dificultad: <img src="img/logo_c.svg" alt=""> <img src="img/logo_c.svg" alt=""> <img src="img/logo_c.svg" alt=""> <img src="img/logo_c_gris.svg" alt=""> <img src="img/logo_c_gris.svg" alt=""> </span>
                                                <span class="participantes"><i class="fas fa-user"></i>&nbsp; 18 Participantes</span>

                                            </div>
                                            <br>

                                            <p>El desafío consiste en Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos amet qui officia repellat inventore natus molestiae, ullam odio aut similique! Accusantium obcaecati, asperiores culpa officiis aliquam esse impedit sit distinctio.</p>
                                            <a href="#" class="btn btn-secondary">Ver más información</a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer d-flex justify-content-around">
                                <span class="likes"><i class="fas fa-heart"></i>&nbsp;18</span>

                                <span class="comments"><i class="fas fa-comment"></i>&nbsp;13</span>

                                <span class="compartidos"><i class="fas fa-share"></i>&nbsp;26</span>
                                <span class="guardar"><i class="fas fa-bookmark"></i> </span>
                            </div>





                        </div> <!-- CIERRE CARD -->




																								
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
  
  
  <!--Fin seccion Posteos-->
  <?php include("include/footer.php");?>

  
</body>
</html>