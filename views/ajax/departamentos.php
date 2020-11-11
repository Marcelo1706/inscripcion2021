<?php
require 'config/baseDatos.php';
$objBD = new baseDatos();

$departamentos = $objBD->leer("departamentos","*");
echo '<option value="0">-- Seleccione Uno --</option>';
foreach($departamentos as $dep){
    echo '<option value="'.$dep["id"].'">'.$dep["nombre"].'</option>';
}
?>