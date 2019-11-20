<!DOCTYPE html>
<html lang="en">
<?php
$title="Inicio";
include("include/head.php");
?>

<body>
  <?php include('include/header.php');?>
  
  <!--Seccion PORTADA -->
  
  <header class="profile">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="info_profile text-center pt-5 pb-5">
            <img class="img-thumbnail rounded-circle" src="img/head_profile.png" alt="head_profile">        
            <h1>Franco Fourmantin</h1>
            <h2>@Franklinss</h2>
            <h3>challys solved:123</h3>
            <h3>challys created:123</h3>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!--Fin Seccion PORTADA -->
  
  
  <!--Seccion Posteos -->
  
  <div class="container">

    <div class="row">
      <div class="col-3">
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea, iure accusantium modi blanditiis ab voluptatibus neque fugiat vel ipsa voluptatum ratione non. Modi sed iusto at veritatis esse expedita in.</p>
      </div>
      
      <div class="col-9">

      <!--Menu para elegir vista de posteos-->
        <div class="seleccion_vista_posteos">
          <div class="input-group mb-3">
            
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Mostrar</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
              <option value="1">Creados</option>
              <option value="2">Resueltos</option>
              <option value="3">Todos</option>
            </select>
          </div>
        </div>
      <!--Fin menu para elegir vista de posteos-->

      <?php include('include/chally.php');?>
      <?php include('include/chally.php');?>
      <?php include('include/chally.php');?>
      </div>
    </div>



  </div>
  
  
  
  <!--Fin seccion Posteos-->
  
  
</body>
</html>