<?php 
require_once 'core/init.php';
require_once 'templates/inc/header.php';

if(isset($_SESSION['is_Logged_in'])){
    header('Loaction:index.php');
    exit;
}

if(isset($_POST['submit'])){
    $val = new Validate();
    $val->make($_POST,array(
        'username' => 'required:1|min:6|max:20',
        'password' => 'required:1|min:6|max:30',
    ));

    if($val->passed()){
        $user = new User();
        $user->login($_POST['username'], $_POST['password']);
    } else {
        ?> <div class="alert alert-danger" role="alert"> <?php
        foreach($val->getErrors() as $error){
        echo $error . '</br>';
        }
        ?> </div> <?php
    }
}

?>
<div class="container">
    <form action='' method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name='username' id="Username" placeholder="Username">
        </div>
        <div class="form-group col-md-6">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name='password' id="Password" placeholder="Password">
        </div>
    </div>
    <input type="hidden" value ='<!-- Token -->' >
    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
    </form>
</div>