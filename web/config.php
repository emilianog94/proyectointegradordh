<?php

function autoCarga($nClase){
    require_once "classes/" . $nClase . ".php";
}

spl_autoload_register("autocarga");

?>