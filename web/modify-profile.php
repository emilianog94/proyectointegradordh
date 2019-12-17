<?php
session_start();
require('funciones.php');
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
            if(isset($_POST['name'])){
                modificarJson($_POST['name'], "name" , $_SESSION['name'] , $_SESSION['id']);
            }

            if(isset($_POST['lastname'])){
                modificarJson($_POST['lastname'] , "lastname" , $_SESSION['lastname'] , $_SESSION['id']);
            }

            if(isset($_POST['email'])){
                modificarJson($_POST['email'] , "email" , $_SESSION['email'] , $_SESSION['id']);
            }

            if(isset($_POST['password'])){
                if(!empty($_POST['password'])){
                    $usuario = buscarUsuario("id" , $_SESSION['id']);
                    modificarJson($_POST['password'] , "password" , $usuario['password'] , $_SESSION['id']);
                }
            }
            if(isset($_POST['diseno_y_logica']) || isset($_POST['fotografia']) || isset($_POST['programacion_y_logica'])){
                $intereses = arrayIntereses($_POST);
                modificarJson($intereses , 'intereses' , $_SESSION['intereses'] , $_SESSION['id']);
            }

            if(isset($_FILES['avatar'])){
                if($_FILES["avatar"]["error"] != 4) {
                    $nombreImagen = guardarAvatar();
                    modificarJson($nombreImagen , 'avatar' , $_SESSION['avatar'] , $_SESSION['id']); 
                    }
            }
            
        }

        $_SESSION = buscarUsuario("id" , $_SESSION['id']);

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


                        <div class="text-center">
                            <div class="mini-contenedor-foto">
                                <img class="main-foto" src="avatars/<?=$_SESSION['avatar'];?>" alt="">
                            </div>
                        </div>

                    
                        <div class="custom-file my-3">
                             <input type="file" id="inputGroupFile01" class="custom-file-input" name="avatar" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Cambiar imagen de perfil</label>
                            <small><?=isset($errores['avatar']) ? $errores['avatar']: ""?></small>
                        </div>


                        


                            <div class="form-row">
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu nombre</label>
                                        <input type="text" class="form-control" name="name" id="inputName" value="<?=$_SESSION['name'];?>" >
                                        <small><?=isset($errores['name']) ? $errores['name']: ""?></small>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu Apellido</label>
                                        <input type="text" class="form-control" name="lastname" id="inputName" value="<?=$_SESSION['lastname'];?>">
                                        <small><?=isset($errores['lastname']) ? $errores['lastname']: ""?></small>
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
                                        <input type="email" class="form-control" name="email" id="inputMail" value="<?=$_SESSION['email'];?>">
                                        <small><?=isset($errores['email']) ? $errores['email']: ""?></small>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6   mb-0 mb-md-4">
                                    <div class="form-group">
                                        <label for="inputMail">Confirmacion mail</label>
                                        <input type="email" class="form-control" name="confirm-email" value="<?=$_SESSION['email'];?>" id="inputMail" >
                                        <small><?=isset($errores['confirm-email']) ? $errores['confirm-email']: ""?></small>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">

                                    <!-- DEBERIA HACER UNA FUNCION APARTE PARA LA CONTRASEÑA Y QUE SEA OPCIONAL; ES DECIR QUE SI ESTA VACIO NO PASE NADA -->
                                        <label for="inputPassword">Contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control" name="password" id="inputPassword">
                                        <small><?=isset($errores['password']) ? $errores['password']: ""?></small>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Confirma contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control" name="confirm-password" id="inputPassword">
                                        <small><?=isset($errores['confirm-password']) ? $errores['confirm-password']: ""?></small>
                                    </div>
                                </div>

                                <div class="col-12 mb-0 mb-md-4 ">
                                    <div class="form-group">
                                                    <label for="" class="font-weight-bold">Lista de Intereses</label><br>
                                                    <input type="checkbox" id="myCheckbox1" name="diseno_y_arte" <?=($_SESSION['intereses']['diseno_y_arte'] == true) ? "checked" : "" ?>/>
                                                    <label for="myCheckbox1">Diseño y Arte</label> <br>
                                                    
                                                    <input type="checkbox" id="myCheckbox2" name="fotografia" <?=($_SESSION['intereses']['fotografia'] == true) ? "checked" : "" ?> />
                                                    <label for="myCheckbox2">Fotografía</label><br>
                                                    
                                                    <input type="checkbox" id="myCheckbox3" name="programacion_y_logica" <?=($_SESSION['intereses']['programacion_y_logica'] == true) ? "checked" : "" ?>>
                                                    <label for="myCheckbox3">Programación y Lógica</label> <br>
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

                                            <button type="submit" class="btn btn-secondary">
                                            Modificar datos
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