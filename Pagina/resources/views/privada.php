<?php 
require_once './../shared/sessions.php';
require_once './../shared/header.php'; 
require_once './../shared/db.php';
require_once './../shared/guard.php';
?>
<h1 class="title">Bienvenido <?= $_SESSION['user_name']?>!!</h1>

<?php require_once './../shared/footer.php' ?>