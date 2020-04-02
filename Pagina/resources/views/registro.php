<?php 
require_once './shared/db.php';
require_once './shared/sessions.php';
require_once './shared/header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email=$_POST['email']?? '';
        $password = $_POST['password'] ?? '';
        $repassword = $_POST['repassword'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $errors = '';
        $results = $con->runQuery('SELECT * FROM users WHERE email = $1',[$email]);
        if ($email == '' || $password == ''|| $repassword == ''|| $nombre == ''|| $apellidos == '') {
            $errors = 'Falta Informacion Importante';
        }elseif ($results[0]['email']==$email) {
            $errors = 'Email Ya Ha Sido Registrado Por Otro Usuario';
        } elseif ($password!=$repassword) {
            $errors = 'Las Contraseñas no coinciden';
        }else{
            $con->runStatement('INSERT INTO public.users(email,nombre,apellidos,password,cantidad_veces_logueado,registro_informacion)VALUES ($1,$2,$3,md5($4),$5,$6)',[$email,$nombre,$apellidos,$password,0,'false']);
            $con->runStatement('INSERT INTO user_information(email)VALUES ($1)',[$email]);
            header('Location: /');
            exit();
        }
    }
?>



<form method="POST" action="/registro.php">
<h1 class="title">Registro</h1>
<p class="help is-danger"><?= $errors ?? '' ?></p>
<div class="field">
	<label class="label">Nombre</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="nombre" type="text" placeholder="Nombre" value="<?= $nombre ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">Apellidos</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="apellidos" type="text" placeholder="Apellidos" value="<?= $apellidos ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
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
	<label class="label">Contraseña</label>
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
<div class="field">
	<label class="label">Repita la Contraseña</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="repassword" type="password" placeholder="Password input" value="">
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
</div>
</form>
<?php require_once './shared/footer.php' ?>