<?php
require_once 'core/init.php';
$todo = New todo();

if(isset($_POST['submit'])){
    if(Token::check($_POST['add_token'])){
        $val = new Validate();
        $val->make($_POST,array(
            'task' => 'required:1|max:20',
        ));
        if($val->passed()){
            $todo->create($_POST['task'],$_POST['comment'],$_POST['prioryty']);
            Message::success('Successfully add new task!');
        } else{
            foreach($val->getErrors() as $error){
                Message::danger($error);
            }
        }
        $_SESSION['msg'] = Message::set();
        header('Location:dashboard.php');
        exit;
    }
}