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
$idEstudiante = $objBD->leer("proceso_inscripcion","idEstudiante",["id" => $_SESSION["idProceso"], "tipo" => $tipo])[0]["idEstudiante"];
$gradoActual = $objBD->leer("estudiantes_nocturna","grado",["idEstudiante" => $idEstudiante])[0]["grado"];
$datosGrado = $objBD->leer("grados","*",["idGrado" => $gradoActual]);

if(count($datosGrado) > 0){
    $gradosDisp = $objBD->leer("grados","*",["orden" => $datosGrado[0]["orden"]+1, "turno" => "Nocturno"]);
    foreach($gradosDisp as $gd){
        echo '<option value="'.$gd["idGrado"].'">'.$gd["grado"].' - '.$gd["seccion"].'</option>';
    }
}else{
    $gradosDisp = $objBD->leer("grados","*",["turno" => "Nocturno"]);
    foreach($gradosDisp as $gd){
        echo '<option value="'.$gd["idGrado"].'">'.$gd["grado"].' - '.$gd["seccion"].'</option>';
    }
}
?>