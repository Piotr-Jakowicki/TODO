<?php
session_start();
require_once 'config.php';

spl_autoload_register(function($className){
    $file = __DIR__ . "\\..\\classes" . "\\{$className}.php";
    if(file_exists($file)){
        require_once $file;
    }
});