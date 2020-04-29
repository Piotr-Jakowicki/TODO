<?php 
require_once 'templates/inc/header.php';
require_once 'core/init.php';

if(isset($_POST['submit'])){
    $val = new Validate();
    $val->make($_POST,array(
        'username' => 'required:1|min:6|max:20|unique:1',
        'name' => 'required:1|max:50',
        'password' => 'required:1|min:6|max:30',
        'password_again' => 'same:password'
    ));

    if($val->passed()){
        $user = new User();
        $user->register($_POST);
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
        <div class="form-group col-md-12">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name='username' id="Username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
        </div>
        <div class="form-group col-md-12">
        <label for="Username">Name</label>
        <input type="text" class="form-control" name='name' id="Username" placeholder="Username" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
        </div>
        <div class="form-group col-md-6">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name='password' id="Password" placeholder="Password" >
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