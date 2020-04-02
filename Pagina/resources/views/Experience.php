<?php
//experience
require_once './shared/sessions.php';
require_once './shared/guard.php';
require_once __DIR__ .'/shared/db.php';
require_once __DIR__ . '/shared/header.php';
$results=$con->runQuery('SELECT experience from user_information WHERE email=$1',[$_SESSION['user_email']]);
$contador=1;
$numero_empresa=1;
$array=explode(",",$results[0]['experience']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$texto="";
	$count=1;
	$veces=1;
	foreach ($array as $key) { 
		$var=explode("=",$key);
		if ($count==1) {
			$veces+=1;
		}
		if($count==6){
			$count=0;
		} 
		$count+=1;

		$texto.= $var[0].'='.$_POST[$var[0].($veces-1)].',';
	}
	$Company=$_POST["Company".$_SESSION['last']];
	$Position=$_POST["Position".$_SESSION['last']];
	$TimePeriod=$_POST["TimePeriod".$_SESSION['last']];
	$Description=$_POST["Description".$_SESSION['last']];
	$Website=$_POST["Website".$_SESSION['last']];
	if($Company != ''||$Position!=''||$TimePeriod!=''||$Description!=''||$Website!=''){
		$texto.='Company='.$Company.',Position='.$Position.',TimePeriod='.$TimePeriod.',Description='.$Description.',Website='.$Website;
	}else{
		 $texto = trim($texto, ',=,');
	}
	$con->runStatement('UPDATE user_information set experience=$1 where email=$2',[$texto,$_SESSION['user_email']]);	


	$results=$con->runQuery('SELECT experience from user_information WHERE email=$1',[$_SESSION['user_email']]);
	$array=explode(",",$results[0]['experience']);
}

?>
<h2>Experience</h2>
<form method="POST" action="/Experience.php">
<?php
if($results&&$datos[0]['experience']){
	foreach ($array as $key) { 
	$var=explode("=",$key);
	if ($contador==1) {
		echo"<h5>#.$numero_empresa</h5>";
		$numero_empresa+=1;
	}
	
	if ($contador==6) {

		$contador=0;
	}
	$contador+=1;
	?>
	<div class="field">
		<label class="label"><?= $var[0]?></label>
		<div class="control has-icons-left has-icons-right">
			<input class="input" name='<?= $var[0].($numero_empresa-1)?>' type="text" placeholder="<?= $var[0]?>" value="<?= $var[1] ?? '' ?>">
        	<span class="icon is-small is-right">
        		<i class="fas fa-exclamation-triangle"></i>
        	</span>
    	</div>
	</div>

<?php }

}
echo"<h5>#.$numero_empresa</h5>";
	$lista = "Company,Position,TimePeriod,Description,Website";
	foreach (explode(",",$lista) as $key) {
	  	?> <div class="field">
			<label class="label"><?= $key?></label>
		<div class="control has-icons-left has-icons-right">
		<input class="input" name="<?= $key.$numero_empresa?>" type="text" placeholder="" value="">
        <span class="icon is-small is-right">
        	<i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>
		<?php
}
$_SESSION['last']=$numero_empresa;
?>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" name="Aceptar" class="button is-link is-light">Agregar</button>
    </div>
    <div class="control">
        <button type="button" name="Cancelar" class="button is-link is-light" onClick="location.href='/'">Cancel</button>
    </div>
    <div class="control">
        <button type="button" name="Cancelar" class="button is-link " onClick="location.href='/Education.php'">Siguiente</button>
    </div>
</div>
</form>

<?php require_once __DIR__ . '/shared/footer.php';?>