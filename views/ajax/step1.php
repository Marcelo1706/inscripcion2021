<?php
@session_start();
require 'config/baseDatos.php';
$objBD = new baseDatos();

$idUsuario = $_SESSION["usuario"];
$tipo = $_SESSION["type"] == 1 ? "nuevo" : "antiguo";

if($tipo == "nuevo"){

}else{
    $idEstudiante = $objBD->leer("estudiantes_".$tipo,"idEstudiante",["nie" => $_POST["nie"]])[0]["idEstudiante"];
    $_SESSION["idEstudiante"] = $idEstudiante;
    $proceso = $objBD->insertar("proceso_inscripcion",["idUsuario" => $idUsuario, "step" => 1, "estado" => 0, "tipo" => $tipo, "idEstudiante" => $idEstudiante]);
    $lid = $objBD->dbh->lastInsertId();
    if($proceso > 0){
        $inf_est = $objBD->insertar("informacion_estudiante", [
            "direccion" => $_POST["direccion"],
            "genero" => $_POST["genero"],
            "fecha_nacimiento" => $_POST["fecha_nacimiento"],
            "departamento" => $_POST["departamento"],
            "municipio" => $_POST["municipio"],
            "zona_residencia" => $_POST["zona_residencia"],
            "telefono" => $_POST["telefono"],
            "correo_electronico" => $_POST["correo"],
            "idProceso" => $lid
        ]);
        if($inf_est > 0){
            $_SESSION["idProceso"] = $lid;
            echo "success";
        }else{
            echo "Error al insertar Información de Estudiante";
        }
    }else{
        echo "Error al insertar Proceso de Inscripción";
    }
}
?>