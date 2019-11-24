<!DOCTYPE html>
<html lang="en">
<?php
$title="Registro";
include("include/head.php");
?>


<body class="animated fadeIn">
    <div class="contenedor-registro">
        
        <section class="container-fluid px-5">
            <div class="row d-flex align-items-center vh-100 flex-wrap">
                
                <div class="d-none d-sm-none d-md-flex d-lg-flex  col-sm-2 col-md-2 col-lg-2">
                    <!-- <h1 class="text-white display-4 d-none d-md-block">Superá tus límites participando en la primera red social de desafíos digitales</h1>
                        <h1 class="text-white d-block d-md-none">Superá tus límites participando en la primera red social de desafíos digitales</h1> -->
                    </div>
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 shadow contacto-form px-5 py-3 d-flex flex-column align-items-center">
                        <a href="index.php"><img  src="img/logo_c.svg" alt=""></a>
                        <h3 class="color-verde text-center ">Registro</h3>
                        <form class="w-100 needs-validation" novalidate>
                            
                            <div class="form-row">
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <div class="form-group" method="POST" action="register.php">
                                        <label for="inputName">Tu nombre</label>
                                        <input type="text" class="form-control" id="inputName" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <div class="form-group" method="POST" action="register.php">
                                        <label for="inputName">Tu Apellido</label>
                                        <input type="text" class="form-control" id="inputName" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                                    <div class="form-group" method="POST" action="register.php">
                                        <label for="inputName">Nombre de usuario</label>
                                        <input type="text" class="form-control is-valid" id="inputName" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label for="inputMail">Tu mail</label>
                                        <input type="email" class="form-control is-valid" id="inputMail" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label for="inputMail">Confirmacion mail</label>
                                        <input type="email" class="form-control is-valid" id="inputMail" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control is-valid" id="inputPassword" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Confirma contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control is-valid" id="inputPassword" required>
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label for="inputFechaNac">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="inputFechaNac" placeholder="Date of Birth" required>
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    
                                </div>
                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mt-3 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Acepto terminos y condiciones
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 ">
                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                </div>  
                            </form> 
                        </div>               
                    </div>
                    
                    <div class="d-none d-sm-none d-md-flex d-lg-flex  col-sm-2 col-md-2 col-lg-2">
                        <!-- <h1 class="text-white display-4 d-none d-md-block">Superá tus límites participando en la primera red social de desafíos digitales</h1>
                            <h1 class="text-white d-block d-md-none">Superá tus límites participando en la primera red social de desafíos digitales</h1> -->
                        </div>
                        
                    </div>
                </body>