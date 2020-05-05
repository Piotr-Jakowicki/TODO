<?php
require_once 'core/init.php';

$todo = New Todo();

$task = $todo->single($_GET['id']);

if(isset($_POST['submit'])){
    if(Token::check($_POST['details_token'])){
        $val = new Validate();
        $val->make($_POST,array(
            'task' => 'required:1|max:20',
        ));
        if($val->passed()){
            $todo->update($_POST['task'],$_POST['comment'],$_POST['prioryty'],$_POST['id']);
            Message::info('Successfully updated');
            Message::set();
            header('Location:dashboard.php');
            exit;
        } else {
            Message::danger('Update error');
            Message::set();
            header('Location:details.php?id='.$_POST["id"]);
            exit;
        }
    }
}

require_once 'templates/details.php';