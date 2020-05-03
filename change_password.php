<?php
require_once 'templates/inc/header.php';

$user = New User();

$data = $user->getUser('id', $_GET['user']);

if(isset($_POST['submit'])){
    if(Token::check($_POST['change_password_token'])){
        $val = new Validate();
        $val->make($_POST,array(
            'current_password' => 'required:1|min:6',
            'new_password' => 'required:1|min:6',
            'confirm_new_password' => 'required:1|min:6|same:new_password',
        ));

        if($val->passed()){
            if($user->checkPassword($_POST['current_password'])){
                $user->changePassword($_POST['new_password']);
                Message::success('Password updated successfully');
                Message::set();
                header('Location:dashboard.php');
                exit;
            } else {
                Message::danger('Password incorrect');
            }
            
        } else {
            foreach($val->getErrors() as $error){
                Message::danger($error);
            }
        }
        Message::set();
    }
}

require_once 'templates/change_password.php';