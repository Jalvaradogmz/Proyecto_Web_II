<?php 
require_once './shared/db.php';
require_once './shared/sessions.php';
require_once './shared/guard.php';
require_once './shared/header.php';
$datos=$con->runQuery('SELECT phone,street,city,website,github,lenguaje FROM user_information where email=$1',[$_SESSION['user_email']]); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Phone=$_POST['phone']??'';
    $Street=$_POST['street']??'';
    $City=$_POST['city']??'';
    $Website=$_POST['website']??'';
    $Github=$_POST['github']??'';
    $Lenguaje=$_POST['lenguaje']??'';
    $errors = '';
    $result=$con->runStatement('UPDATE user_information set phone=$1,street=$2,city=$3,website=$4,github=$5,lenguaje=$6 where email=$7',[$Phone,$Street,$City,$Website,$Github,$Lenguaje,$_SESSION['user_email']]);
    if ($result) {
        header('Location: /');
        exit();
    }
 }else{
    $Phone=$datos[0]['phone']??'';
    $Street=$datos[0]['street']??'';
    $City=$datos[0]['city']??'';
    $Website=$datos[0]['website']??'';
    $Github=$datos[0]['github']??'';
    $Lenguaje=$datos[0]['lenguaje']??'';

 }

?>
<h2>Contact</h2>
<form method="POST" action="/Contact.php">
<div class="field">
	<label class="label">Phone</label>
	<div class="control has-icons-left has-icons-right">
		<input required class="input" name="phone" type="tel" placeholder="Phone" value="<?= $Phone ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">Street</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="street" type="text" placeholder="Street" value="<?= $Street ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">City</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="city" type="text" placeholder="City" value="<?= $City ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">Website</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="website" type="text" placeholder="Website " value="<?= $Website ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
	<label class="label">Github</label>
	<div class="control has-icons-left has-icons-right">
		<input class="input" name="github" type="text" placeholder="Github" value="<?= $Github ?? '' ?>">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
<div class="field">
    <label class="label">Lenguaje</label>
    <div class="control has-icons-left has-icons-right">
        <input class="input" name="lenguaje" type="text" placeholder="Lenguaje" value="<?= $Lenguaje ?? '' ?>">
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