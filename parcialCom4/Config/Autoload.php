<?php

namespace Config;
require_once 'Constants.php';

spl_autoload_register(function($className)
{
    $classPath = ucwords(str_replace("\\", "/", ROOT.$className).".php");
    
    include_once($classPath);

});
?>