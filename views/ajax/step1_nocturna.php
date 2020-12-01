<?php
@session_start();
require 'config/baseDatos.php';
$objBD = new baseDatos();

$idUsuario = $_SESSION["usuario"];
if($_SESSION["type"] == 1){
    $tipo = "nuevo";
}elseif($_SESSION["type"] == 2){
    $tipo = "antiguo";
}else{
    $tipo = "nocturna";
}

$estudiantes = $objBD->leer("estudiantes_".$tipo,"idEstudiante",["nie" => $_POST["nie"]]);
if(count($estudiantes) > 0){
    $dui = isset($_POST["dui"]) ? $_POST["dui"] : null;
    $idEstudiante = $objBD->leer("estudiantes_".$tipo,"idEstudiante",["nie" => $_POST["nie"]])[0]["idEstudiante"];
    if($dui != null){
        $act_est = $objBD->actualizar("estudiantes_".$tipo,["dui" => $dui],["idEstudiante" => $idEstudiante]);
    }
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
}else{
    $dui = isset($_POST["dui"]) ? $_POST["dui"] : null;
    $ins_est = $objBD->insertar("estudiantes_".$tipo,[
        "nie" => $_POST["nie"],
        "dui" => $dui,
        "pnombre" => $_POST["pnombre"],
        "snombre" => $_POST["snombre"],
        "papellido" => $_POST["papellido"],
        "sapellido" => $_POST["sapellido"],
        "inscrito" => 0,
        "grado" => 0
    ]);
    if($ins_est > 0){
        $idEstudiante = $objBD->dbh->lastInsertId();
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
}
?>