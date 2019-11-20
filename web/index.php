<!DOCTYPE html>
<html>
    <?php
        $title="Inicio";
        include("include/head.php");
    ?>
<body>
    <?php include("include/header.php");?>
    <section id="fondo-home">
        <h1 id="titulo-home">
            Supera tus límites participando en la<br> primera red social de desafíos digitales
        </h1>
        <form id="form-home" action="" class="container">
            <img class="logo" src="img/logo_c.svg" alt="">
            <h5>¡Crea tu cuenta en un minuto!</h5>
            <div class="form-group">
                <label for="nombre">Nombre y Apellido</label>
                <input type="text" id="nombre" name="nombre"/>
            </div>
            <div class="form-group">
                <label for="email">Tu Mail</label>
                <input type="email" id="email" name="email"/>
            </div>
            <div class="form-group">
                <button id="boton-avanzar">Avanzar</button>
            </div>
        </form>
    </section>
    <section id="pasos">
        <div class="container">
            <h2 class="text-center mt-5">Chally es muy simple</h2>
            <div class="row">
                <div class="col-md-4">
                    <img class="imagen-paso" src="img/ico/search.png">
                    <h1>Paso 1</h1>
                    <p>Buscas desafios de tu área de interés ¡También podes crear tu propio desafio!</p>
                </div>
                <div class="col-md-4">
                    <img class="imagen-paso" src="img/ico/paper-plane.png">
                    <h1>Paso 2</h1>
                    <p>Participas enviando tu respuesta y competís con miles de challengers en todo el mundo</p>
                </div>
                <div class="col-md-4">
                    <img class="imagen-paso" src="img/ico/resume.png">
                    <h1>Paso 3</h1>
                    <p>Además de ejercitar el cerebro y compartir conocimiento, Chally arma tu portfolio profesional en base a tus respuestas</p>
                </div>
            </div>
        </div>
    </section>
    <section id="categorias">
        <div class="container col-md-8 m-auto">
            <h2 id="titulo-categorias" class="text-center">Tenemos desafíos para todos los gustos</h2>
            <div class="row">
                <div class="tarjeta col-md-4">
                    <img class="imagen-tarjeta" src="img/categoria-diseno.jpg" alt="">
                    <h5 class="titulo-tarjeta text-center">Diseño y Arte</h5>
                    <a class="ver-desafios" href="">Ver Desafíos Destacados</a>
                </div>
                <div class="tarjeta col-md-4">
                    <img class="imagen-tarjeta" src="img/categoria-programacion.jpg" alt="">
                    <h5 class="titulo-tarjeta text-center">Programación y Lógica</h5>
                    <a class="ver-desafios" href="">Ver Desafíos Destacados</a>
                </div>
                <div class="tarjeta col-md-4">
                    <img class="imagen-tarjeta" src="img/categoria-fotografia.jpg" alt="">
                    <h5 class="titulo-tarjeta text-center">Fotografía</h5>
                    <a class="ver-desafios" href="">Ver Desafíos Destacados</a>
                </div>
            </div>
        </div>
    </section>
    <section id="fondo-faq" class="d-flex justify-content-center align-items-center">
        <div id="ir-a-faq" class="d-flex flex-column justify-content-around align-items-center">
            <h5>¿Tenés alguna duda?</h5>
            <a class="ver-faqs" href="">Ver Preguntas Frecuentes</a>
        </div>
    </section>

    <?php include("include/footer.php");?>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>