<!DOCTYPE html>
<html lang="en">
<?php
$title="Inicio";
include("include/head.php");
?>

<body class="animated fadeIn">
    <?php include('include/header.php');?>
    <section class="container-fluid px-5 hero">
        <div class="row d-flex align-items-center vh-100 flex-nowrap">
            <div class="col-12 col-md-9">
                <h1 class="text-white display-4">Superá tus límites participando en la primera red social de desafíos digitales</h1>
            </div>

            <div class="col-12 col-md-3 shadow hero-form p-5 d-flex flex-column align-items-center">
                <img class="mb-4" src="img/logo_c.svg" alt="">
                <h3 class="color-verde text-center mb-4">¡Creá tu cuenta ahora!</h3>
                <form class="w-100">

                <div class="form-group">
                    <label for="inputName">Tu nombre y Apellido</label>
                    <input type="text" class="form-control" id="inputName">
                </div>

                <div class="form-group">
                    <label for="inputMail">Tu mail</label>
                    <input type="email" class="form-control" id="inputMail" >
                </div>


                <a class="btn btn-secondary w-100" href="#" role="button">Avanzar</a>
                </form>                
            </div>

            <div class="col-3 position-absolute">
                <img src="" alt="">
                <p>@mark78 - Diseñador Web</p>
            </div>

        </div> <!-- CIERRE DE ROW HERO -->
    </section> <!-- CIERRE DEL HERO -->

    <section class="container pasos my-5">
        <div class="row">
            <div class="col-12 ">
                <h2 class="color-verde font-weight-bold text-center">Chally es muy simple.</h2>
            </div>

            <div class="col-4 text-center">
                <img class="my-5" src="img/ico/search.png" alt="">
                <p class="color-verde font-weight-bold mb-0">Paso 1</p>
                <p>Buscás desafíos de tu área de interés. ¡También podés crear tu propio desafío!</p>
            </div>

            <div class="col-4 text-center">
                <img class="my-5" src="img/ico/paper-plane.png" alt="">
                <p class="color-verde font-weight-bold mb-0">Paso 2</p>
                <p>Participás enviando tu respuesta y competís con miles de challengers en todo el mundo</p>
            </div>

            <div class="col-4 text-center">
                <img class="my-5" src="img/ico/resume.png" alt="">
                <p class="color-verde font-weight-bold mb-0">Paso 1</p>
                <p>Además de ejercitar el cerebro y compartir conocimiento, Chally arma tu portfolio profesional en base a tus respuestas.</p>
            </div>

        
        </div>
    </section> <!-- CIERRE SECCION ACERCA DE CHALLY STEPS -->

    <section class="container-fluid categorias">
        <div class="row">
            <div class="col-12 text-center pt-5 ">
                <h2 class="text-white font-weight-bold">Tenemos desafíos para todos los gustos.</h2>
            </div>
        </div>
                <div class="row">
                    <div class="container">
                    <div class="col-12 text-center">
                                <div id="carouselExampleControls" class="carousel slide"  data-ride="carousel"> <!-- data-ride="carousel" Para activar Autoplay -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/categoria-diseno.jpg" alt="">
                                                        <h3 class="pt-3 font-weight-bold">Diseño y Arte</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>

                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/categoria-programacion.jpg" alt="">
                                                        <h3 class="pt-3 font-weight-bold">Programación y Lógica</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>

                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/categoria-fotografia.jpg" alt="">
                                                        <h3 class="pt-3 font-weight-bold">Fotografía</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/categoria-diseno.jpg" alt="">
                                                        <h3 class="pt-3 font-weight-bold">Diseño y Arte</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>

                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/categoria-programacion.jpg" alt="">
                                                        <h3 class="pt-3 font-weight-bold">Programación y Lógica</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>

                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/categoria-fotografia.jpg" alt="">
                                                        <h3 class="pt-3 font-weight-bold">Fotografía</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>  <!-- CIERRE CARRUSEL -->            
                            </div>    
                    </div>
                </div>

            
    </section>  <!-- CIERRE CONTENEDOR SECCION CATEGORIAS -->  

    <section class="container destacados my-5 pt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="color-verde">Challys destacados de la Semana</h2>
            </div>

            <div class="col-3">
            <img src="" alt="Foto de Desafío">
                <p>Ejemplo de desafío que por el momento no se me ocurre </p>
                <p class="text-secondary">¡985 challengers participando!</p>
            </div>

            <div class="col-3">
            <img src="" alt="Foto de Desafío">
                <p>Ejemplo de desafío que por el momento no se me ocurre </p>
                <p class="text-secondary">¡985 challengers participando!</p>
            </div>

            <div class="col-3">
            <img src="" alt="Foto de Desafío">
                <p>Ejemplo de desafío que por el momento no se me ocurre </p>
                <p class="text-secondary">¡985 challengers participando!</p>
            </div>

            <div class="col-3">
            <img src="" alt="Foto de Desafío">
                <p>Ejemplo de desafío que por el momento no se me ocurre </p>
                <p class="text-secondary">¡985 challengers participando!</p>
            </div>

            <div class="col-12 mt-5">
                <h2 class="color-verde">Challengers Destacados del Mes</h2>
            </div>

            <div class="col-3 text-center">
                <img src="" alt="Foto de Usuario">
                <p>Nombre y Apellido <br> @username</p>
                <a class="btn btn-secondary" href="#">Seguir</a>
            </div>

            <div class="col-3 text-center">
            <img src="" alt="Foto de Usuario">
                <p>Nombre y Apellido <br> @username</p>
                <a class="btn btn-secondary" href="#">Seguir</a>
            </div>

            <div class="col-3 text-center">
            <img src="" alt="Foto de Usuario">
                <p>Nombre y Apellido <br> @username</p>
                <a class="btn btn-secondary" href="#">Seguir</a>
            </div>

            <div class="col-3 text-center ">
            <img src="" alt="Foto de Usuario">
                <p>Nombre y Apellido <br> @username</p>
                <a class="btn btn-secondary" href="#">Seguir</a>
            </div>


        </div>
    </section> <!-- CIERRE SECCION DE DESTACADOS -->


    <section class="container-fluid faq vh-100">
        <div class="row vh-100 justify-content-end align-items-center px-5">
            <div class="col-4">
            <h3 class="text-white">Algunas preguntas frecuentes</h3>    
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Qué tipos de desafíos existen?
                                </button>
                            </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Participar es gratis?
                                </button>
                            </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Cómo se decide quién ganó el desafío?
                                </button>
                            </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-secondary mt-3 w-100" href="#">Ver más </a>
            </div>
        </div>
    </section> <!-- CIERRE SECCION PREGUNTAS -->

    <?php include("include/footer.php");?>

</body>


</html>