<?php

//region PHP

// version control
if(PHP_VERSION < '8.0'){
    $error = new \Error('Junior does not support PHP version: ' . PHP_VERSION);
    echo '<h1>' . $error->getMessage() . '</h1>';
    echo '<strong>' . $error->getFile() . '</strong> on line: ' . $error->getLine();
    exit();
}

// error control
$errors = true;
ini_set('display_startup_errors', (int)$errors);
ini_set('display_errors', (int)$errors);
error_reporting(-(int)$errors);
//endregion