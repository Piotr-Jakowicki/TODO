<?php
require_once 'templates/inc/header.php';

$user = New User();

$data = $user->getUser('id', $_GET['user']);
if(isset($_POST['submit'])){
    if(Token::check($_POST['update_details_token'])){
        $val = new Validate();
        $val->make($_POST,array(
            'name' => 'required:1|max:50',
        ));

        if($val->passed()){
            $user->update('name',$_POST['name']);
            Message::success('Update successfully');
            Message::set();
            header('Location:dashboard.php');
            exit;
        } else {
            foreach($val->getErrors() as $error){
                Message::danger($error);    
            }
            Message::set();
            header("Location:update_details.php?user=" . $_POST['id']);
            exit;
        }
    }
}
require_once 'templates/update_details.php';