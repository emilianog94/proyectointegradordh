<?php
require_once('funciones.php');

session_start();
$usuario= Usuario::mantenerSesion();
$desafios = Desafio::buscarPorId($usuario['id_usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title="Perfil";
include("include/head.php");
?>

<body class="perfil animated fadeIn">
<?php include('include/header-user.php');?>
  
  <!--Seccion PORTADA -->
  
  <header class="profile">
    <div class="container-fluid">
      <!--<div class="row">-->
        <!--<div class="col-12">-->
          <div class="text-white info_profile text-center pt-5 pb-5">
            <!-- <img class="img-thumbnail rounded-circle profile-pic" src="avatars/<?=$usuario['avatar'];?>" alt="head_profile">         -->
            <div class="contenedor-main-foto">
                <img class="main-foto" src="avatars/<?=$usuario['avatar'];?>" alt="">
            </div>
            <h1><?=$usuario['nombre'] . " " . $usuario['apellido'];?></h1>
            <h2>@<?=$usuario['username'];?></h2>
            <h3>Challys creados: 0</h3>
            <h3>Challys resueltos: 9</h3>
          </div>
        <!-- </div> -->
      <!-- </div> -->
    </div>
  </header>
  
  <!--Fin Seccion PORTADA -->
  
  
  <!--Seccion Posteos -->
  
  <div class="container">
    <div class="row">
      <div class="col-3 col-sm-3 d-none d-mb-flex d-lg-flex">
        
        <aside >
          <section class="informacion_usuario shadow  p-3 mt-3 mb-3">
            <h3 class="color-verde">Acerca del usuario</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quis excepturi, cum veritatis delectus inventore, deserunt aliquam ea repellat quam reprehenderit, saepe possimus dignissimos fuga animi recusandae. Esse, earum ullam!</p>
            <div class="trofeos">
              <div>  
                <!--Tarjeta para trofeos ganados -->
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="img/trofeo_perfil.png" class="card-img p-3" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Chally destacado</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Fin tarjeta para trofeos ganados-->
                
                <!--Tarjeta para trofeos ganados -->
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="img/trofeo_perfil.png" class="card-img p-3" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Chally destacado</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Fin tarjeta para trofeos ganados-->
                <!--Tarjeta para trofeos ganados -->
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="img/trofeo_perfil.png" class="card-img p-3" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Chally destacado</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Fin tarjeta para trofeos ganados-->
              </div>
            </div>
          </section>
          
          <section class="previsualizacion_amigos shadow p-3 mt-3 mb-3">
            <h4><a class="color-verde" href="amigos.php">Lista de amigos</a></h4>
            <div class="container-fluid">
              <div class="row">
                <div class="col-4">
                  <div class=" text-center  p-1 m-1">
                    <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/50/50/people" alt="meme"></a>
                    
                  </div>
                </div>
                
                <div class="col-4">
                  <div class=" text-center  p-1 m-1">
                    <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/50/50/people" alt="meme"></a>
                    
                  </div>
                </div>
                
                
                <div class="col-4">
                  <div class=" text-center  p-1 m-1 ">
                    <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/50/50/people" alt="meme"></a>
                    
                  </div>
                </div>
                
                
                <div class="col-4">
                  <div class=" text-center  p-1 m-1">
                    <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/50/50/people" alt="meme"></a>
                    
                  </div>
                </div>
                
                <div class="col-4">
                  <div class=" text-center  p-1 m-1">
                    <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/50/50/people" alt="meme"></a>
                    
                  </div>
                </div>
                
                
                <div class="col-4">
                  <div class=" text-center  p-1 m-1">
                    <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/50/50/people" alt="meme"></a>
                    
                  </div>
                </div>
              </div>
              
            </div>
          </section>
          
          
        </aside>
      </div>
      
      <div class="col-12 mt-3 d-mb-none d-lg-none d-xl-none">
        <p>
          <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Info usuario
          </a>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <aside >
              <section class="informacion_usuario   p-3 mt-3 mb-3">
                <h3 class="color-verde">Acerca del usuario</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quis excepturi, cum veritatis delectus inventore, deserunt aliquam ea repellat quam reprehenderit, saepe possimus dignissimos fuga animi recusandae. Esse, earum ullam!</p>
                <div class="trofeos">
                  <div>  
                    <!--Tarjeta para trofeos ganados -->
                    <div class="container-fluid mb-3" >
                      <div class="row no-gutters">
                        <div class="col-md-4 col-4">
                          <img src="img/trofeo_perfil.png" class="card-img p-3" alt="...">
                        </div>
                        <div class="col-md-8 col-8">
                          <div class="card-body">
                            <h5 class="card-title">Chally destacado</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Fin tarjeta para trofeos ganados-->
                    
                    <!--Tarjeta para trofeos ganados -->
                    <div class="container-fluid mb-3" >
                      <div class="row no-gutters">
                        <div class="col-md-4 col-4">
                          <img src="img/trofeo_perfil.png" class="card-img p-3" alt="...">
                        </div>
                        <div class="col-md-8 col-8">
                          <div class="card-body">
                            <h5 class="card-title">Chally destacado</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Fin tarjeta para trofeos ganados-->
                    <!--Tarjeta para trofeos ganados -->
                    <div class="container-fluid mb-3" >
                      <div class="row no-gutters">
                        <div class="col-md-4 col-4">
                          <img src="img/trofeo_perfil.png" class="card-img p-3" alt="...">
                        </div>
                        <div class="col-md-8 col-8">
                          <div class="card-body">
                            <h5 class="card-title">Chally destacado</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Fin tarjeta para trofeos ganados-->
                  </div>
                </div>
              </section>
              
              <section class="p-3 mt-3 mb-3">
                <h4 class="color-verde text-center">Lista de amigos</h4>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-6 col-sm-6">
                      <div class=" text-center  p-1 m-1">
                        <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                        
                      </div>
                    </div>
                    
                    <div class="col-6 col-sm-6">
                      <div class=" text-center  p-1 m-1">
                        <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                        
                      </div>
                    </div>
                    
                    
                    <div class="col-6 col-sm-6">
                      <div class=" text-center  p-1 m-1 ">
                        <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                        
                      </div>
                    </div>
                    
                    
                    <div class="col-6 col-sm-6">
                      <div class=" text-center  p-1 m-1">
                        <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                        
                      </div>
                    </div>
                    
                    <div class="col-6 col-sm-6">
                      <div class=" text-center  p-1 m-1">
                        <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                        
                      </div>
                    </div>
                    
                    
                    <div class="col-6 col-sm-6">
                      <div class=" text-center  p-1 m-1">
                        <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                        
                      </div>
                    </div>
                  </div>
                  
                </div>
              </section>
              
              
            </aside>
          </div>
        </div>
        
      </div>
      
      
      <div class="col-12 d-flex col-mb-8 col-lg-8 mt-3">
      <?php foreach($desafios as $desafio){?>
                <div class="row">
                    <div class="col-12">

                        
                        <div class="card mb-5">

                            <div class="card-header posteo d-flex align-items-center">
                                <img class="rounded-circle" src="avatars/<?=$desafio['avatar']?>" alt="Foto de Usuario">
                                <p class="mb-0 ml-3"><?=$desafio['username']?>&nbsp;<span class="text-secondary texto-chico">Comenzó el <?=$desafio['fecha_creacion']?> / Finaliza el <?=$desafio['fecha_limite']?></span></p>    
                                
                            </div>

                            <div class="card-contenido">
                                <div class="row">


                                    <div class="row card-content-attached">
                                        <div class="col-12 col-md-4">
                                            <img src="img_post/<?=$desafio['imagen']?>" class="img-fluid" alt="Desafío Viajes Espaciales">
                                        </div>

                                        <div class="col-12 col-md-8">
                                            <h3 class="ml-0"><?=$desafio['nombre']?></h3>

                                            <div class="metadata d-flex ">
                                                <span class="dificultad">Dificultad: <?php for ($i = 0 ; $i < $desafio['dificultad'] ; $i++){ echo "<img src='img/logo_c.svg' alt=''>"; }?>  <?php for ($i = $desafio['dificultad'] ; $i < 5 ; $i++){ echo "<img src='img/logo_c_gris.svg' alt=''>"; }?>  
                                                <span class="participantes"><i class="fas fa-user"></i>&nbsp; 18 Participantes</span>

                                            </div>
                                            <br>
                                            <h4>Descripcion:</h4>
                                            <p><?=$desafio['descripcion']?></p>
                                            <h4>Requisitos</h4>
                                            <p><?=$desafio['requisitos']?></p>
                                            <a href="#" class="btn btn-secondary">Abrir desafío</a>
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
                        
                        <?php }?>

 
          
        
      
      <div class="col-2 d-none d-mb-flex d-lg-flex d-xl-flex d-sm-none col-sm-2 col-md-1 col-lg-1 col-xl-1">
        <div class="text-center">
          <div class="dropdown d-flex mt-3">
            <button class="btn btn-secondary dropdown-toggle ml-auto " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Todos
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Creados</a>
              <a class="dropdown-item" href="#">Resueltos</a>
              <a class="dropdown-item" href="#">Todos</a>
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