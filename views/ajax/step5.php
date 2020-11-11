<?php
@session_start();
require 'config/baseDatos.php';
$objBD = new baseDatos();
$idProceso = $_SESSION["idProceso"];
$tipo = $_SESSION["type"] == 1 ? "nuevo" : "antiguo";

$objBD->actualizar("proceso_inscripcion",["step" => 5, "estado" => 2],["id" => $idProceso]);
$objBD->actualizar("estudiantes_".$tipo,["inscrito" => 1],["idEstudiante" => $_SESSION["idEstudiante"]]);
echo "success";