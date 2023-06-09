<?php
/**
 * @author    Chris Neal
 * @version   1.0
 * @copyright Copyright (c) 2014, Analog Republic
 **/

function loadController($class) {
    $controller_file = DIR_APP_CONTROLLERS.$class.'.php';
    return @include ($controller_file);
}

function loadModel($class) {
    $model_file = DIR_APP_MODELS.$class.'.php';
    return @include ($model_file);
}

function loadModule($class) {
    $module_file = DIR_APP_MODULES.$class.'.php';
    return @include ($module_file);
}

function loadLib($class) {
    $lib_file = DIR_APP_LIB.$class.'.php';
    return @include ($lib_file);
}

function loader($class) {
    if (strpos($class, 'Controller') !== false) {
        $file_include = loadController($class);
    } elseif (strpos($class, 'Model') !== false) {
        $file_include = loadModel($class);
    } elseif (strpos($class, 'Module') !== false) {
        $file_include = loadModule($class);
    } else {
        $file_include = loadLib($class);
    }
}

spl_autoload_register('loader');
