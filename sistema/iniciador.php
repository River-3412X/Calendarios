<?php
    require_once "config/configuracion_general.php";
    spl_autoload_register(function($clase){
        require_once "librerias/".$clase.".php";
    });
?>