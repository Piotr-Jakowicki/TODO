<?php
require_once 'core/init.php';

if(isset($_GET['id'])){
    $todo = new Todo();
    $todo->delete($_GET['id']);
    header('Location:index.php');
    exit;
}