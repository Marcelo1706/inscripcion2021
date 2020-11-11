<?php @session_start(); ?>
<?php $active = 3; require 'parts/menu.php'; ?>
<h1 class="title">Mis Procesos de Inscripción</h1>
<?php
require 'config/baseDatos.php';
$objBD = new baseDatos();
$tipo = $_SESSION["type"] == 1 ? "nuevo" : "antiguo";

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
                        $acciones = '<a class="button is-primary" href="https://www.inscripcionmonterrosa.info/antiguoingreso/aplicar?paso='.($p["step"]+1).'&type=2&idProceso='.($p["id"]).'&idEstudiante='.($p["idEstudiante"]).'">Continuar</a>';
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

require 'parts/footer.php'; ?>