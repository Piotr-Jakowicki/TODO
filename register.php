<?php 
require_once 'core/init.php';
require_once 'templates/inc/header.php';
if(isset($_POST['submit'])){
    echo 'ok';
    //checkToken
        //Validation
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
        <div class="form-group col-md-6">
        <label for="Email">Email</label>
        <input type="email" class="form-control" name='email' id="Email" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name='username' id="Username" placeholder="Username">
        </div>
        <div class="form-group col-md-6">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name='password' id="Password" placeholder="Password">
        </div>
        <div class="form-group col-md-6">
        <label for="Password_again">Password Again</label>
        <input type="text" class="form-control" name='password_again' id="Password_again" placeholder="Password_again">
        </div>
    </div>
    <input type="hidden" value ='<!-- Token -->' >
    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
    </form>
</div>