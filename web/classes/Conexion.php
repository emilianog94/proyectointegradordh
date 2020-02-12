<?php

class Conexion{

    static function conectar(){

        $dsn = "mysql:dbname=chally_db;host=localhost;port=3306";
        $usuario="root";
        $password="";
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try{
            $link= new PDO($dsn,$usuario,$password,$opciones);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $link;
        }

        catch (exception $e){
            echo "Hubo un error al conectarse a la base de datos";
            exit;
        }

        echo "La conexión se realizó correctamente";


    }
}
?>