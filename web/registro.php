<?php


require('funciones.php');

if($_POST){
    $errores = [];

if (isset($_POST)){

    $errores = validar($_POST);

    if(!$errores) {
        // llamo a la función guardarUsuario() --> me devuelve un array asociativo con los datos que envió el usuario
        $usuario = guardarUsuario($_POST);
        
        // llamo a la función guardarAvatar() --> guarda la imagen y devuelve le nombre con el que guardé la imagen
        $nombreImagen = guardarAvatar();
        
        // al array asocativo del nuevo usuario, le creo la posición "avatar" para guardar el nombre de la imagen que subió el usuario
        $usuario['avatar'] = $nombreImagen;
        
        // me traigo el contenido del archivo usuarios.json
        $listaDeUsuarios = file_get_contents('usuarios.json');
        
        // convierto ese contenido a formato array para poder manipular los datos
        $arrayUsuarios = json_decode($listaDeUsuarios, true);
        
        // en la última posicón del array de usuarios me guardo al nuevo usuario
        $arrayUsuarios[] = $usuario;
        
        // convierto el aray de usuarios a formato json para volver a guardarlo en el archivo de usuarios
        $todosLosUsuarios = json_encode($arrayUsuarios);
        
        // guardo el json completo de ususarios en usuarios.json 
        file_put_contents('usuarios.json', $todosLosUsuarios);

        }
    }
}
    
    
    ?>
    
    
    
    
    
    
    <!DOCTYPE html>
    <html lang="en">

    <?php
    $title="Registro";
    include("include/head.php");
    ?>
    
    <body class="animated fadeIn">
        <div class="contenedor-registro">
            
            <section class="container-fluid px-5">
                <div class="row d-flex align-items-center justify-content-center vh-100 flex-wrap">
                    
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column align-items-center my-5">
                        <a href="index.php"><img  src="img/logo_c.svg" class="logo" alt=""></a>
                        <h3 class="color-verde text-center mb-5 ">Registro</h3>
                        <form class="w-100 needs-validation" method="POST" action="registro.php" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu nombre</label>
                                        <input type="text" class="form-control" name="name" required value="<?=persistenciaRegistro("name")?>">
                                        
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu Apellido</label>
                                        <input type="text" class="form-control" name="lastname" value="<?=persistenciaRegistro('lastname')?>" required>
                                       
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Nombre de usuario</label>
                                        <input type="text" class="form-control" name="username" value="<?=persistenciaRegistro('username')?>" required>
                                        <small><?=mostrarErrores('username')?></small>
                                      
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputMail">Tu mail</label>
                                        <input type="email" class="form-control " name="email" value="<?=persistenciaRegistro('email')?>" required>
                                        </div>
                                        <small><?=mostrarErrores('email')?></small>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6   mb-0 mb-md-4">
                                    <div class="form-group">
                                        <label for="inputMail">Confirmacion mail</label>
                                        <input type="email" class="form-control " name="validacion_email"  required>
                                        </div>
                                        <small ><?=mostrarErrores('validacion_email')?></small>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control " name="password" required>
                                        <small><?=mostrarErrores('password')?></small>
                                        </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Confirma contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control is-valid" name="confirm-password" required>
                                        <small> <?=mostrarErrores('confirm-password')?></small>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputFechaNac">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" name="birth" placeholder="Date of Birth" value="<?=persistenciaRegistro('birth')?>"required>
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4">
                                    <label for="">Sexo</label>
                                    <select class="custom-select" name="sex" value="<?=persistenciaRegistro('sex')?>" >
                                        <option selected>Seleccionar</option>
                                        <option value="h">Hombre</option>
                                        <option value="m">Mujer</option>
                                    </select>
                                    <small ><?=mostrarErrores('sex')?></small>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ingrese imagen de perfil</label>
                                    <input type="file" class="form-control-file" name="avatar">
                                    <small><?=mostrarErrores('avatar')?></small>
               
                                </div>
                                
                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-9 mb-0 mb-md-4 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="tyc_check" >
                                        <label class="form-check-label"  for="invalidCheck">
                                            Acepto los <a href="#" class="subrayado">términos y condiciones</a> y la <a href="#" class="subrayado">política de privacidad</a>.
                                        </label>
                                        <small ><?=mostrarErrores('tyc_check')?></small>
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 ">
                                    <!--
                                        <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                    -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                                        Registrarme
                                    </button>
                                    
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content text-center">
                                                <div class="modal-header">
                                                    <h5 class="modal-title d-block color-verde w-100" id="exampleModalLabel">¡Ya casi estamos!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Elegí tus áreas favoritas para personalizar tu experiencia y ofrecerte desafíos acordes a tus intereses regularmente.
                                                    
                                                    <div class="seleccion-intereses d-flex flex-column flex-md-row">
                                                        
                                                        <input type="checkbox" id="myCheckbox1" name="intereses"  value="diseno_y_arte" />
                                                        <label for="myCheckbox1">
                                                            <img src="img/categoria-diseno.jpg"><p class="mt-2">Diseño y Arte</p>
                                                        </label>
                                                        
                                                        <input type="checkbox" id="myCheckbox2" value="fotografía" name="intereses"  />
                                                        <label for="myCheckbox2">
                                                            <img src="img/categoria-fotografia.jpg"><p class="mt-2">Fotografía</p>
                                                        </label>
                                                        
                                                        <input type="checkbox" id="myCheckbox3" name="intereses" value="opcion_programación_y_lógica" />
                                                        <label for="myCheckbox3">
                                                            <img src="img/categoria-programacion.jpg"><p class="mt-2">Programación y Lógica</p>
                                                        </label>
                                                        <small ><?=mostrarErrores('intereses')?></small>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer mt-5">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Volver atrás</button>
                                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarme</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>  
                            </form> 
                        </div>               
                    </div>
                </div>
    </body>
</html>     