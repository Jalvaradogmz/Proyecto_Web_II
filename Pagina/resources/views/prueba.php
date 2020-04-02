<?php
require_once './shared/sessions.php';
if($_FILES['archivo']['tmp_name']){
          $ruta="images/";
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
?>
<form action="prueba.php" method="POST" enctype="multipart/form-data"/>
Añadir imagen: <input name="archivo" id="archivo" type="file"/>
<input type="submit" name="subir" value="Recargar"/>
</form>