<?php
@session_start();
require 'config/baseDatos.php';
$objBD = new baseDatos();
$idProceso = $_SESSION["idProceso"];

$files = $_FILES;
$has_preview = $_POST["has_preview"];
$folder = $_SERVER["DOCUMENT_ROOT"]."/".$_POST["folder"];
$extensions = json_decode($_POST["extensions"]);
$filename = $files['file']['name'];;
$identifier = $filename;

/* Location */
$location = $folder.$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$new_name = md5($identifier).".".$imageFileType;
$new_path = $folder.md5($identifier).".".$imageFileType;

clearstatcache();
if(file_exists($new_path))
    unlink($new_path);

/* Check file extension */
if(!in_array(strtolower($imageFileType),$extensions) ) {
    $uploadOk = 0;
}

if($uploadOk == 0){
echo 0;
}else{
    /* Upload file */
    if(move_uploaded_file($files['file']['tmp_name'],$new_path)){
        if($has_preview){
            $new_name = "/".$_POST["folder"].$new_name;
            unset($_POST);
            $_SESSION["foto"] = $new_name;

            $objBD->borrar("fotos_aplicacion",["idProceso" => $idProceso]);
            $objBD->insertar("fotos_aplicacion",[
                "ruta" => $_SESSION["foto"],
                "idProceso" => $idProceso
            ]);
            echo $new_name;
        }else
            echo 1;
    }else{
        echo 0;
    }
}
?>