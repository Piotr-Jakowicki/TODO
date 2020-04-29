<?php 
require_once 'core/init.php';
$u = DB::getInstance()->getConnection()->query('select * from tasks');
foreach($u as $item){
    echo $item['task'];
}