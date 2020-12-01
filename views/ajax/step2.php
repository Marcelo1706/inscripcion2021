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

if($tipo == "nuevo"){
    $otra_discapacidad = isset($_POST["otra_discapacidad"]) ? $_POST["otra_discapacidad"] : null;
    $otra_actividad = isset($_POST["otra_actividad"]) ? $_POST["otra_actividad"] : null;
    $dat_per = $objBD->insertar("datos_personales",[
        "tipo_discapacidad" => $_POST["tipo_discapacidad"],
        "otra_discapacidad" => $otra_discapacidad,
        "servicio_apoyo" => $_POST["servicio_apoyo"],
        "actividad_laboral" => $_POST["actividad_laboral"],
        "otra_actividad" => $otra_actividad,
        "convivencia_familiar" => $_POST["convivencia_familiar"],
        "idProceso" => $idProceso
    ]);
    if($dat_per > 0){
        $objBD->actualizar("proceso_inscripcion",["step" => 2],["id" => $idProceso]);
        echo "success";
    }else{
        echo "Error al insertar datos Personales";
    }
}else{
    $otra_discapacidad = isset($_POST["otra_discapacidad"]) ? $_POST["otra_discapacidad"] : null;
    $otra_actividad = isset($_POST["otra_actividad"]) ? $_POST["otra_actividad"] : null;
    $dat_per = $objBD->insertar("datos_personales",[
        "tipo_discapacidad" => $_POST["tipo_discapacidad"],
        "otra_discapacidad" => $otra_discapacidad,
        "servicio_apoyo" => $_POST["servicio_apoyo"],
        "actividad_laboral" => $_POST["actividad_laboral"],
        "otra_actividad" => $otra_actividad,
        "convivencia_familiar" => $_POST["convivencia_familiar"],
        "idProceso" => $idProceso
    ]);
    if($dat_per > 0){
        $objBD->actualizar("proceso_inscripcion",["step" => 2],["id" => $idProceso]);
        echo "success";
    }else{
        echo "Error al insertar datos Personales";
    }
}
?>