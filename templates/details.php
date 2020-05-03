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
        <form action="details.php" method="POST">
                    <label for="task">Task</label>
                    <input class="form-control" type="text" name="task" id="task" value="<?= $task->task ?>">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" id="comment"><?= $task->comment ?></textarea>
                    <label class="mr-sm-2" for="prioryty">Prioryty</label>
                    <select class="custom-select mr-sm-2" name="prioryty" id="prioryty">
                        <option value="1" <?php if($task->prioryty == 1) echo "selected"; ?>>Low</option>
                        <option value="2" <?php if($task->prioryty == 2) echo "selected"; ?>>Medium</option>
                        <option value="3" <?php if($task->prioryty == 3) echo "selected"; ?>>High</option>
                    </select>
                    <input type="hidden" name="details_token" value ="<?= Token::generate(); ?>" >
                    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                    <input class="submit btn btn-primary mt-2" type="submit" name="submit" value="Update">
                    <a class="btn btn-info mt-2" href="dashboard.php" role="button">Back</a>
                </form>
        </div>
    </div>
</div>
<?php
require_once 'templates/inc/footer.php';
?>