<?php
require_once 'core/init.php';

$todo = New Todo();
if(isset($_SESSION['find_results'])){
    $results = $_SESSION['find_results']; 
} else {
    $results = $todo->fetchData();
}
$count = count($results);
if(!isset($_GET['page'])){
    $page = 1;
} else {
    $page = $_GET['page'];
}
$results = array_slice($results,0+(($page-1)*10),10);

function inRange($val, $min, $max){
    return ($val >= $min && $val <= $max);
}

require_once 'templates/dashboard.php';


