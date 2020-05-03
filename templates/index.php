<?php 
require_once 'templates/inc/header.php';

if(isset($_SESSION['msg'])){
    Message::display();
}
require_once 'templates/inc/footer.php';
?>