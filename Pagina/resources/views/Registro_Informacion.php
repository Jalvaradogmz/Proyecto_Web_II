<?php 
require_once './shared/db.php';
require_once './shared/sessions.php';
require_once './shared/guard.php';
require_once './shared/header.php';
$datos=$con->runQuery('SELECT email,informacion,position,day_of_birth,place_of_birth,perfil_photo FROM user_information where email=$1',[$_SESSION['user_email']]); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $foto=$datos[0]['perfil_photo'];
    if($_FILES['archivo']['tmp_name']){
        $ruta="images";
        $archivo=$_FILES['archivo']['tmp_name'];
        $nombreArchivo=$_FILES['archivo']['name'];
        $arrayNombre=explode(".",$nombreArchivo);
        $extension=end($arrayNombre);
        if($extension){
            $nombreArchivo=$_SESSION['user_id'].".".$extension;
        }
        $ruta=$ruta."/".$nombreArchivo;
        move_uploaded_file($archivo, $ruta);
        $foto=$ruta;
        }
   
        $email=$_SESSION['user_email'];
        $nombre = $_POST['nombre'] ?? '';
        $about = $_POST['about'] ?? '';
        $position = $_POST['position'] ?? '';
        $birth = $_POST['birth'] ?? '';
        $place_of_birth = $_POST['place_of_birth'] ?? '';
        $errors = '';
        $result=$con->runStatement('UPDATE user_information set email=$1,nombre=$2,informacion=$3,position=$4,day_of_birth=$5,place_of_birth=$6,apellidos=$7,perfil_photo=$8 where email=$9',[$email,$nombre,$about,$position,$birth,$place_of_birth,$_SESSION['user_apellidos'],$foto,$_SESSION['user_email']]);
        if ($result) {
        	header('Location: /Experience.php');
            exit();
        }
 }else{
 	$nombre=$_SESSION['user_name']??'';
 	$apellidos=$_SESSION['user_apellidos']??'';
 	$email=$datos[0]['email']??'';
 	$about=$datos[0]['informacion']??'';
 	$position=$datos[0]['position']??'';
 	$birth=$datos[0]['day_of_birth']??'';
 	$place_of_birth=$datos[0]['place_of_birth']??'';
    $foto=$datos[0]['perfil_photo']??'';

 }

?>
<h2>Registro de Informacion de Usuario</h2>
<form method="POST" action="/Registro_Informacion.php" enctype="multipart/form-data">
    <p><img class="circle" style="width: 300px; height: 300px; border-radius: 50%; object-fit: cover;" src="<?= $datos[0]['perfil_photo']?>"></p>
    Añadir imagen: <input name="archivo" id="archivo" type="file"/>
    
    <div class="field">
	<label class="label">Nombre</label>
	<div class="control has-icons-left has-icons-right">
		<input readonly class="input" name="nombre" type="text" placeholder="Nombre" value="<?= $nombre." ".$apellidos ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">About</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="about" type="text" placeholder="Sobre mi" value="<?= $about ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">Position</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="position" type="text" placeholder="Position" value="<?= $position ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">Birth</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="birth" type="date" placeholder="Day of " value="<?= $birth ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">Place of birth</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="place_of_birth" type="text" placeholder="Place Of Birth" value="<?= $place_of_birth ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field is-grouped">
    <div class="control">
        <button type="submit" name="Aceptar" class="button is-link">Continuar</button>
    </div>
    <div class="control">
        <button type="button" name="Cancelar" class="button is-link is-light" onClick="location.href='/'">Cancel</button>
    </div>
</div>
</form>
<?php require_once './shared/footer.php' ?>