<?php 
@session_start();
if(isset($_GET["type"])){
    $_SESSION["type"] = $_GET["type"];
}
if(isset($_GET["idProceso"])){
    $_SESSION["idProceso"] = $_GET["idProceso"];
}
if(isset($_GET["idEstudiante"])){
    $_SESSION["idEstudiante"] = $_GET["idEstudiante"];
}
?>
<form action="" method="post" id="step4form">
    <div class="column is-12 is-offset-2 box">
        <h1 class="title is-size-4 has-text-weight-bold">5. Aspectos Generales</h1>
        <hr>
        <label class="label">¿Tiene Hermanos estudiando en la institución?</label>
        <div class="control">
            <label class="radio">
                <input type="radio" name="hermanos_estudiando" value="1" required>
                Sí
            </label>
            <label class="radio">
                <input type="radio" name="hermanos_estudiando" value="2">
                No
            </label>
        </div>
        <div id="hermanos" class="is-hidden">
            <button type="button" class="button is-primary" onclick="addMore()">Agregar Hermano</button>
        </div>
        <div id="tbHermanos">
            <div class="field is-horizontal frmhermano" style="display: none;">
                <div class="field-label is-normal">
                    <label class="label">NIE</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" name="hermano[]" placeholder="NIE">
                        </p>
                    </div>
                    <div class="field">
                        <div class="select">
                            <select name="grado_hermano[]">
                                <option>-- Seleccione Grado --</option>
                                <?php
                                require_once 'config/baseDatos.php';
                                $objBD = new baseDatos();
                                $grados = $objBD->leer("grados","idGrado,grado,seccion");
                                foreach($grados as $g){
                                    echo '<option value="'.$g["idGrado"].'">'.$g["grado"].' '.$g["seccion"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <a class="delete" onclick="closeMe(this)"></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">¿Padece Alguna enfermedad?</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="padece_enfermedad" value="1" required>
                            Sí
                        </label>
                        <label class="radio">
                            <input type="radio" name="padece_enfermedad" value="2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">¿Cuál?</label>
                    <div class="control">
                        <input class="input" type="text" name="enfermedad" placeholder="Enfermedad..." disabled>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">¿Es alérgico a algún medicamento?</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="alergia_medicamento" value="1" required>
                            Sí
                        </label>
                        <label class="radio">
                            <input type="radio" name="alergia_medicamento" value="2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">¿A Cuál?</label>
                    <div class="control">
                        <input class="input" type="text" name="alergia" placeholder="Alergia..." disabled>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">¿Ha tenido COVID-19?</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="tenido_covid" value="1" required>
                            Sí
                        </label>
                        <label class="radio">
                            <input type="radio" name="tenido_covid" value="2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">¿Se realizó la prueba para confirmarlo?</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="prueba_covid" value="1" required>
                            Sí
                        </label>
                        <label class="radio">
                            <input type="radio" name="prueba_covid" value="2">
                            No
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="column is-12 is-offset-2 box">
        <h1 class="title is-size-4 has-text-weight-bold">6. Contacto de Familiares o Responsable</h1>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Nombre de la Madre</label>
                    <div class="control">
                        <input class="input" type="text" name="nombre_completo[]">
                        <input class="input" type="hidden" name="rol[]" value="1">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Ocupación</label>
                    <div class="control">
                        <input class="input" type="text" name="ocupacion[]">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Teléfono</label>
                    <div class="control">
                        <input class="input" type="text" name="telefono[]">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">DUI</label>
                    <div class="control">
                        <input class="input" type="text" name="dui[]">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Nombre del Padre</label>
                    <div class="control">
                        <input class="input" type="text" name="nombre_completo[]">
                        <input class="input" type="hidden" name="rol[]" value="2">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Ocupación</label>
                    <div class="control">
                        <input class="input" type="text" name="ocupacion[]">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Teléfono</label>
                    <div class="control">
                        <input class="input" type="text" name="telefono[]">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">DUI</label>
                    <div class="control">
                        <input class="input" type="text" name="dui[]">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Nombre del Responsable</label>
                    <div class="control">
                        <input class="input" type="text" name="nombre_completo[]" required>
                        <input class="input" type="hidden" name="rol[]" value="3">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Ocupación</label>
                    <div class="control">
                        <input class="input" type="text" name="ocupacion[]" required>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Teléfono</label>
                    <div class="control">
                        <input class="input" type="text" name="telefono[]" required>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">DUI</label>
                    <div class="control">
                        <input class="input" type="text" name="dui[]" required>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column is-12">
                <p class="buttons is-right">
                    <button type="submit" name="send" id="send" class="button is-large is-success">
                        <span>Continuar</span>
                        <span class="icon is-small">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </button>
                </p>
            </div>
        </div>
    </div>
</form>
<script src="/assets/js/step4.js"></script>
