<?php 
require_once 'core/init.php';
require_once 'templates/inc/header.php';
$u = DB::getInstance()->getConnection()->query('select * from tasks');
foreach($u as $item){
    echo $item['task'];
}
require_once 'templates/inc/footer.php';