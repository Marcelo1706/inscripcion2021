<?php
require 'config/baseDatos.php';
$objBD = new baseDatos();
$gradoMatricular = $objBD->consulta_personalizada("SELECT grados.idGrado, grados.grado, grados.seccion, grados.turno FROM grados WHERE grados.idGrado = (SELECT datos_academicos.grado_matricular FROM datos_academicos WHERE datos_academicos.idProceso = ".$_POST["idProceso"].")");
if(count($gradoMatricular) > 0){
    if($gradoMatricular[0]["idGrado"] >= 41){
        echo "Bachillerato no puede cambiar de turno";
    }else{
        echo $gradoMatricular[0]["grado"]." ".$gradoMatricular[0]["seccion"]." - Turno ".$gradoMatricular[0]["turno"];
    }
}else{
    echo "No hay datos";
}
?>