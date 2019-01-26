<?php
    spl_autoload_register(function ($className){
        if(file_exists('../App/System/'.$className.'.php'))
            require_once 'System/'.$className.'.php';
        
        else if(file_exists('../App/Models/'.$className.'.php'))
            require_once 'Models/'.$className.'.php';
    });
    require_once '../database/config.php';
?>