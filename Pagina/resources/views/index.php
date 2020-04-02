<?php 
require_once './../shared/sessions.php';
require_once './../shared/header.php'; 
require_once './../shared/db.php'; 
if (isset($_SESSION['user_id'])) {
    header('Location: /privada.php');  
    exit;
}
?>
<h1 class="title">Welcome !</h1>


<?php require_once './../shared/footer.php' ?>
