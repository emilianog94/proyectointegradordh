<!DOCTYPE html>
<html lang="en">
<?php
$title="Inicio";
include("include/head.php");
?>

<body class="perfil">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <a class="navbar-brand" href="index.php"><img src="img/logo_chally.svg" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-user"></i> &nbsp; Log out / Configuracion</a>
            </li>
      
          </ul>
        </div>
      </nav>
  
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
                          <div class="col-6">
                            <div class=" text-center  p-1 m-1">
                              <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                              
                            </div>
                          </div>
                          
                          <div class="col-6">
                            <div class=" text-center  p-1 m-1">
                              <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                              
                            </div>
                          </div>
                          
                          
                          <div class="col-6">
                            <div class=" text-center  p-1 m-1 ">
                              <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                              
                            </div>
                          </div>
                          
                          
                          <div class="col-6">
                            <div class=" text-center  p-1 m-1">
                              <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                              
                            </div>
                          </div>
                          
                          <div class="col-6">
                            <div class=" text-center  p-1 m-1">
                              <a href="#" class="text-decoration-none "><img class =" rounded-circle"src="http://lorempixel.com/100/100/people" alt="meme"></a>
                              
                            </div>
                          </div>
                          
                          
                          <div class="col-6">
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


      <div class="col-12 d-flex col-mb-8 col-lg-8">
        <div class="seccion-derecha my-3">     
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4 my-3 ">
                <img src="img/image_photo.jpg" class="imagen_chally h-100 img-fluid px-3" alt="...">
              </div>
              
              <div class="col-md-8">
                <div>
                  <div class="card-body">
                    <div class="boton_opciones">
                      
                      <div class="dropdown d-flex ">
                        <div>
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                        </div>
                        <button class="btn  ml-auto " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          ...
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Ver desafio</a>
                          <a class="dropdown-item" href="#">Ver respuestas</a>
                        </div>
                      </div>
                      
                    </div>
                    <h5 class="card-title color-verde ">Titulo del chally</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ad, impedit libero, maxime quidem atque id minus magnam omnis iusto consequatur nisi? Repudiandae laboriosam voluptate explicabo corrupti, eum mollitia at.</p>
                    <p class="card-text"><small class="text-muted">Solved</small></p>
                    <a href="#" class="btn btn-secondary">Partcipar</a>
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
          </div>
          
          
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4 my-3 ">
                <img src="img/image_story2.jpg" class="imagen_chally h-100 img-fluid px-3" alt="...">
              </div>
              
              <div class="col-md-8">
                
                
                <div>
                  <div class="card-body">
                    <div class="boton_opciones">
                      
                      <div class="dropdown d-flex ">
                        <div>
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c_gris.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c_gris.svg" alt="..." width="18px" height="18px">
                          
                        </div>
                        <button class="btn  ml-auto " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          ...
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Ver desafio</a>
                          <a class="dropdown-item" href="#">Ver respuestas</a>
                        </div>
                      </div>
                      
                    </div>
                    <h5 class="card-title color-verde ">Titulo del chally</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ad, impedit libero, maxime quidem atque id minus magnam omnis iusto consequatur nisi? Repudiandae laboriosam voluptate explicabo corrupti, eum mollitia at.</p>
                    <p class="card-text"><small class="text-muted">Solved</small></p>
                    <a href="#" class="btn btn-secondary">Partcipar</a>


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
          </div>
          
          
          
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4 my-3 ">
                <img src="img/image_mode.jpg" class="imagen_chally h-100 img-fluid px-3" alt="...">
              </div>
              
              <div class="col-md-8">
                
                
                <div>
                  <div class="card-body">
                    <div class="boton_opciones">
                      
                      <div class="dropdown d-flex ">
                        <div>
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c.svg" alt="..." width="18px" height="18px">
                          <img src="img/logo_c_gris.svg" alt="..." width="18px" height="18px">
                          
                        </div>
                        <button class="btn  ml-auto " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          ...
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Ver desafio</a>
                          <a class="dropdown-item" href="#">Ver respuestas</a>
                        </div>
                      </div>
                      
                    </div>
                    <h5 class="card-title color-verde ">Titulo del chally</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ad, impedit libero, maxime quidem atque id minus magnam omnis iusto consequatur nisi? Repudiandae laboriosam voluptate explicabo corrupti, eum mollitia at.</p>
                    <p class="card-text"><small class="text-muted">Solved</small></p>
                    <a href="#" class="btn btn-secondary">Partcipar</a>

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
          </div>

        </div>
      </div>
      
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
  
  
</body>
</html>