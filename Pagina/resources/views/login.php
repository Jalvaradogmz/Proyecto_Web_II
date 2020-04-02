<?php 
require_once './../shared/db.php';
require_once './../shared/sessions.php';
require_once './../shared/header.php'; 
?>
<h1 class="title">Login</h1>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $errors = '';
        $results = $con->runQuery('SELECT * FROM users WHERE email = $1 and password = md5($2)',[$email,$password]);
        if ($results) {
            $con->runStatement('UPDATE users SET cantidad_veces_logueado=$1 where id=$2',[$results[0]['cantidad_veces_logueado']+=1,$results[0]['id']]);
            $_SESSION['user_id'] = $results[0]['id'];
            $_SESSION['user_email'] = $results[0]['email'];
            $_SESSION['user_name'] = $results[0]['nombre'];
            $_SESSION['user_apellidos'] = $results[0]['apellidos'];
            if ($results[0]['cantidad_veces_logueado']==1) {
                header('Location: /Registro_Informacion.php');
                exit();
            }else{
            header('Location: /');
            exit();}
        }elseif ($email != '' || $password != '') {
            $errors = 'Correo o Contraseña Invalido';
        }
    }
    
 ?>
<form method="POST" name="Aceptar" action="/login.php">
            <p class="help is-danger"><?= $errors ?? '' ?></p>
            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" name="email" type="email" placeholder="Email input" value="<?= $email ?? '' ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" name="password" type="password" placeholder="Password input" value="">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" name="Aceptar" class="button is-link">Ingresar</button>
                </div>
                <div class="control">
                    <button type="button" name="Cancelar" class="button is-link is-light" onClick="location.href='/'">Cancel</button>
                </div>
            </div>
            <p>Si necesita una cuenta:<a href="/registro.php">Registrese aquí</a></p>
        </form>

<?php require_once './../shared/footer.php' ?>