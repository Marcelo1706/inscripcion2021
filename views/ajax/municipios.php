<?php
require 'config/baseDatos.php';
$objBD = new baseDatos();

$municipios = $objBD->leer("municipios","*",["idDepartamento" => $_POST["departamento"]]);
echo '<option value="0">-- Seleccione Uno --</option>';
foreach($municipios as $mun){
    echo '<option value="'.$mun["id"].'">'.$mun["nombre"].'</option>';
}
?>