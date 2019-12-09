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
    if ($usuarios["$campo_para_modificar"] == $dato_viejo && $usuarios['id'] == $_SESSION['id']){
      $usuarios["$campo_para_modificar"] = $nuevo_dato;
    }
    $arrayDeUsuariosFinal[] = $usuarios;
  }

  $json = json_encode($arrayDeUsuariosFinal);
  file_put_contents('usuarios.json' , $json); 
}



// FUNCIÓN PARA VALIDAR CAMPOS DEL FORMULARIO DE REGISTRO
function validar($data) {

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
        $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png') {
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
    if(isset($data['intereses'])){
      if($data['intereses'] == null){
        $errores['intereses'] = "Debe al menos seleccionar una categoria de interes";
      }
    }

    //CAMPO EDAD
    if($data['birth'] == ""){
      $errores['birth'] = "Este campo no puede quedar vacio";
    }

    //CAMPO TERMINOS Y CONDICIONES 
    if(isset($data['tyc_check'])){
      if(empty($data['tyc_check']))
      $errores['tyc_check'] = "Debe marcar esta casilla para continuar";
    }

    // devuelvo el array de errores. Si no entró en ninǵun condicional de los declarados arriba, el array de errores va a estar vacío
    return $errores;
  }


//FUNCION PARA PERSISTENCIA
function persistenciaRegistro($campo_a_persistir){
  //  REVISO QUE EXISTA POST
    if ($_POST){
      if (isset($_POST)){
        $errores = [];
        //ME TRAIGO ERRORES PARA SABER SI PERSISTIR EN EL DATO O NO
        $errores = validar($_POST);
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

//FUNCION PARA MOSTRAR ERRORES 

function mostrarErrores($campo_a_verificar){
  if($_POST){
    if (isset($_POST)){
      $errores = [];

      $errores = validar($_POST);

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
    $carpetaFinal = dirname(__FILE__) . '/avatars/' . $nombreImagen;
    
    // muevo el archivo a la carpeta avatars
    move_uploaded_file($directorioTemporal, $carpetaFinal);
    
    // devuelvo el nombre de la imagen que armé, para guardarlo en el array del usuario
    return $nombreImagen;
}




//FUNCIÓN PARA CREAR UN ARRAY ASOCIATIVO CON LOS DATOS QUE ME LLEGAN POR POST

function guardarUsuario($data) {
    $dirJson = "usuarios.json";
    $totalUsuarios = 0;

    $todosLosUsuarios = abrirJson($dirJson);
   if(empty ($todosLosUsuarios)){
     $data['id'] = 0;

  } else{
    
    $totalUsuarios = count($todosLosUsuarios);

   }
    
    $data['id'] = $totalUsuarios;
    
    
    $usuario = [
        "id" => $data['id'],
        "name" => $data["name"],
        "lastname" => $data['username'],
        "email" => $data["email"],
        "birth" => $data['birth'],
        "username" => $data["username"],
        "password" => password_hash($data["password"], PASSWORD_DEFAULT),
        "intereses" => $data['intereses'],
        "tyc_check" => $data['tyc_check'],
        "sex" => $data['sex']
    ];
    return $usuario;
}

?>