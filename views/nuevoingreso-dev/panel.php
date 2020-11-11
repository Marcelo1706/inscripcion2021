<?php 
if(isset($_SESSION["type"])){
    if($_SESSION["type"] == 2)
        header("location: https://www.inscripcionmonterrosa.info/antiguoingreso-dev/panel");    
}else{
    header("location: https://www.inscripcionmonterrosa.info");
}
?>
<div class="has-navbar-fixed-top">
    <nav class="navbar is-info  is-fixed-top">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://www.inscripcionmonterrosa.info/nuevoingreso-dev/panel">
                <img src="https://www.inscripcionmonterrosa.info/assets/images/logo_escuela.png" width="28" height="28">
            </a>
            <div class="navbar-burger burger" data-target="navbarPanel">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navbarPanel" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="https://www.inscripcionmonterrosa.info/nuevoingreso-dev/panel">
                    <b>Complejo Educativo "Profesor Martín Romeo Monterrosa Rodríguez"</b>
                </a>

            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button is-primary"
                                href="https://www.inscripcionmonterrosa.info/logout">
                                <span class="icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                <span>Cerrar Sesión</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <h1 class="title is-size-3 has-text-weight-bold has-text-centered"><br><br>Proceso de Inscripción 2021 - Nuevo Ingreso</h1>
</div>