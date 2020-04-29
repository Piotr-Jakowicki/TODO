<?php 
require_once 'core/init.php';
require_once 'templates/inc/header.php';
if(isset($_POST['submit'])){
    echo 'ok';
    //checkToken
        //Validation
            //Login
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