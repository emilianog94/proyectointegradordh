<?php
session_start();
include_once('funciones.php');
/*$_SESSION['email']="eg@gmail.com";

$listaDeUsuarios = file_get_contents('jsonPrueba.json');
$arrayUsuarios = json_decode($listaDeUsuarios, true);

function verificarUsuario ($array){

    foreach ($array as $usuario){
        if ($usuario['email'] == $_SESSION['email']){
          return $usuario;
        }
}
}


$usuario = verificarUsuario($arrayUsuarios);

*/


if($_POST){
    $errores = [];
    if (isset($_POST)){
        $errores = validarModificacion($_POST);

        if(!$errores) {
            $modificacion = guardarModificacion($_POST);
            
            $listaDeUsuarios = file_get_contents('usuarios.json');
            
            $arrayUsuarios = json_decode($listaDeUsuarios, true);

            $arrayUsuarios[$_SESSION['id']] = $modificacion;

            $todosLosUsuarios = json_encode($arrayUsuarios);

            file_put_contents('usuarios.json', $todosLosUsuarios);
            crearSesion($modificacion);

            pre($_SESSION);

        }

    }

}

$title="Modificar Perfil";
include("include/head.php");
?>
<!DOCTYPE html>
<html lang="en">

<body class="animated fadeIn">

<?php
include("include/header-user.php");
?>
    <div class="contenedor-registro">

        
        <section class="container-fluid px-5">
            <div class="row d-flex align-items-center  flex-wrap">
                
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column my-3">
                        <h3 class="color-verde text-left mb-3 mx-0"><a href="feed.php"><i class="fas fa-arrow-left color-verde"></i></a>  Tu perfil</h3>
                        <form class="w-100 needs-validation" method="POST" action="modify-profile.php" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu nombre</label>
                                        <input type="text" class="form-control" name="name" id="inputName" value="<?=$_SESSION['name'];?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu Apellido</label>
                                        <input type="text" class="form-control" name="lastname" id="inputName" value="<?=$_SESSION['lastname'];?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Nombre de usuario</label>
                                        <input type="text" class="form-control" name="username" id="inputName" data-toggle="tooltip" data-placement="top" title="Test" value="<?=$_SESSION['username'];?>"  disabled> 
                                        <small class="text-muted">Este dato no se puede modificar</small>

                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputMail">Tu mail</label>
                                        <input type="email" class="form-control" name="email" id="inputMail" value="<?=$_SESSION['email'];?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6   mb-0 mb-md-4">
                                    <div class="form-group">
                                        <label for="inputMail">Confirmacion mail</label>
                                        <input type="email" class="form-control" name="cemail" value="<?=$_SESSION['email'];?>" id="inputMail" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">

                                    <!-- DEBERIA HACER UNA FUNCION APARTE PARA LA CONTRASEÑA Y QUE SEA OPCIONAL; ES DECIR QUE SI ESTA VACIO NO PASE NADA -->
                                        <label for="inputPassword">Nueva contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control" name="password" id="inputPassword" >
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Confirmar nueva contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control" name="confirm-password" id="inputPassword" >
                                    </div>
                                </div>


                                <div class="col-3  mb-0 mb-md-4 ">
                                    <img class="img-fluid" src="avatars/<?=$_SESSION['avatar'];?>" alt="">

                                </div>    

                                <div class="col-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="exampleFormControlFile1">Cambiar avatar</label>
                                        <input type="file" class="form-control-file" name="avatar">
                                    </div>
                                </div>    

   




                                <div class="col-12  mb-0 mb-md-4 ">                
                                    <div class="form-group">
                                                            <p class="font-weight-bold mb-0">Lista de Intereses</p>
                                                            <input type="checkbox" id="myCheckbox1" name="diseno_y_arte" <?php if($_SESSION['intereses']['diseno_y_arte']) { echo "checked";}?>  />
                                                            <label class="pb-0 mb-0" for="myCheckbox1">
                                                               <p class="pb-0 mb-0">Diseño y Arte</p>
                                                            </label>
                                                            <br>
                                                            
                                                            <input type="checkbox" id="myCheckbox2"  name="fotografia" <?php if($_SESSION['intereses']['fotografia']) { echo "checked";}?>  />
                                                            <label class="pb-0 mb-0" for="myCheckbox2">
                                                               <p class="pb-0 mb-0">Fotografía</p>
                                                            </label>
                                                            <br>

                                                            <input type="checkbox" id="myCheckbox3" name="programacion_y_logica" <?php if($_SESSION['intereses']['programacion_y_logica']) { echo "checked";}?> />
                                                            <label class="pb-0 mb-0" for="myCheckbox3">
                                                                <p class="pb-0 mb-0">Programación y Lógica</p>
                                                            </label>
                                                            <br>
                                    </div>
                                </div>    

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputFechaNac">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="inputFechaNac" name="birth" value="<?=$_SESSION['birth'];?>" placeholder="Date of Birth" required disabled>
                                        <small class="text-muted">Este dato no se puede modificar</small>

                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4">
                                    <label for="">Sexo</label>
                                    <select class="custom-select" disabled>
                                    <option selected value=""><?=$_SESSION['sex'];?></option>
                                    </select>
                                    <small class="text-muted">Este dato no se puede modificar</small>
        
                                </div>                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">
                                <!--
                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                -->
                                        <div class="col-12 d-flex justify-content-between m-0 p-0">
                                            <a href="feed.php" class="btn btn-warning" style="font-size:0.75em;"><i class="fas fa-times"></i>&nbsp; Descartar cambios</a>
                                            <button class="btn btn-secondary float-right     mt-1" type="submit">Guardar datos</button>


                                        </div>
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
    
                                                    <input type="checkbox" id="myCheckbox1" value="Diseño y Arte" />
                                                    <label for="myCheckbox1">
                                                    <img src="img/categoria-diseno.jpg"><p class="mt-2">Diseño y Arte</p>
                                                    </label>
                                                    
                                                    <input type="checkbox" id="myCheckbox2" value="Fotografía" />
                                                    <label for="myCheckbox2">
                                                    <img src="img/categoria-fotografia.jpg"><p class="mt-2">Fotografía</p>
                                                    </label>
                                                    
                                                    <input type="checkbox" id="myCheckbox3" value="Programación y Lógica" />
                                                    <label for="myCheckbox3">
                                                    <img src="img/categoria-programacion.jpg"><p class="mt-2">Programación y Lógica</p>
                                                    </label>

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



                        </section>
                        <?php
include("include/footer.php");
?>                    
                    </div>



                </body>