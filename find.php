<?php
require_once 'templates/inc/header.php';
$todo = New todo();

if(isset($_POST['submit'])){
    $params = [];

        $params[] = $_POST['search'];

        $params[] = $_POST['prioryty'];
 

    $test = $todo->find($params);


    echo '<pre>';
    var_dump($test);
}