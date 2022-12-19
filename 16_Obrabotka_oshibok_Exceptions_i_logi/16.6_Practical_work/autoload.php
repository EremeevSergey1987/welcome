<?php

require_once 'vendor/autoload.php';

function loaderClass($className)
{
    if(file_exists('entities/' . $className . '.php')){
        require_once 'entities/' . $className . '.php';
    }

    if(file_exists('interfaces/' . $className . '.php')){
        require_once 'interfaces/' . $className . '.php';
    }

}
spl_autoload_register('loaderClass');
