<?php
session_start();
require('funciones.php');
$title = "Subir nuevo desafío";
include("include/head.php");
?>
<!DOCTYPE html>
<html lang="en">

<body class="animated fadeIn">

    <?php
    include("include/header-user.php");
    ?>
    <div class="bg-gris">


        <section class="container-fluid px-5">
            <div class="row d-flex align-items-center justify-content-center  flex-wrap">



                <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column my-3">
                    <h3 class="color-verde text-left mb-3 mx-0"><a href="feed.php"><i class="fas fa-arrow-left color-verde"></i></a> Nuevo Desafío</h3>
                    <form class="w-100 needs-validation" method="POST" action="" enctype="multipart/form-data">

                        <div class="form-row">

                            <div class="col-12  mb-0 mb-md-4 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="inputName">Nombre del Desafío</label>
                                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Diseñá un póster alternativo para la nueva película '1917' ">
                                    <small>¡Describilo lo mejor posible en menos de 60 caracteres!</small>
                                </div>


                                <div class="custom-file form-group my-3">
                                    <label class="custom-file-label" for="inputGroupFile01">Foto principal del desafío</label>
                                    <input type="file" id="inputGroupFile01" class="custom-file-input" name="foto-desafio" aria-describedby="inputGroupFileAddon01">
                                    <small>Foto cuadrada ilustrativa del desafío (Tamaño recomendado: 1000x1000px)</small>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="" class="font-weight-bold">Categorías del Desafío</label><br>
                                    <input type="checkbox" id="myCheckbox1" name="diseno_y_arte" />
                                    <label for="myCheckbox1">Diseño y Arte</label> <br>

                                    <input type="checkbox" id="myCheckbox2" name="fotografia" />
                                    <label for="myCheckbox2">Fotografía</label><br>

                                    <input type="checkbox" id="myCheckbox3" name="programacion_y_logica">
                                    <label for="myCheckbox3">Programación y Lógica</label> <br>
                                </div>

                                <div class="form-group">
                                    <label for="descripcion" class="font-weight-bold">Descripción del Desafío</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5"></textarea>
                                    <small>Describí el desafío lo mejor posible en pocas palabras</small>
                                </div>

                                <div class="form-group">
                                    <label for="requisitos" class="font-weight-bold">Requisitos del Desafío</label>
                                    <textarea class="form-control" name="requisitos" id="requisitos" rows="5"></textarea>
                                    <small>Colocá en formato lista todas las condiciones que creas necesarias para poder concretar el desafío (Reglas, Software, Formatos, etc)</small>
                                </div>


                                <div class="form-group mt-4">
                                    <label for="dificultad" class="font-weight-bold">Nivel de Dificultad</label>
                                    <select class="form-control" name="dificultad" id="dificultad">
                                        <option value="1">Muy fácil</option>
                                        <option value="2">Fácil</option>
                                        <option value="3">Intermedio</option>
                                        <option value="4">Difícil</option>
                                        <option value="5">Experto</option>
                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label class="font-weight-bold" for="fechaLimite">Fecha Límite de envío de respuestas</label>
                                    <input type="date" class="form-control" name="fechaLimite" id="fechaLimite" placeholder="">
                                    <small>¡El mínimo es de una semana!</small>
                                </div>




                            </div>









                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">
                                <!--
                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                -->
                                <div class="col-12 d-flex justify-content-between m-0 p-0">

                                    <button type="submit" class="btn btn-secondary">
                                        Publicar Desafío
                                    </button>
                                </div>


                            </div>
                    </form>
                </div>
            </div>

        </section>
        <?php
        include("include/footer.php");
        ?>
    </div>



</body>

</html>