<?php @session_start(); ?>
<?php $active = 3; require 'parts/menu.php'; ?>
<h1 class="title">Mis Procesos de Inscripción</h1>
<?php
require 'config/baseDatos.php';
$objBD = new baseDatos();
if($_SESSION["type"] == 1){
    $tipo = "nuevo";
}elseif($_SESSION["type"] == 2){
    $tipo = "antiguo";
}else{
    $tipo = "nocturna";
}

$procesos = $objBD->consulta_personalizada("SELECT proceso_inscripcion.id, estudiantes_".$tipo.".nie, CONCAT(estudiantes_".$tipo.".pnombre,' ',estudiantes_".$tipo.".snombre,' ',estudiantes_".$tipo.".papellido,' ',estudiantes_".$tipo.".sapellido) as 'estudiante', proceso_inscripcion.idEstudiante, proceso_inscripcion.estado, proceso_inscripcion.step FROM proceso_inscripcion INNER JOIN estudiantes_".$tipo." ON proceso_inscripcion.idEstudiante = estudiantes_".$tipo.".idEstudiante WHERE proceso_inscripcion.idUsuario = ".$_SESSION["usuario"]);

if(count($procesos) > 0 ){
    ?>
    <table class="table is-bordered is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>NIE</th>
                <th>Estudiante</th>
                <th>Estado de la Inscripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($procesos as $p){
                switch($p["estado"]){
                    case 0: 
                        $estado = "Incompleta";
                        $acciones = '<a class="button is-primary" href="https://www.inscripcionmonterrosa.info/nocturna/aplicar?paso='.($p["step"]+1).'&type=3&idProceso='.($p["id"]).'&idEstudiante='.($p["idEstudiante"]).'">Continuar</a>';
                    break;
                    case 2: 
                        $estado = "En revisión";
                        $acciones = "";
                    break;
                }
                echo "
                <tr>
                    <td>{$p['nie']}</td>
                    <td>{$p['estudiante']}</td>
                    <td>{$estado}</td>
                    <td>{$acciones}</td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <?php
} else {
    ?>
    <div class="message is-success">
        <div class="message-body">
            Aún no ha realizado ningún proceso de inscripción.
        </div>
    </div>
    <?php
}
?>
<h2 class="subtitle is-size-5">Significado de cada estado: </h2>
<table class="table is-bordered is-hoverable is-stripped is-fullwidth">
    <thead>
        <tr>
            <th width="20%">Estado</th>
            <th width="80%">Descripción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Incompleto</td>
            <td>Aún no ha finalizado el proceso de inscripción. Debe Continuar llenándolo para poder aplicar.</td>
        </tr>
        <tr>
            <td>En revisión</td>
            <td>Ya se envió el formulario de inscripción, pero aún falta que la institución lo revise. Si es de antiguo ingreso, significa que ya está inscrito, solo falta revisar la información proporcionada.</td>
        </tr>
        <tr>
            <td>Con Observaciones</td>
            <td>La institución ya revisó su inscripción, pero encontró datos que son necesarios corregir. Realice las correcciones pertinentes.</td>
        </tr>
        <tr>
            <td>Aceptado</td>
            <td>El formulario fue aceptado, y el estudiante ya está completamente inscrito en la institución</td>
        </tr>
        <tr>
            <td>No Admitido</td>
            <td>Desafortunadamente, el estudiante no puede ser inscrito en la institución.</td>
        </tr>
    </tbody>
</table>
<?php require 'parts/footer.php'; ?>