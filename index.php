<?php 
require_once 'templates/inc/header.php';

$todo = New Todo();
$results = $todo->fetchData();

?>

<div class="container">
    <div class="row h-100">
        <div class="col-md-3 pt-5">
            <div class="card mb-5">
                <div class="card-header">Add new task</div>
                <div class="card-body">
                <form action="addTask.php" method="POST">
                    <label for="task">Task</label>
                    <input class="form-control" type="text" name="task" id="task">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" id="comment"></textarea>
                    <label class="mr-sm-2" for="prioryty">Prioryty</label>
                    <select class="custom-select mr-sm-2" name="prioryty" id="prioryty">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    <input class="submit btn btn-primary w-100 mt-2" type="submit" name="submit" value="Submit">
                </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Find task</div>
                <div class="card-body">
                <form  action="find.php" method="POST">
                <label class="mr-sm-2" for="prioryty">Serach</label>
                <input class="form-control mr-sm-2" type="text"  name="search" placeholder="Search" aria-label="Search">

                    <label class="mr-sm-2" for="prioryty">Filtr by prioryty</label>
                    <select class="custom-select mr-sm-2" name="prioryty" id="prioryty">
                        <option value="0">Choose</option>
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    <input class="submit btn btn-primary w-100 mt-2" type="submit" name="submit" value="Submit">
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-9 pt-5">
            <div class="card">
            <div class="table-responsive table-striped">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th class="d-none d-md-block" scope="col">Comment</th>
                        <th scope="col">Prioryty</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $task): ?>
                    <tr>
                        <th scope="row"><?= $task->task ?></th>
                        <td class="d-none d-md-block"><?= $task->comment ?></td>
                        <td><?= $task->pname ?></td>
                        <td>
                        <a href="update.php?id=<?= $task->id?>" class="btn btn-info">Details</a>
                        <a href="delete.php?id=<?= $task->id?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>  
                    <?php endforeach; ?> 
                </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'templates/inc/footer.php';
?>