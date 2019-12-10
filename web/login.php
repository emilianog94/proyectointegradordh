<?php 
session_start();
require_once("funciones.php");


//CHEQUEAMOS QUE EXISTA POST Y CONTENGA ALGO EN ELLA
if($_POST){
    if(isset($_POST['email'])){
        //VERIFICAMOS QUE EL CAMPO NO ESTE VACIO
        if(empty($_POST['email']) == true){
            $errores['email']= "Este campo no puede estar vacio";
        //VERIFICAMOS QUE EL CAMPO SEA UN MAIL
        }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errores['email'] = "Este campo debe ser un mail";
        }else{
            //LUEGO DE LAS VERIFICACIONES ABRIMOS LA BASE DE DATOS PARA BUSCAR EL MAIL
            $arrayDeUsuarios = abrirJson('usuarios.json');

            foreach($arrayDeUsuarios as $usuarios){
                //BUSCAMOS EN EL MAIL EN LA BASE DE DATOS RECORRIENDO USUARIOS POR USUARIO

                if ($usuarios['email'] == $_POST['email']){ //SI ENCUENTRA UN USUARIO VA A REALIZAR EL PASSWORD VERIFY CON LO QUE SE MANDA POR POST
                    $flag_existe_mail= true; 
                    if(password_verify($_POST['password'] , $usuarios['password'])== true){
                        //SI SE ENCUENTRA USUARIO VAMOS A CHEQUEAR SI EL CAMPO RECORDAR USUARIO FUE TILDADO Y VAMOS A LEVANTAR UNA COOKIE PARA MANTENERLO LOGEADO
                        $_SESSION = $usuarios;
                        //pre($_SESSION);exit;
                        if(isset($_POST['recordar'])){
                            setcookie("recordar_usuario" , $_SESSION['id'] , time() + (60 * 60 * 24 * 30));
                        }
                        header('location:feed.php');exit;
                    }else{
                        $errores['password'] = "Contraseña incorrecta";
                    break;
                    }
                }else{
                    $flag_existe_mail = false;
                }
            }
            //Si llego a este punto es por que no existe el mail en la base de datos asi que lo vamos a mandar a register.php mediante un link
            if ($flag_existe_mail == false){
                $errores['no-email'] = "El mail no existe en la base de datos";
                $linkRegistro = "register.php";
            }
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
                <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
                <small><?=isset($errores['email']) ? $errores['email'] : ""?></small><br>
                <small><?=isset($errores['no-email']) ? $errores['no-email'] : ""?></small>
                <input type="password" id="pass" name="password" placeholder="Contraseña" required>
                <small><?=isset($errores['password']) ? $errores['password'] : ""?></small>
                <p id="error-ingreso" class="fuente-chica" name="error-ingreso"></p>
                <p id="checkbox-recordar"><input type="checkbox" name="recordar" id="recordar" checked><label for="recordar" class="fuente-chica">Recordarme</label></p>
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