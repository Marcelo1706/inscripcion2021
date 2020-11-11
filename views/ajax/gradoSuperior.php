<?php
@session_start();
require 'config/baseDatos.php';
$objBD = new baseDatos();
$tipo = $_SESSION["type"] == 1 ? "nuevo" : "antiguo";
$idEstudiante = $objBD->leer("proceso_inscripcion","idEstudiante",["id" => $_SESSION["idProceso"], "tipo" => $tipo])[0]["idEstudiante"];
$gradoActual = $objBD->leer("estudiantes_antiguo","grado",["idEstudiante" => $idEstudiante])[0]["grado"];
$datosGrado = $objBD->leer("grados","*",["idGrado" => $gradoActual])[0];

if($datosGrado["orden"] == "11"){
    //Mostrar todos los de bachillerato
    $gradosDisp = $objBD->leer("grados","*",["orden" => 12]);
    foreach($gradosDisp as $gd){
        echo '<option value="'.$gd["idGrado"].'">'.$gd["grado"].' -'.$gd["seccion"].'</option>';
    }
}elseif($datosGrado["orden"] == "13" && $datosGrado["seccion"] == "General"){
    echo "no_grade";
}elseif(($datosGrado["orden"] == "14" && $datosGrado["seccion"] == "Técnico Administrativo Contable") || ($datosGrado["orden"] == "14" && $datosGrado["seccion"] == "Técnico en Patrimonio Cultural") ){
    echo "no_grade";
}elseif($datosGrado["orden"] == "2"){
    $gradosDisp = $objBD->leer("grados","*",["orden" => $datosGrado["orden"]+1, "turno" => $datosGrado["turno"]]);
    foreach($gradosDisp as $gd){
        echo '<option value="'.$gd["idGrado"].'">'.$gd["grado"].' - '.$gd["seccion"].'</option>';
    }
}else{
    $gradosDisp = $objBD->leer("grados","*",["orden" => $datosGrado["orden"]+1, "seccion" => $datosGrado["seccion"]]);
    foreach($gradosDisp as $gd){
        echo '<option value="'.$gd["idGrado"].'">'.$gd["grado"].' - '.$gd["seccion"].'</option>';
    }
}
?>