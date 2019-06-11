<?php

function __autoload($classname) {
    $array_paths = array(
        '/app/models/',
        '/app/components/',
    );

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $classname . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}
