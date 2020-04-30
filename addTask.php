<?php

require_once 'templates/inc/header.php';
$todo = New todo();

if(isset($_POST['submit'])){
    $val = new Validate();
    $val->make($_POST,array(
        'task' => 'required:1|max:20',
    ));
    if($val->passed()){
        $todo->create($_POST['task'],$_POST['comment'],$_POST['prioryty']);
    } else{
        ?> <div class="alert alert-danger" role="alert"> <?php
            foreach($val->getErrors() as $error){
            echo $error . '</br>';
            }
            ?> </div> <?php
    }
    //MSG FIX
    header('Location:dashboard.php');
    exit;
}