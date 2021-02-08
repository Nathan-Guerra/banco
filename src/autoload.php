<?php

const MODELS_DIRECTORY = 'src';
const CLASS_SUFIX = '.php';

spl_autoload_register(function ($className) {
    $className = str_replace('Nathan\\Banco', MODELS_DIRECTORY, $className);
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $classDirPath = $className . CLASS_SUFIX;

    if (!file_exists($classDirPath)) {
        die($className);
        return false;
    }

    require_once $classDirPath;
});
