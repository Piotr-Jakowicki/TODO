<?php 
require_once 'templates/inc/header.php';
if(!isset($_SESSION['is_Logged_in']) || $_SESSION['id'] != $_GET['user']){
    header('Location:index.php');
    exit;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="change_password.php?user=<?= $_GET['user'] ?>" method="POST">
                <label for="name">Current password</label>
                <input class="form-control" type="password" name="current_password" id="current_password">
                <label for="name">New password</label>
                <input class="form-control" type="password" name="new_password" id="new_password">
                <label for="name">Confirm new password</label>
                <input class="form-control" type="password" name="confirm_new_password" id="confirm_new_password"> 
                <input type="hidden" name="change_password_token" value ="<?= Token::generate(); ?>" >
                <input type="hidden" value="<?= $_GET['user'] ?>" name="id">
                <input class="submit btn btn-primary mt-2" type="submit" name="submit" value="Update">
                <a class="btn btn-info mt-2" href="dashboard.php" role="button">Back</a>
            </form>
        </div>
    </div>
</div>