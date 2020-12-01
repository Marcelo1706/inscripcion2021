<?php @session_start(); ?>
<?php $active = 3; require 'parts/menu.php'; ?>
<h1 class="title">Solicitud de Cambio de Turno</h1>
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
                        $acciones = 'Finalice la inscripción primero';
                    break;
                    case 2: 
                        $estado = "En revisión";
                        $acciones = "<button class='button is-primary solicitar-cambio' data-id='".$p["id"]."'>Solicitar Cambio de Turno</button>";
                    break;
                    case 3: 
                        $estado = "Con Observaciones";
                        $acciones = "";
                    break;
                    case 4: 
                        $estado = "Aceptada";
                        $acciones = "";
                    break;
                    case 5: 
                        $estado = "No admitida";
                        $acciones = "";
                    break;
                }
                $solicitud = $objBD->leer("solicitud_cambio","*",["idProceso" => $p["id"]]);
                if(count($solicitud) > 0){
                    $st = $solicitud[0]["estado"];
                    if($st == 0){
                        $acciones = "Solicitud de Cambio enviada";
                    }else{
                        $acciones = "Solicitud de Cambio Aceptada";
                    }
                }
                echo "
                <tr>
                    <td><p id='nie'>{$p['nie']}</p></td>
                    <td><p id='estudiante'>{$p['estudiante']}</p></td>
                    <td>{$estado}</td>
                    <td>{$acciones}</td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <script src="/assets/js/cambio_turno.js"></script>
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
<div class="modal" id="modal-cambio">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Solicitar Cambio de Turno</p>
            <button class="delete" aria-label="close" onclick="cambiar_modal()"></button>
        </header>
        <section class="modal-card-body" id="cuerpo-modal">
            <p id="turno"></p>
            <form action="" id="datos-cambio">
                <input type="hidden" name="idProceso" id="idProceso">
                <div class="field">
                    <label for="" class="label">Seleccione el Turno al que desea cambiarse</label>
                    <div class="select is-fullwidth">
                        <select name="turno_cambio" id="turno_cambio">
                            <option value="matutino">Turno Matutino</option>
                            <option value="vespertino">Turno Vespertino</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="estado" value="0">
            </form>
        </section>
        <section class="modal-card-body is-hidden" id="mensaje-error">
            <div class='message is-danger'><div class='message-body'>Bachillerato no puede cambiar de turno</div></div>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-success" id="btn-solicitar">Solicitar Cambio</button>
            <button class="button" onclick="cambiar_modal()">Cancelar</button>
        </footer>
    </div>
</div>