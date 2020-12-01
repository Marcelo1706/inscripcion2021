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
<form action="" method="post" id="step3form">
    <div class="column is-12 is-offset-2 box">
        <h1 class="title is-size-4 has-text-weight-bold">3. Datos Académicos</h1>
        <hr>
        <div class="columns">
            <div class="column is-4">
                <label class="label">¿Estudió Parvularia?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="estudio_parvularia" value="1" required>
                        Sí
                    </label>
                    <label class="radio">
                        <input type="radio" name="estudio_parvularia" value="2">
                        No
                    </label>
                </div>
            </div>
            <div class="column is-4">
                <label class="label">¿Repite Grado?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="repite_grado" value="1" required>
                        Sí
                    </label>
                    <label class="radio">
                        <input type="radio" name="repite_grado" value="2">
                        No
                    </label>
                </div>
            </div>
            <div class="column is-4">
                <label class="label">Último Año de Estudio:</label>
                <div class="control">
                    <div class="select">
                        <select name="ultimo_anyo" required>
                            <option value="">-- Seleccione Uno --</option>
                            <option value="2020" selected>2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-12">
                <div class="field">
                    <label class="label">Institución donde estudió el Año Anterior</label>
                    <div class="control">
                        <input class="input" name="institucion" type="text">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-12">
                <div class="field">
                    <label class="label">Grado a Matricular en el 2021:</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="grado_matricular" id="grado_matricular" required>
                                <option value="1">Parvularia 5</option>
                                <option value="3">Parvularia 6</option>
                                <option value="5">1° Grado</option>
                                <option value="8">2° Grado</option>
                                <option value="13">3° Grado</option>
                                <option value="17">4° Grado</option>
                                <option value="21">5° Grado</option>
                                <option value="25">6° Grado</option>
                                <option value="29">7° Grado</option>
                                <option value="33">8° Grado</option>
                                <option value="37">9° Grado</option>
                                <option value="41">1° Año Bachillerato General</option>
                                <option value="42">1° Año Bachillerato Técnico Administrativo Contable</option>
                                <option value="43">1° Año Bachillerato Técnico en Patrimonio Cultural</option>
                                <option value="44">2° Año Bachillerato General</option>
                                <option value="45">2° Año Bachillerato Técnico Administrativo Contable</option>
                                <option value="46">2° Año Bachillerato Técnico en Patrimonio Cultural</option>
                                <option value="47">3° Año Bachillerato Técnico Administrativo Contable</option>
                                <option value="48">3° Año Bachillerato Técnico en Patrimonio Cultural</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="column is-12 is-offset-2 box">
        <h1 class="title is-size-4 has-text-weight-bold">4. Información sobre Conectividad</h1>
        <hr>
        <div class="columns">
            <div class="column is-6">
                <label class="label">¿Tiene acceso a Internet?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="acceso_internet" value="1" required>
                        Sí
                    </label>
                    <label class="radio">
                        <input type="radio" name="acceso_internet" value="2">
                        No
                    </label>
                </div>
            </div>
            <div class="column is-6">
                <label class="label">¿Sabe Utilizar los recursos tecnológicos?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="usar_recursos" value="1" required>
                        Sí
                    </label>
                    <label class="radio">
                        <input type="radio" name="usar_recursos" value="2">
                        No
                    </label>
                </div>
            </div>
        </div>
        <label class="label">¿Qué dispositivos con acceso a internet posee? Marque todos los que correspondan</label>
        <div class="columns">
            <div class="column"><label class="checkbox"><input class="disp" type="checkbox" name="dispositivos[]" value="ninguno"> Ninguno</label></div>
            <div class="column"><label class="checkbox"><input class="disp" type="checkbox" name="dispositivos[]" value="smartphone"> Teléfono Inteligente</label></div>
            <div class="column"><label class="checkbox"><input class="disp" type="checkbox" name="dispositivos[]" value="tablet"> Tablet</label></div>
            <div class="column"><label class="checkbox"><input class="disp" type="checkbox" name="dispositivos[]" value="computadora"> Computadora (Laptop o de escritorio)</label></div>
        </div>
        <label class="label">¿Qué tipo de Internet posee?</label>
        <div class="columns">
            <div class="column">
                <div class="control"><label class="radio"><input type="radio" name="tipo_internet" value="1" required> Ninguno</label></div>
            </div>
            <div class="column">
                <div class="control"><label class="radio"><input type="radio" name="tipo_internet" value="2"> Residencial (WiFi)</label></div>
            </div>
            <div class="column">
                <div class="control"><label class="radio"><input type="radio" name="tipo_internet" value="3"> Plan Pospago (Mensual)</label></div>
            </div>
            <div class="column">
                <div class="control"><label class="radio"><input type="radio" name="tipo_internet" value="4"> Por recargas o paquetes</label></div>
            </div>
        </div>
        <label class="label">¿Cuáles de las siguientes plataformas educativas conoce y sabe utilizar? Marque todas las que correspondan</label>
        <div class="columns">
            <div class="column"><label class="checkbox"><input type="checkbox" class="plat_edu" name="plataformas_educativas[]" value="ninguna"> Ninguna</label></div>
            <div class="column"><label class="checkbox"><input type="checkbox" class="plat_edu" name="plataformas_educativas[]" value="classroom"> Google Classroom</label></div>
            <div class="column"><label class="checkbox"><input type="checkbox" class="plat_edu" name="plataformas_educativas[]" value="meet"></label> Google Meet</div>
            <div class="column"><label class="checkbox"><input type="checkbox" class="plat_edu" name="plataformas_educativas[]" value="zoom"></label> Zoom</div>
            <div class="column"><label class="checkbox"><input type="checkbox" class="plat_edu" name="plataformas_educativas[]" value="skype"></label> Skype</div>
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
<script src="/assets/js/step3_nuevos.js"></script>