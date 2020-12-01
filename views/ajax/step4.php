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
    if(isset($_POST["hermano"]) && isset($_POST["grado_hermano"])){
        unset($_POST["hermano"][0]);
        unset($_POST["grado_hermano"][0]);
    }
    
    $grado_hermano = isset($_POST["grado_hermano"]) ? json_encode($_POST["grado_hermano"]) : null; 
    $hermano = isset($_POST["hermano"]) ? json_encode($_POST["hermano"]) : null;
    $enfermedad = isset($_POST["enfermedad"]) ? $_POST["enfermedad"] : null;
    $alergia = isset($_POST["alergia"]) ? $_POST["alergia"] : null;

    $asp_gen = $objBD->insertar("aspectos_generales",[
        "hermano" => $hermano,
        "grado_hermano" => $grado_hermano,
        "padece_enfermedad" => $_POST["padece_enfermedad"],
        "enfermedad" => $enfermedad,
        "alergia_medicamento" => $_POST["alergia_medicamento"],
        "alergia" => $alergia,
        "tenido_covid" => $_POST["tenido_covid"],
        "prueba_covid" => $_POST["prueba_covid"],
        "idProceso" => $idProceso
    ]);
    if($asp_gen > 0){
        $nombres = $_POST["nombre_completo"];
        $ocupaciones = $_POST["ocupacion"];
        $telefonos = $_POST["telefono"];
        $duis = $_POST["dui"];
        $roles = $_POST["rol"];
        $con_fam = 0;

        for($i=0;$i<count($nombres);$i++){
            $con_fam += $objBD->insertar("contactos_familiares",[
                "nombre_completo" => $nombres[$i],
                "rol" => $roles[$i],
                "ocupacion" => $ocupaciones[$i],
                "telefono" => $telefonos[$i],
                "dui" => $duis[$i],
                "idProceso" => $idProceso
            ]);
        }
        if($con_fam == count($nombres)){
            $objBD->actualizar("proceso_inscripcion",["step" => 4],["id" => $idProceso]);
            echo "success";
        }else{
            echo "Fallo al insertar contactos familiares";
        }
    }else{
        echo "Fallo al insertar aspectos generales";
    }
}else{
    if(isset($_POST["hermano"]) && isset($_POST["grado_hermano"])){
        unset($_POST["hermano"][0]);
        unset($_POST["grado_hermano"][0]);
    }
    
    $grado_hermano = isset($_POST["grado_hermano"]) ? json_encode($_POST["grado_hermano"]) : null; 
    $hermano = isset($_POST["hermano"]) ? json_encode($_POST["hermano"]) : null;
    $enfermedad = isset($_POST["enfermedad"]) ? $_POST["enfermedad"] : null;
    $alergia = isset($_POST["alergia"]) ? $_POST["alergia"] : null;

    $asp_gen = $objBD->insertar("aspectos_generales",[
        "hermano" => $hermano,
        "grado_hermano" => $grado_hermano,
        "padece_enfermedad" => $_POST["padece_enfermedad"],
        "enfermedad" => $enfermedad,
        "alergia_medicamento" => $_POST["alergia_medicamento"],
        "alergia" => $alergia,
        "tenido_covid" => $_POST["tenido_covid"],
        "prueba_covid" => $_POST["prueba_covid"],
        "idProceso" => $idProceso
    ]);
    if($asp_gen > 0){
        $nombres = $_POST["nombre_completo"];
        $ocupaciones = $_POST["ocupacion"];
        $telefonos = $_POST["telefono"];
        $duis = $_POST["dui"];
        $roles = $_POST["rol"];
        $con_fam = 0;

        for($i=0;$i<count($nombres);$i++){
            $con_fam += $objBD->insertar("contactos_familiares",[
                "nombre_completo" => $nombres[$i],
                "rol" => $roles[$i],
                "ocupacion" => $ocupaciones[$i],
                "telefono" => $telefonos[$i],
                "dui" => $duis[$i],
                "idProceso" => $idProceso
            ]);
        }
        if($con_fam == count($nombres)){
            $objBD->actualizar("proceso_inscripcion",["step" => 4],["id" => $idProceso]);
            echo "success";
        }else{
            echo "Fallo al insertar contactos familiares";
        }
    }else{
        echo "Fallo al insertar aspectos generales";
    }
}
?>