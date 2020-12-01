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
<form action="" method="post" id="datos_personales">
    <div class="column is-12 is-offset-2 box">
        <h1 class="title is-size-4 has-text-weight-bold">7. Fotografía del Estudiante</h1>
        <div class="content">
            <b>Requisitos:</b>
            <ul>
                <li>Debe ser una foto SOLO del rostro, sin filtros, sin accesorios</li>
                <li>Debe de ser un archivo de imagen válido</li>
                <li>La Fotografía no puede pesar más de 2MB</li>
            </ul>
        </div>

        <div class="columns is-mobile is-centered">
            <div class="column box is-2">
                <figure class="image is-128x128">
                    <img id="preview_img" src="/assets/images/user.png">
                </figure>
            </div>
        </div>
        <br>
        <div class="field">
            <div class="file is-boxed is-centered">
                <label class="file-label">
                    <input class="file-input" type="file" name="file" id="foto_perfil" accept="image/*">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Subir Fotografía
                        </span>
                    </span>
                </label>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column is-12">
                <p class="buttons is-centered">
                    <button type="submit" name="send" id="send" class="button is-large is-success" disabled>
                        <span>Finalizar Aplicación</span>
                        <span class="icon is-small">
                            <i class="fas fa-check-circle"></i>
                        </span>
                    </button>
                </p>
            </div>
        </div>
    </div>
    
</form>
<script src="/assets/js/step5.js"></script>