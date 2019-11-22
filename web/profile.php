<!DOCTYPE html>
<html lang="en">
<?php
$title="Inicio";
include("include/head.php");
?>

<body class="perfil">
  <?php include('include/header.php');?>
  
  <!--Seccion PORTADA -->
  
  <header class="profile">
    <div class="container-fluid">
      <!--<div class="row">-->
        <!--<div class="col-12">-->
          <div class="text-white info_profile text-center pt-5 pb-5">
            <img class="img-thumbnail rounded-circle" src="img/head_profile.png" alt="head_profile">        
            <h1>Franco Fourmantin</h1>
            <h2>@Franklinss</h2>
            <h3>challys solved:123</h3>
            <h3>challys created:123</h3>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!--Fin Seccion PORTADA -->
  
  
  <!--Seccion Posteos -->
  
  <div class="container ">
    <div class="row">
      <div class="col-3">
        
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
            <h4 class="color-verde">Lista de amigos</h4>
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
      
      <div class="col-9">
        
        <div class="seccion-derecha my-3">
          <!--Menu para elegir vista de posteos-->
          <div class="dropdown d-flex mb-3">
            <button class="btn btn-secondary dropdown-toggle ml-auto " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Todos
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Creados</a>
              <a class="dropdown-item" href="#">Resueltos</a>
              <a class="dropdown-item" href="#">Todos</a>
              
            </div>
          </div>
          <!--Fin menu para elegir vista de posteos-->
          
          <?php include('include/chally.php');?>
          <?php include('include/chally.php');?>
          <?php include('include/chally.php');?>
        </div>
      </div>




    </div>
  </div>
  
  
  
  <!--Fin seccion Posteos-->
  
  
</body>
</html>