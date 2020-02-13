<?php

class Usuario
{
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $username;
    private $password;
    private $mail;
    private $fecha_nacimiento;
    private $sexo;
    private $lista_intereses;
    private $puntos;
    private $amigos;
    private $avatar;


    // Defino el Construct que me va a servir para Login y para Registro
    public function __construct($nombre="",$apellido="",$username="",$password,$mail,$fecha_nacimiento="",$sexo="",$avatar=""){
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setMail($mail);
        $this->setFecha_nacimiento($fecha_nacimiento);
        $this->setSexo($sexo);
        $this->setAvatar($avatar);
    }


    // Método de guardado en la base de datos. 
    public function saveUsuario($usuario){

      // 1) Me conecto por PDO a la base
      $link = Conexion::conectar();

      // 2) Hago la Query y la ejecuto
      $query = $link->prepare("INSERT INTO usuarios values(NULL,:fecha_nacimiento,:sexo,:nombre,:apellido,:contrasena,:username,:mail,:avatar)");
      $query->bindValue(":nombre",$usuario->getNombre());
      $query->bindValue(":apellido",$usuario->getApellido());
      $query->bindValue(":fecha_nacimiento",$usuario->getFecha_nacimiento());
      $query->bindValue(":sexo",$usuario->getSexo());
      $query->bindValue(":contrasena",$usuario->getPassword());
      $query->bindValue(":username",$usuario->getUsername());
      $query->bindValue(":mail",$usuario->getMail());
      $query->bindValue(":avatar",$usuario->getAvatar());
      $query->execute();
    }

      // Creo la sesión tras registrarme / loguearme
    public function crearSesion($usuario){
      $_SESSION['email'] = $usuario->getMail();
    }


    // Transfiero la sesión a otras páginas. Hago una query a la bdd utilizando la SESSION para obtener los datos del usuario en todo momento.
    public function mantenerSesion(){
      $mail=$_SESSION['email'];
      $link = Conexion::conectar();
      $query= $link->prepare("SELECT * FROM usuarios WHERE mail = '$mail' ");
      $query->execute();
      $usuario = $query->fetch(PDO::FETCH_ASSOC);
      //var_dump($usuario);exit;  
      return $usuario;    
    }


    public function login(){

    }


    public function validarRegistro(){
      $errores = [];



      if($this->getNombre() == ""){
        $errores['name'] = "El nombre es obligatorio";
      }
      elseif(strlen($this->getNombre()) < 3 ){
        $errores['name'] = "El nombre es muy corto";
      }


      
      if($this->getApellido() == ""){
        $errores['lastname'] = "El apellido es obligatorio";
      }
      elseif(strlen($this->getApellido() ) < 3 ){
        $errores['lastname'] = "El apellido es muy corto";
      }      


      $email=filter_var($this->getMail(),FILTER_SANITIZE_EMAIL);
      if($email == ""){
        // creo la posición "email" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
        $errores['email'] = "El mail es obligatorio";
      } 
      elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "El email ingresado no es válido";
      } 

      $link = Conexion::conectar();
      $query=$link->prepare("SELECT * FROM usuarios WHERE mail='$email'");
      $query->execute();
      if ($query->rowCount() != 0){
        $errores['email'] = "El mail ya está en uso. Insertá otro mail";
      }

             

            //AQUI SE HACE LA VALIDACION CON LA CONFIRMACION DE MAIL
              if(isset($_POST['validacion_email'])){
                if(strlen($_POST['validacion_email'])== 0){
                    $errores['validacion_email'] = "Este campo no se puede encontrar vacio";
                }elseif (!($_POST['validacion_email'] == $_POST['email'])){
                    $errores['validacion_email'] = "El mail no coincide con el ingresado";
                }else{
                    $validado['validacion_email'] = $_POST['validacion_email'];
                }
            }
            
            $username=$this->getUsername();
            if($this->getUsername() == ""){
              $errores['username'] = "El username es obligatorio";
            }
            elseif(strlen($this->getUsername() ) < 3 ){
              $errores['username'] = "El username es muy corto";
            }      

            $link = Conexion::conectar();
            $query=$link->prepare("SELECT * FROM usuarios WHERE username='$username'");
            $query->execute();
            if ($query->rowCount() != 0){
              $errores['username'] = "El usuario ya está en uso. Insertá otro usuario";
            }




            
            // CAMPO AVATAR
            $avatar = $_FILES['avatar'];
            // si no cargaron ningún archivo
            if($avatar['error']) {
              // creo la posición "avatar" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
              $errores['avatar'] = "Debe subir una foto de perfil";
            } else {
                // obtengo la extensión
                $ext = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
                if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png' ) {
                  $errores['avatar'] = "La extensión del archivo debe ser jpg, png ó jpeg";
                } elseif ($avatar['size'] > 2097152){
                    $errores['avatar'] = "El archivo es demasiado pesado, maximo 2MB";
                }

                else{
                  $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

                  // me guardo la carpeta temporal en la que se encuentra
                  $directorioTemporal = $_FILES['avatar']['tmp_name'];
              
                  // armo el nombre con el que voy a guardar la imagen. La función uniqid() puede recibir un string, que será el prefijo del id aleatorio generado
                  $nombreImagen = uniqid('img_') . '.' . $ext;
                  
                  // armo la ruta final de la imagen, concatenando al final el nombre que creé
                  $carpetaFinal = dirname(__FILE__ , 2) . "/avatars/" . $nombreImagen;
                  
                  // muevo el archivo a la carpeta avatars
                  move_uploaded_file($directorioTemporal, $carpetaFinal);
                  
                  // devuelvo el nombre de la imagen que armé, para guardarlo en el array del usuario
                  $this->setAvatar($nombreImagen);
                }
        


             }
        
        
            // CAMPO CONTRASEÑA
            // si está vacío
            if($this->getPassword() == "") {
              // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
              $errores['password'] = "La contraseña es obligatoria";
            }
            else{
              $uppercase = preg_match('@[A-Z]@', $this->getPassword());
              $lowercase = preg_match('@[a-z]@', $this->getPassword());
              $number    = preg_match('@[0-9]@', $this->getPassword());
              $specialChars = preg_match('@[^\w]@', $this->getPassword());
              // si tiene una longitud menos a 6
              if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->getPassword() ) < 8) {
              // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
              $errores['password'] = "La contraseña debe tener al menos 8 caracteres de longitud y debe incluir al menos una letra mayúscula, un número y un carácter especial";
              }

            }
        
            
            // CAMPO REPETIR CONTRASEÑA
            $cpassword = trim($_POST['confirm-password']);
            // si está vacío
            if($cpassword == "") {
              // creo la posición "repassword" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
              $errores['confirm-password'] = "Debe repetir la contraseña para continuar";
            } 
              // si es diferente al password que escribió
              elseif($cpassword != $this->getPassword()) {
              // creo la posición "repassword" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
              $errores['confirm-password'] = "Las contraseñas no coinciden";
            }
        
            $hashedPassword = password_hash($this->getPassword(),PASSWORD_DEFAULT);
            $this->setPassword($hashedPassword);

        
        
            //CAMPO SEXO
            if($this->getSexo() != "h" && $this->getSexo() != "m"){
              $errores['sex'] = "Este campo no puede encontrarse vacio";
            }
        
            /*
            //CAMPO INTERESES
            if(!isset($data['diseno_y_arte']) && !isset($data['fotografia']) && !isset($data['programacion_y_logica'])){
              $errores['intereses'] = "Debe elegir al menos una categoria de interes";
            }
            */
        
            //CAMPO EDAD
            if($this->getFecha_nacimiento() == ""){
              $errores['birth'] = "Este campo no puede quedar vacio";
            }
        
            //CAMPO TERMINOS Y CONDICIONES 
            if(isset($data['tyc_check'])){
              if(empty($data['tyc_check']))
              $errores['tyc_check'] = "Debe aceptar los términos y condiciones para continuar";
            }
        
            // devuelvo el array de errores. Si no entró en ninǵun condicional de los declarados arriba, el array de errores va a estar vacío
            return $errores;



          }





    public function validarLogin($data){
        //CHEQUEAMOS QUE EXISTA POST Y CONTENGA ALGO EN ELLA
        if($data){
          $errores=[];
            if(null !== $data->getMail() ){
              $mail=$data->getMail();
                //VERIFICAMOS QUE EL CAMPO NO ESTE VACIO
                if(empty($data->getMail() ) == true){
                    $errores['email']= "Este campo no puede estar vacio";
                    //VERIFICAMOS QUE EL CAMPO SEA UN MAIL
                }elseif(!filter_var($data->getMail(), FILTER_VALIDATE_EMAIL)){
                    $errores['email'] = "Este campo debe ser un mail";
                }else{

                  $link = Conexion::conectar();
                  $query= $link->prepare("SELECT * FROM usuarios WHERE mail='$mail'");
                  $query->execute();
                  $resultado = $query->fetch(PDO::FETCH_ASSOC);

                  if($data->getMail() == $resultado['mail'] && password_verify($data->getPassword(),$resultado['contrasena'])) {
                    $errores['login']="Usuario o contraseña incorrectos";
                  }


                }
            }
        }
        return $errores;


    }


    public function modificarDatos(){

    }


    public function agregarInteres(){

    }


    public function borrarInteres(){

    }


    public function agregarAmigo(){

    }


    public function borrarAmigo(){

    }


    public function verAmigos(){

    }


    public function buscarUsuarioPorID(){

    }


    public function verificarSiEsAmigo(){

    }






    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set the value of fecha_nacimiento
     *
     * @return  self
     */ 
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of lista_intereses
     */ 
    public function getLista_intereses()
    {
        return $this->lista_intereses;
    }

    /**
     * Set the value of lista_intereses
     *
     * @return  self
     */ 
    public function setLista_intereses($lista_intereses)
    {
        $this->lista_intereses = $lista_intereses;

        return $this;
    }

    /**
     * Get the value of puntos
     */ 
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set the value of puntos
     *
     * @return  self
     */ 
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get the value of amigos
     */ 
    public function getAmigos()
    {
        return $this->amigos;
    }

    /**
     * Set the value of amigos
     *
     * @return  self
     */ 
    public function setAmigos($amigos)
    {
        $this->amigos = $amigos;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }
}

?>