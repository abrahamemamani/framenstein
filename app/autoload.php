<?php
    spl_autoload_register(function ($className){
        require_once 'System/'.$className.'.php';
    });
    //require_once '../../config.php';
?>