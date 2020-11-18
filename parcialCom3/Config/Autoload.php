<?php
namespace Config;
    spl_autoload_register(function ($className)
    {
        $fileName = dirname(__DIR__)."/".$className.".php"; 
        $classPath = ucwords(str_replace("\\", "/", $fileName));

        require_once($classPath);
    });
?>
