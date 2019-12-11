<?php 
require_once("funciones.php");

session_start();
//SI EXISTE LA COOKIE, LA USA PARA CARGAR LA SESIÓN
if(isset($_COOKIE["email"])) {
    crearSesionConCookies();
}
//SI LA SESIÓN ESTÁ INICIADA NO SE PUEDE ACCEDER AL LOGIN
if(isset($_SESSION["email"])) {
    header("location:feed.php");
}

$email  = "";

//CHEQUEAMOS QUE EXISTA POST Y CONTENGA ALGO EN ELLA
if($_POST) {
    //ABRIMOS LA BASE DE DATOS PARA PODER VERIFICAR TODO
    $arrayDeUsuarios = abrirJson('usuarios.json');
    //LLAMAMOS A LA FUNCION DE VALIDAR PARA EL EMAIL
    $errores['email'] = validarLogin($_POST, $arrayDeUsuarios);
    //SI EL EMAIL ESTA CORRECTO DESPUES HACEMOS LO DEMAS
    if(empty($errores['email'])) {
        //PERSISTIMOS EL VALOR DEL CAMPO MAIL AHORA QUE SE ENCUENTRA VALIDADO
        $email = $_POST["email"];
        //BUSCAMOS EL USUARIO PARA PODER TRABAJAR CON SUS DATOS
        $indiceUsuario = buscarUsuario($arrayDeUsuarios,"email",$_POST["email"]);
        //VERIFICAMOS QUE LA CONTRASEÑA CORRESPONDA
        if(!password_verify($_POST['password'] , $arrayDeUsuarios[$indiceUsuario]['password'])){
            $errores['password'] = "Contraseña incorrecta";
        } else {

            //SI TODO ES CORRECTO SE LOGUEA AL USUARIO
            crearSesion($arrayDeUsuarios[$indiceUsuario]);
            //GUARDAMOS LA COOKIE SI EL USUARIO MARCO LA CASILLA RECORDAR
            if(isset($_POST['recordar'])){
                crearCookies();
            }
            //SE REDIRIGE AL USUARIO AL FEED
            header('location:feed.php');exit;
        }
    }
}


?>


<!DOCTYPE html>
<html>
    <?php
    $title="Chally - Participá en Desafíos Digitales y armá tu portfolio";
    include("include/head.php");
    ?>
    
<body class="animated fadeIn">
    <!-- <?php include("include/header.php");?> -->
    
    <div class="contenedor-principal-login">
        <div class="contenedor-form-login rounded shadow my-4">
            <form action="" method="post" id="form-login" name="form-login">
                <div class="contenedor-logo">
                    <a class="navbar-brand" href="index.php"><img src="img/logo_chally.svg" alt=""></a>
                </div>
                <h3>Iniciar sesión</h3>
                <input type="email" id="email" name="email" value="<?=$email?>" placeholder="Correo electrónico" required><br>
                <small><?=isset($errores['email']) ? $errores['email'] : ""?></small>
                <input type="password" id="pass" name="password" placeholder="Contraseña" required>
                <small><?=isset($errores['password']) ? $errores['password'] : ""?></small>
                <p id="error-ingreso" class="fuente-chica" name="error-ingreso"></p>
                <p id="checkbox-recordar"><input type="checkbox" name="recordar" id="recordar"><label for="recordar" class="fuente-chica">Recordarme</label></p>
                <input type="submit" id="boton-ingresar" value="Ingresar">
                <p id="olvido-password" class="fuente-chica"><a href="#" class="text-secondary">¿Olvidaste tu contraseña?</a></p>
                <p id="registrarse" class="fuente-chica"><a  href="registro.php" class="font-weight-bold d-inline-block" alt="Enlace a la página de registro">¿No tienes cuenta? Regístrate aquí.</a></p>
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