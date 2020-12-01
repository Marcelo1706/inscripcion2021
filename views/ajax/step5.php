<?php
@session_start();
require 'config/baseDatos.php';
$objBD = new baseDatos();
$idProceso = $_SESSION["idProceso"];
if($_SESSION["type"] == 1){
    $tipo = "nuevo";
}elseif($_SESSION["type"] == 2){
    $tipo = "antiguo";
}else{
    $tipo = "nocturna";
}

$objBD->actualizar("proceso_inscripcion",["step" => 5, "estado" => 2],["id" => $idProceso]);
$objBD->actualizar("estudiantes_".$tipo,["inscrito" => 1],["idEstudiante" => $_SESSION["idEstudiante"]]);
$actualizar_repitente = $objBD->actualizar("usuarios",["procesoRepetidor" => 0],["id" => $_SESSION["usuario"]]);
echo "success";