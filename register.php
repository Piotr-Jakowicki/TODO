<?php 
require_once 'templates/inc/header.php';
require_once 'core/init.php';
if(isset($_POST['submit'])){
    echo 'ok';
    //checkToken
        $user = new User();
        $user->register($_POST);
            //Insert
            //Or
            //Error
} else {
    //error
}
?>
<div class="container">
    <form action='' method="POST">
    <div class="form-row">
        <div class="form-group col-md-12">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name='username' id="Username" placeholder="Username" required>
        </div>
        <div class="form-group col-md-12">
        <label for="Username">Name</label>
        <input type="text" class="form-control" name='name' id="Username" placeholder="Username" required>
        </div>
        <div class="form-group col-md-6">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name='password' id="Password" placeholder="Password" required>
        </div>
        <div class="form-group col-md-6">
        <label for="Password_again">Password Again</label>
        <input type="text" class="form-control" name='password_again' id="Password_again" placeholder="Password_again" required>
        </div>
    </div>
    <input type="hidden" value ='<!-- Token -->' >
    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
    </form>
</div>