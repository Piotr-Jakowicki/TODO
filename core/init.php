<?php
session_start();
require_once 'config.php';
require_once 'functions/sanitize.php';
require_once 'functions/inRange.php';
spl_autoload_register(function($className){
    $file = __DIR__ . "\\..\\classes" . "\\{$className}.php";
    if(file_exists($file)){
        require_once $file;
    }
});