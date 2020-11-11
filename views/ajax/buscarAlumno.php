<?php
require 'config/baseDatos.php';
$nie = isset($_POST["nie"]) ? $_POST["nie"] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "";
if($nie != "" && $tipo != ""){
    $objBD = new baseDatos();
    $estudiante = $objBD->leer("estudiantes_".$tipo,"*",["nie" => $nie]);
    if(count($estudiante) > 0){
        if($estudiante[0]["inscrito"] != 1){
            $proceso = $objBD->leer("proceso_inscripcion","idEstudiante",["idEstudiante" => $estudiante[0]["idEstudiante"]]);
            if(count($proceso) > 0){
                echo json_encode(["error" => "El estudiante ya tiene un proceso de inscripción abierto<br>Si usted inició el procedimiento, y se cerró por error, puede continuar desde 'Mis Procesos'."]);
            }else{
                echo json_encode($estudiante[0]);
            }
        }else{
            echo json_encode(["error" => "El estudiante ya fue inscrito"]); 
        }
    }else{
        echo json_encode(["error" => "No se encontró a ningún estudiante con ese NIE, revise que esté correcto e intente nuevamente"]);
    }
}else{
    echo json_encode(["error" => "Ingrese un NIE para continuar"]);
}
?>