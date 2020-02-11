<?php

class Conexion
{

    static function conectar()
    {

        // SETEAMOS LOS CARACTES CORRECTOS PARA NUESTRO IDIOMA
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        $link = new PDO(
            'mysql:host=127.0.0.1;dbname=chally_db',
            'root',
            '',
            $opciones
        );

        //PARA QUE NOS MUESTRE ERRORES SQL
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $link;
    }
}
