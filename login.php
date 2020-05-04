<?php
require_once 'templates/inc/header.php';

if(isset($_POST['submit'])){
    if(Token::check($_POST['token'])){
        $val = new Validate();
        $val->make($_POST,array(
            'username' => 'required:1|min:6|max:20',
            'password' => 'required:1|min:6|max:30',
        ));

        if($val->passed()){
            $user = new User();
            $user->login($_POST['username'], $_POST['password']);
        } else {
            foreach($val->getErrors() as $error){
                Message::danger($error); 
            }
            Message::set();
        }
    }
}
require_once 'templates/login.php';
