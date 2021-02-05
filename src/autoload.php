<?php
spl_autoload_register(function ($className) {
    $path = 'src/';
    $extension = '.php';
    $fullName = $path . $className . $extension;

    if (!file_exists($fullName)) {
        die($className);
        return false;
    }

    require_once $fullName;
});
