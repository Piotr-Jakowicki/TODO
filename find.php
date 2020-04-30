<?php
require_once 'templates/inc/header.php';
$todo = New todo();
if(isset($_POST['reset'])){
    unset($_SESSION['find_results']);
}
if(isset($_POST['submit'])){
    $params = [];

        $params[] = $_POST['search'];

        $params[] = $_POST['prioryty'];

        $_SESSION['find_results'] = $todo->find($params);
}
header('Location:dashboard.php');
exit;