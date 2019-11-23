<!DOCTYPE html>
<html>
    <?php
    $title="Chally - Participá en Desafíos Digitales y armá tu portfolio";
    include("include/head.php");
    ?>
    
<body>
    <!-- <?php include("include/header.php");?> -->
    
    <div class="contenedor-principal-login">
        <div class="contenedor-form-login">
            <form action="" method="post" id="form-login" name="form-login">
                <div class="contenedor-logo">
                    <a class="navbar-brand" href="index.php"><img src="img/logo_chally.svg" alt=""></a>
                </div>
                <h3>Iniciar sesión</h3>
                <input type="mail" id="mail" name="mail" placeholder="Correo electrónico" required>
                <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
                <p id="error-ingreso" class="fuente-chica" name="error-ingreso"></p>
                <p id="checkbox-recordar"><input type="checkbox" name="recordar" id="recordar" checked><label for="recordar" class="fuente-chica">Recordarme</label></p>
                <input type="submit" id="boton-ingresar" value="Ingresar">
                <p id="olvido-password" class="fuente-chica"><a href="#">¿Olvidaste tu contraseña?</a></p>
                <p id="registrarse" class="fuente-chica"><a  href="registro.php" alt="Enlace a la página de registro">¿No tienes cuenta? Regístrate aquí.</a></p>
            </form>
        </div>
    </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>