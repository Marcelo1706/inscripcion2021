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
    $dat_aca = $objBD->insertar("datos_academicos",[
        "estudio_parvularia" => $_POST["estudio_parvularia"],
        "repite_grado" => $_POST["repite_grado"],
        "ultimo_anyo" => $_POST["ultimo_anyo"],
        "institucion" => $_POST["institucion"],
        "grado_matricular" => $_POST["grado_matricular"],
        "idProceso" => $idProceso
    ]);
    if($dat_aca > 0){
        $inf_con = $objBD->insertar("informacion_conectividad", [
            "acceso_internet" => $_POST["acceso_internet"],
            "usar_recursos" => $_POST["usar_recursos"],
            "dispositivos" => json_encode($_POST["dispositivos"]),
            "tipo_internet" => $_POST["tipo_internet"],
            "plataformas_educativas" => json_encode($_POST["plataformas_educativas"]),
            "idProceso" => $idProceso
        ]);
        if($inf_con > 0){
            $objBD->actualizar("proceso_inscripcion",["step" => 3],["id" => $idProceso]);
            echo "success";
        }else{
            echo "No se pudo insertar la información de conectividad";
        }
    }else{
        echo "No se pudo insertar los datos académicos";
    }
}else{
    $dat_aca = $objBD->insertar("datos_academicos",[
        "estudio_parvularia" => $_POST["estudio_parvularia"],
        "repite_grado" => $_POST["repite_grado"],
        "ultimo_anyo" => $_POST["ultimo_anyo"],
        "institucion" => $_POST["institucion"],
        "grado_matricular" => $_POST["grado_matricular"],
        "idProceso" => $idProceso
    ]);
    if($dat_aca > 0){
        $inf_con = $objBD->insertar("informacion_conectividad", [
            "acceso_internet" => $_POST["acceso_internet"],
            "usar_recursos" => $_POST["usar_recursos"],
            "dispositivos" => json_encode($_POST["dispositivos"]),
            "tipo_internet" => $_POST["tipo_internet"],
            "plataformas_educativas" => json_encode($_POST["plataformas_educativas"]),
            "idProceso" => $idProceso
        ]);
        if($inf_con > 0){
            $objBD->actualizar("proceso_inscripcion",["step" => 3],["id" => $idProceso]);
            echo "success";
        }else{
            echo "No se pudo insertar la información de conectividad";
        }
    }else{
        echo "No se pudo insertar los datos académicos";
    }
}
?>