<?php
require_once("funciones.php");

session_start();

//CIERRA LA SESIÓN
session_destroy();

//SI EXISTE UNA COOKIE BORRA TODAS
if($_COOKIE["email"]) {
    borrarCookies();
}
//SE REDIRIGE A LA PÁGINA PRINCIPAL
header("location:index.php");

?>