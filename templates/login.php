<?php 
require_once 'core/init.php';

if(isset($_SESSION['is_Logged_in'])){
    header('Location:dashboard.php');
    exit;
}
if(isset($_SESSION['msg'])){
    Message::display();
}
?>
<div class="container">
    <form action='login.php' method="POST">
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
    <input type="hidden" name="token" value ="<?= Token::generate(); ?>" >
    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
    </form>
</div>
<?php
require_once 'templates/inc/footer.php';
?>