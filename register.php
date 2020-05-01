<?php 
require_once 'templates/inc/header.php';
if(isset($_POST['submit'])){
    if(Token::check($_POST['token'])){
        $val = new Validate();
        $val->make($_POST,array(
            'username' => 'required:1|min:6|max:20|unique:1',
            'name' => 'required:1|max:50',
            'password' => 'required:1|min:6|max:30',
            'password_again' => 'same:password'
        ));

        if($val->passed()){
            $user = new User();
            $user->register($_POST);
            header('Location:login.php');
        } else {
            foreach($val->getErrors() as $error){
                Message::danger($error); 
            }
            Message::set();
        }
    }
}
require_once 'templates/register.php';