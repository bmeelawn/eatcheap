<?php

spl_autoload_register('autoloader');

function autoloader($className) {
    $className = lcfirst($className);
    if(stripos($className, 'view')) {
        $path = "../../view/";
    } else if (stripos($className, 'contr')) {
        $path = "../../controller/";
    }

    $extension = ".php";
    $fullPath = $path . $className . $extension;
    return include_once $fullPath;
}

