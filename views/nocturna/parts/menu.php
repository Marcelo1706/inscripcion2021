<?php 
if(isset($_SESSION["type"])){
    if($_SESSION["type"] == 1)
        header("location: https://www.inscripcionmonterrosa.info/nuevoingreso/panel");
    elseif($_SESSION["type"] == 2)
        header("location: https://www.inscripcionmonterrosa.info/antiguoingreso/panel");
}else{
    header("location: https://www.inscripcionmonterrosa.info");
}
?>
<nav class="navbar is-info  is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://www.inscripcionmonterrosa.info/nuevoingreso/panel">
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
            <a class="navbar-item" href="https://www.inscripcionmonterrosa.info/antiguoingreso/panel">
                <b>Complejo Educativo "Profesor Martín Romeo Monterrosa Rodríguez"</b>
            </a>

        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-primary" href="https://www.inscripcionmonterrosa.info/logout">
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
<h1 class="title is-size-3 has-text-weight-bold has-text-centered"><br><br>Proceso de Inscripción 2021 - Educación Nocturna
</h1>
<div class="wrapper">
    <div class="columns">
        <div class="column is-3" id="side-panel">
            <nav class="panel">
                <p class="panel-heading">Inscripción 2021</p>
                <a href="panel" class="panel-block <?= $active == 1 ? 'is-active' : '' ?>">
                    <span class="panel-icon">
                        <i class="fas fa-home" aria-hidden="true"></i>
                    </span>
                    Inicio
                </a>
                <a href="aplicar" class="panel-block <?= $active == 2 ? 'is-active' : '' ?>">
                    <span class="panel-icon">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                    </span>
                    Aplicar Inscripción
                </a>
                <a href="procesos" class="panel-block <?= $active == 3 ? 'is-active' : '' ?>">
                    <span class="panel-icon">
                        <i class="fas fa-list-ul" aria-hidden="true"></i>
                    </span>
                    Mis Procesos
                </a>
                <a href="faq" class="panel-block <?= $active == 4 ? 'is-active' : '' ?>">
                    <span class="panel-icon">
                        <i class="fas fa-question-circle" aria-hidden="true"></i>
                    </span>
                    Preguntas Frecuentes
                </a>
            </nav>
        </div>
        <div class="column is-9">