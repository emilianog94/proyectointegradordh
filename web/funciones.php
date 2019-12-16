<?php

//FUNCION PRE PARA LOS VARDUMP LINDOS 
function pre($dato){
  echo "<pre>";
  var_dump($dato);
  echo "</pre>";
}


//DEFINO VALORES DE KB MB GB Y TB PARA HACER VALIDACIONES DE TAMAÑO DE IMAGEN

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);



// FUNCION PARA ABRIR JSON Y DEVOLVER UN ARRAY DECODEADO (NECESITA LA RUTA DEL JSON)
function abrirJson($dirJson){
  $json = file_get_contents($dirJson);
  $arrayUsuarios = json_decode($json , true);
  return $arrayUsuarios;
}

//FUNCION PARA MODIFICAR EL ARCHIVO JSON, NECESITA EL NUEVO DATO , EL CAMPO QUE SE VA A MODIFICAR, EL DATO VIEJO PARA PODER REEMPLARLO Y UN ID PARA UNA VERIFICACION.

function modificarJson($nuevo_dato , $campo_para_modificar, $dato_viejo  , $id){
  $arrayDeUsuarios = abrirJson("usuarios.json");
  foreach($arrayDeUsuarios as $usuarios){
    if ($usuarios["$campo_para_modificar"] == $dato_viejo &&  $usuarios['id'] == $id){
      $usuarios["$campo_para_modificar"] = $nuevo_dato;
    }
    $arrayDeUsuariosFinal[] = $usuarios;
  }

  $json = json_encode($arrayDeUsuariosFinal);
  file_put_contents('usuarios.json' , $json); 
}



// FUNCIÓN PARA VALIDAR CAMPOS DEL MODIFICADOR DE DATOS
function validarModificacion($data) {

  // Creo un array de errores vacío.
  $errores = [];

  // CAMPO NOMBRE
  $nombre = trim($data["name"]);
  // si está vacío,
  if($nombre == "") {
    // creo la posición "name" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
    $errores['name'] = "El nombre es obligatorio";
  }

  // CAMPO EMAIL
  $email = trim($data['email']);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  // si está vacío
  if($email == ""){
    // creo la posición "email" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
    $errores['email'] = "El mail es obligatorio";
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = "El email ingresado no es válido";
  } else {

    //ABRO EL JSON PARA CHEQUEAR QUE NO EXISTA OTRO MAIL IGUAL EN LA BASE DE DATOS
    $directorioJson = "usuarios.json";
    $todosLosUsuarios = abrirJson($directorioJson);
    if(!empty($todosLosUsuarios)){
      foreach($todosLosUsuarios as $usuarios){
        if($usuarios['email'] == $_SESSION['email']){
        }
        elseif($usuarios['email'] == $_POST['email']){
          $errores['email'] = "Este mail ya pertenece a otra cuenta";
        }

      }
    }

  //AQUI SE HACE LA VALIDACION CON LA CONFIRMACION DE MAIL
    if(isset($_POST['confirm-email'])){
      if(strlen($_POST['confirm-email'])== 0){
          $errores['confirm-email'] = "Este campo no se puede encontrar vacio";
      }elseif (!($_POST['confirm-email'] == $_POST['email'])){
          $errores['confirm-email'] = "El mail no coincide con el ingresado";
      }else{
          $validado['confirm-email'] = $_POST['confirm-email'];
      }
  }
  }

  
  // CAMPO AVATAR

  if(isset($data['avatar'])){
    if(!empty($data['avatar'])){
      $avatar = $data['avatar'];

      if($avatar['error']) {
  
      } else {
          // obtengo la extensión
          $ext = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
          if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png' ) {
            $errores['avatar'] = "La extensión del archivo debe ser jpg, png ó jpeg";
          }elseif ($avatar['size'] > 2*MB){
              $errores['avatar'] == "El archivo es demasiado pesado, maximo 2MB";
          }
       }
    }
  }



  // CAMPO CONTRASEÑA
  $password = trim($data['password']);
  // si está vacío
  if($password == "" ) {
    // NO PASA NADA
  }else{
    $uppercase = preg_match('@[A-Z]@', $_POST['password']);
    $lowercase = preg_match('@[a-z]@', $_POST['password']);
    $number    = preg_match('@[0-9]@', $_POST['password']);
    $specialChars = preg_match('@[^\w]@', $_POST['password']);
    // si tiene una longitud menos a 6
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
    // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
    $errores['password'] = "La contraseña debe tener al menos 8 caracteres de longitud y debe incluir al menos una letra mayúscula, un número y un carácter especial";
    }
  }

  
  // CAMPO REPETIR CONTRASEÑA
  $cpassword = trim($data['confirm-password']);
  // si está vacío
  if($cpassword == "") {
    // NO PASA NADA
  } 
    // si es diferente al password que escribió
    elseif($cpassword != $password) {
    // creo la posición "repassword" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
    $errores['confirm-password'] = "Las contraseñas no coinciden";
  }

  return $errores;

}


//FUNCION PARA PERSISTENCIA PARA REGISTRO
function persistenciaRegistro($campo_a_persistir){
//  REVISO QUE EXISTA POST
  if ($_POST){
    if (isset($_POST)){
      $errores = [];
      //ME TRAIGO ERRORES PARA SABER SI PERSISTIR EN EL DATO O NO
      $errores = validarRegistro($_POST);
      //COMPRUEBO QUE NO EXISTA ERROR EN EL CAMPO A VERIFICAR (ESTO SE SABE SI ERRORES ESTA VACIO)
      if (isset($errores["$campo_a_persistir"]) == ""){
        //DEVUELVO VALOR DEL CAMPO SI PASA LA VERIFICACION
        return $_POST["$campo_a_persistir"];
      }
    }else{
      //EN CASO DE QUE NO ESTE SETEADA DEVOLVERA NADA
      return "";
    }
  }
}

//FUNCION PARA PERSISTENCIA PARA LOGIN
function persistenciaLogin($campo_a_persistir){
//  REVISO QUE EXISTA POST
  if ($_POST){
    if (isset($_POST)){
      $errores = [];
      //ME TRAIGO ERRORES PARA SABER SI PERSISTIR EN EL DATO O NO
      $errores = validarLogin($_POST);
      //COMPRUEBO QUE NO EXISTA ERROR EN EL CAMPO A VERIFICAR (ESTO SE SABE SI ERRORES ESTA VACIO)
      if (isset($errores["$campo_a_persistir"]) == ""){
        //DEVUELVO VALOR DEL CAMPO SI PASA LA VERIFICACION
        return $_POST["$campo_a_persistir"];
      }
    }else{
      //EN CASO DE QUE NO ESTE SETEADA DEVOLVERA NADA
      return "";
    }
  }
}






// FUNCIÓN PARA VALIDAR CAMPOS DEL FORMULARIO DE REGISTRO
function validarRegistro($data) {

    // Creo un array de errores vacío.
    $errores = [];

    // CAMPO NOMBRE
    $nombre = trim($data["name"]);
    // si está vacío,
    if($nombre == "") {
      // creo la posición "name" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['name'] = "El nombre es obligatorio";
    }
    elseif(strlen($nombre) <3 ){
      $errores['name'] = "El nombre es muy corto";
    }

    // CAMPO APELLIDO
    $apellido = trim($data["lastname"]);
    // si está vacío,
    if($apellido == "") {
      // creo la posición "name" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['lastname'] = "El apellido es obligatorio";
    }
    elseif(strlen($apellido) <3 ){
      $errores['lastname'] = "El apellido es muy corto";
    }

    // CAMPO EMAIL
    $email = trim($data['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // si está vacío
    if($email == ""){
      // creo la posición "email" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['email'] = "El mail es obligatorio";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores['email'] = "El email ingresado no es válido";
    } else {

      //ABRO EL JSON PARA CHEQUEAR QUE NO EXISTA OTRO MAIL IGUAL EN LA BASE DE DATOS
      $directorioJson = "usuarios.json";
      $todosLosUsuarios = abrirJson($directorioJson);
      if(!empty($todosLosUsuarios)){
        foreach($todosLosUsuarios as $usuarios){
          if($usuarios['email'] == $email){
            $errores['email'] = "El mail ya existe";
          }
        }
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
    }
    
    // CAMPO NOMBRE DE USUARIO
    $userName = trim($data['username']);
    if(strlen($userName) < 5 && strlen($userName) > 12) {
      // creo la posición "username" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['username'] = "El nombre de usuario debe tener entre 5 y 12 caracteres";
    }else {

        //AQUI SE ABRE EL JSON PARA CHEQUEAR QUE NO EXISTA OTRO USERNAME EN LA BASE
        $directorioJson = "usuarios.json";
        $todosLosUsuarios = abrirJson($directorioJson);
        if(!empty($todosLosUsuarios)){
          foreach($todosLosUsuarios as $usuarios){
            if($usuarios['username'] == $userName){
              $errores['username'] = "El username ya existe";
            }
          }
        }

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
        }elseif ($avatar['size'] > 2*MB){
            $errores['avatar'] == "El archivo es demasiado pesado, maximo 2MB";
        }

     }


    // CAMPO CONTRASEÑA
    $password = trim($data['password']);
    // si está vacío
    if($password == "" ) {
      // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['password'] = "La contraseña es obligatoria";
    }else{
      $uppercase = preg_match('@[A-Z]@', $_POST['password']);
      $lowercase = preg_match('@[a-z]@', $_POST['password']);
      $number    = preg_match('@[0-9]@', $_POST['password']);
      $specialChars = preg_match('@[^\w]@', $_POST['password']);
      // si tiene una longitud menos a 6
      if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
      // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['password'] = "La contraseña debe tener al menos 8 caracteres de longitud y debe incluir al menos una letra mayúscula, un número y un carácter especial";
      }
    }

    
    // CAMPO REPETIR CONTRASEÑA
    $cpassword = trim($data['confirm-password']);
    // si está vacío
    if($cpassword == "") {
      // creo la posición "repassword" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['confirm-password'] = "Debe repetir la contraseña para continuar";
    } 
      // si es diferente al password que escribió
      elseif($cpassword != $password) {
      // creo la posición "repassword" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['confirm-password'] = "Las contraseñas no coinciden";
    }



    //CAMPO SEXO
    if($data['sex'] != "h" && $data['sex'] != "m"){
      $errores['sex'] = "Este campo no puede encontrarse vacio";
    }


    //CAMPO INTERESES
    if(!isset($data['diseno_y_arte']) && !isset($data['fotografia']) && !isset($data['programacion_y_logica'])){
      $errores['intereses'] = "Debe elegir al menos una categoria de interes";
    }

    //CAMPO EDAD
    if($data['birth'] == ""){
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




//FUNCION PARA MOSTRAR ERRORES 

function mostrarErrores($campo_a_verificar){
  if($_POST){
    if (isset($_POST)){
      $errores = [];
      $errores = validarRegistro($_POST);
      if (isset($errores["$campo_a_verificar"]) != ""){
        return "*" . $errores["$campo_a_verificar"];
      }
    }else{
      return "";
    }
  }


}

// FUNCIÓN PARA GUARGAR IMAGEN

function guardarAvatar() {
    // me guardo la extensión del archivo
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

    // me guardo la carpeta temporal en la que se encuentra
    $directorioTemporal = $_FILES['avatar']['tmp_name'];

    // armo el nombre con el que voy a guardar la imagen. La función uniqid() puede recibir un string, que será el prefijo del id aleatorio generado
    $nombreImagen = uniqid('img_') . '.' . $ext;
    
    // armo la ruta final de la imagen, concatenando al final el nombre que creé
    $carpetaFinal = dirname(__FILE__) . "/avatars/" . $nombreImagen;
    
    // muevo el archivo a la carpeta avatars
    move_uploaded_file($directorioTemporal, $carpetaFinal);
    
    // devuelvo el nombre de la imagen que armé, para guardarlo en el array del usuario
    return $nombreImagen;
}



//Funcion para generar un array con los intereses.
function arrayIntereses($data){
  if(isset($data['diseno_y_arte'])){
    $arrayIntereses['diseno_y_arte'] = true;  
  }else{
    $arrayIntereses['diseno_y_arte'] = false;
  }

  if(isset($data['fotografia'])){
    $arrayIntereses['fotografia'] = true;  
  }else{
    $arrayIntereses['fotografia'] = false;
  }

  if(isset($data['programacion_y_logica'])){
    $arrayIntereses['programacion_y_logica'] = true;  
  }else{
    $arrayIntereses['programacion_y_logica'] = false;
  }
  
  return $arrayIntereses;
}


//FUNCIÓN PARA CREAR UN ARRAY ASOCIATIVO CON LOS DATOS QUE ME LLEGAN POR POST
function guardarModificacion($data) {
  $dirJson = "usuarios.json";

  $todosLosUsuarios = abrirJson($dirJson);
 
  foreach ($todosLosUsuarios as $usuario) {
    if($usuario['id'] == $_SESSION['id']) {
      $usuario['email'] = $_POST['email'];
      $usuario['name'] = $_POST['name'];
      $usuario['lastname'] = $_POST['lastname'];

      if($usuario['intereses']['programacion_y_logica']=true){
        $usuario['intereses']['programacion_y_logica'] = true;
      }
      else{
        $usuario['intereses']['programacion_y_logica']=false;
      }

      if($usuario['intereses']['fotografia']=true){
        $usuario['intereses']['fotografia'] = true;
      }
      else{
        $usuario['intereses']['fotografia']=false;
      }      

      if(isset($usuario['intereses']['diseno_y_arte'])){
        $usuario['intereses']['diseno_y_arte'] = true;
      }
      else{
        $usuario['intereses']['diseno_y_arte']=false;
      }


    if(isset($_FILES['avatar'])){
      $nombreImagen = guardarAvatar();
      $usuario['avatar'] = $nombreImagen;
    }  

      

    }
  }
  return $usuario;
}





//FUNCIÓN PARA CREAR UN ARRAY ASOCIATIVO CON LOS DATOS QUE ME LLEGAN POR POST
function guardarUsuario($data) {
    $dirJson = "usuarios.json";
    $totalUsuarios = 0;

    $todosLosUsuarios = abrirJson($dirJson);
    if(!empty ($todosLosUsuarios)) {
      $totalUsuarios = count($todosLosUsuarios);
    }
    $data['id'] = $totalUsuarios + 1;
    
    
    $usuario = [
        "id" => $data['id'],
        "name" => $data["name"],
        "lastname" => $data['lastname'],
        "email" => $data["email"],
        "birth" => $data['birth'],
        "username" => $data["username"],
        "password" => password_hash($data["password"], PASSWORD_DEFAULT),
        //"tyc_check" => $data['tyc_check'], ESTE CAMPO NO SE GUARDA
        "sex" => $data['sex'] 
    ];
    return $usuario;
}

//FUNCIONES AGREGADAS

//FUNCIÓN PARA VALIDAR CAMPOS DEL FORMULARIO DE LOGIN

function validarLogin($data){
    $usuario = [];
    $errores = [];
    //CHEQUEAMOS QUE EXISTA POST Y CONTENGA ALGO EN ELLA
    if($data){
        if(isset($data['email'])){
            //VERIFICAMOS QUE EL CAMPO NO ESTE VACIO
            if(empty($data['email']) == true){
                $errores['email']= "Este campo no puede estar vacio";
                //VERIFICAMOS QUE EL CAMPO SEA UN MAIL
            }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $errores['email'] = "Este campo debe ser un mail";
            }else{
                //INVOCAMOS LA FUNCION BUSCAR USUARIO SI DEVUELVE FALSE ENTONCES NO EXISTE EN LA BASE DE DATOS
                if (buscarUsuario("email",$data['email']) == false){
                    $errores['email'] = "Este mail no existe en la base de datos";
                } else {
                    $usuario = buscarUsuario("email",$data['email']);
                    if(password_verify($data['password'] , $usuario['password'] ) == false){
                        $errores['password'] = "La contraseña no es correcta";
                    }
                }
            }
        }
    }
    return $errores;
}



//FUNCION PARA BUSCAR UN USUARIO CON UN DETERMINADO VALOR EN UNO DE SUS CAMPOS
function buscarUsuario($campo, $valor) {
  $arrayUsuarios = abrirJson('usuarios.json');
  for($i = 0; $i < count($arrayUsuarios); $i++) {
    if(isset($arrayUsuarios[$i][$campo]) && $arrayUsuarios[$i][$campo] == $valor)
      return $arrayUsuarios[$i];  
  }
  return false;
}


//FUNCIONES PARA LA SESION Y LAS COOKIES
function crearSesion($usuario) {
  foreach($usuario as $campo => $valor) {
    if($campo != "password") {
      $_SESSION[$campo] = $valor;
    }
  }
}


function crearSesionConCookies() {
  foreach($_COOKIE as $campo => $valor) {
    $_SESSION[$campo] = $valor;
  }
}

function crearCookies() {
  foreach($_SESSION as $campo => $valor) {
    setcookie($campo,$valor, time() + 60 * 60 * 24 * 7);
  }
}
function borrarCookies() {
  foreach($_COOKIE as $campo => $valor) {
    setcookie($campo,"", -1);
  }
}
?>