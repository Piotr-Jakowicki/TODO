<?php
require_once 'templates/inc/header.php';

$user = New User();

$data = $user->single($_GET['user']);

if(isset($_POST['submit'])){
    if(Token::check($_POST['update_details_token'])){
        $val = new Validate();
        $val->make($_POST,array(
            'name' => 'required:1|max:50',
        ));

        if($val->passed()){
            $user->update($_POST['name']);
            header('Location:login.php');
            exit;
        } else {
            foreach($val->getErrors() as $error){
                Message::danger($error);
            }
            Message::set();
        }
    }
}
require_once 'templates/update_details.php';