<div class="column is-12 is-offset-2 box">
    <h1 class="title is-size-4 has-text-weight-bold">1. Información del Estudiante</h1>
    <form action="" method="post" id="step1form">
        <div class="columns">
            <div class="column is-6">
                <label class="label">NIE</label>
                <div class="field is-grouped">
                    <div class="control is-fullwidth">
                        <input id="nie" name="nie" class="input" type="text" placeholder="NIE" maxlength="8">
                    </div>
                    <p class="control buttons">
                        <button type="button" class="button is-info" id="buscar-nie">Buscar</button>
                        <button type="button" class="button is-primary" id="no-nie">No tengo NIE</button>
                    </p>
                </div>
            </div>
            <div class="divider is-vertical">Y</div>
            <div class="column is-6">
                <label class="label">DUI (Solo si es mayor de Edad)</label>
                <div class="field is-grouped">
                    <div class="control is-fullwidth">
                        <input id="dui" name="dui" class="input" type="text" placeholder="DUI" maxlength="10">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div id="mensaje-error" class="is-hidden">
            <div class="message is-danger">
                <div class="message-body">
                    <p id="error-text"></p>
                </div>
            </div>
        </div>
        <div id="mensaje-warning" class="is-hidden">
            <div class="message is-warning">
                <div class="message-body">
                    <p id="error-text">Estudiante no encontrado, se procederá a crear uno nuevo</p>
                </div>
            </div>
        </div>
        <div id="seccion-nombre" class="is-hidden">
            <div class="columns">
                <div class="column is-12">
                    <label class="label">Nombre Completo del Alumno/a (Según Partida de Nacimiento)</label>    
                </div>
            </div>
            <div class="columns">
                <div class="column is-3">
                    <label class="label">Primer Nombre</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <input id="pnombre" name="pnombre" class="input" type="text" placeholder="Primer Nombre" maxlength="20" required>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <label class="label">Segundo Nombre</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <input id="snombre" name="snombre" class="input" type="text" placeholder="Segundo Nombre" maxlength="20" required>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <label class="label">Primer Apellido</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <input id="papellido" name="papellido" class="input" type="text" placeholder="Primer Apellido" maxlength="20" required>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <label class="label">Segundo Apellido</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <input id="sapellido" name="sapellido" class="input" type="text" placeholder="Segundo Apellido" maxlength="20" required>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column is-6">
                    <label class="label">Género</label>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="genero" value="1" required>
                                Masculino
                            </label>
                            <label class="radio">
                                <input type="radio" name="genero" value="2" >
                                Femenino
                            </label>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <label class="label">Fecha de Nacimiento</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <input name="fecha_nacimiento" id="fecha_nacimiento" class="input" type="date" required>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column is-6">
                    <label class="label">Dirección Completa</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <textarea id="direccion" name="direccion" class="textarea" rows="8" placeholder="Dirección" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <label class="label">Departamento</label>
                    <div class="field">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select id="departamento" name="departamento" required></select>
                            </div>
                        </div>
                    </div>
                    <label class="label">Municipio</label>
                    <div class="field">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select disabled id="municipio" name="municipio" required>
                                    <option value="">-- Seleccione Uno --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="label">Zona de Residencia</label>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="zona_residencia" value="1" required >
                                Urbana
                            </label>
                            <label class="radio">
                                <input type="radio" name="zona_residencia" value="2">
                                Rural
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column is-6">
                    <label class="label">Teléfono de Contacto</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <input name="telefono" id="telefono" class="input" type="text" placeholder="7012-3456" maxlength="8" required>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <label class="label">Correo Electrónico</label>
                    <div class="field">
                        <div class="control is-fullwidth">
                            <input name="correo" id="correo" class="input" type="email" placeholder="alguien@ejemplo.com" maxlength="255" required>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="/assets/js/step1_nocturna.js"></script>
</div>