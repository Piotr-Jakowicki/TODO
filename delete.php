<?php
require_once 'core/init.php';

if(isset($_GET['id'])){
    $todo = new Todo();
    $todo->delete($_GET['id']);
    Message::danger('Task deleted');
    Message::set();
    header('Location:dashboard.php');
    exit;
}