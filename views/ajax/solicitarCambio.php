<?php
require 'config/baseDatos.php';
$objBD = new baseDatos();
$insert = $objBD->insertar("solicitud_cambio",[
    "idProceso" => $_POST["idProceso"],
    "turno_cambio" => $_POST["turno_cambio"],
    "estado" => $_POST["estado"]
]);

if($insert > 0){
    echo "success";
}else{
    echo "No se pudo solicitar el cambio de turno";
}
?>