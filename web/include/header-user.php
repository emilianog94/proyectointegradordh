 <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
    <a class="navbar-brand" href="index.php"><img src="img/logo_chally.svg" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ml-auto align-items-center">


      <li class="nav-item" id="post-cta">
          <a class="nav-link" href="create-post.php"><i class="fas fa-plus"></i> &nbsp; Crear Desafío</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="feed.php"><i class="fas fa-newspaper"></i> &nbsp; Inicio</a>
        </li>

        <li class="nav-item">

          <a class="nav-link" href="profile.php"><i class="fas fa-user"></i> &nbsp; <?=$_SESSION['name'] . " " . $_SESSION['lastname'];?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-bell"></i>&nbsp; Notificaciones</a>
        </li>        

        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-comments"></i>&nbsp; Chat</a>
        </li>        

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="modify-profile.php"><i class="fas fa-cog"></i> Modificar perfil</a>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-times"></i> Cerrar Sesión</a>
</li>




      </ul>
    </div>
  </nav>