<?php

use \Entity\DirectoryManager;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

    require_once __DIR__.'\\'.$className.'.php';
});

$manager = new DirectoryManager();
$manager->open('my.cnf'); // file
$manager->open('Server'); // directory
$manager->open('data');   // directory

$manager->goBack();
$manager->goBack();


