<?php
@session_start();
require 'config/baseDatos.php';
$objBD = new baseDatos();
if($_SESSION["type"] == 1){
    $tipo = "nuevo";
}elseif($_SESSION["type"] == 2){
    $tipo = "antiguo";
}else{
    $tipo = "nocturna";
}
$gradosDisp = $objBD->consulta_personalizada("SELECT DISTINCT idGrado,grado,seccion FROM grados");
foreach($gradosDisp as $gd){
    echo '<option value="'.$gd["idGrado"].'">'.$gd["grado"].' - '.$gd["seccion"].'</option>';
}
?>