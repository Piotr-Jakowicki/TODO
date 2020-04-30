<?php 
require_once 'templates/inc/header.php';

$user = New User();
$results = $user->fetchData($_SESSION['id']);
?>

<div class="container">
    <div class="row h-100">
        <div class="col-md-4">
            <form action="" method="POST">
                <label for="task">Task</label>
                <input class="form-control" type="text" name="task" id="task">

                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment" id="comment"></textarea>

                <label for="task">Task</label>
                <input class="form-control" type="text" name="task" id="task">

                <input class="btn btn-primary w-100 mt-2" type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-8">
            <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Prioryty</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $task): ?>
                    <tr>
                        <th scope="row"><?= $task->task ?></th>
                        <td><?= $task->comment ?></td>
                        <td><?= $task->prioryty ?></td>
                        <td>
                        <a href="#" class="btn btn-info">Details</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>  
                    <?php endforeach; ?> 
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'templates/inc/footer.php';
?>