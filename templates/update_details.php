<?php 
require_once 'core/init.php';
if(!isset($_SESSION['is_Logged_in']) || $_SESSION['id'] != $_GET['user']){
    header('Location:index.php');
    exit;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="update_details.php" method="POST">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= $data->name ?>"> 
                <input type="hidden" name="upate_details_token" value ="<?= Token::generate(); ?>" >
                <input type="hidden" value="<?= $_GET['user'] ?>" name="id">
                <input class="submit btn btn-primary mt-2" type="submit" name="submit" value="Update">
                <a class="btn btn-info mt-2" href="dashboard.php" role="button">Back</a>
            </form>
        </div>
    </div>
</div>