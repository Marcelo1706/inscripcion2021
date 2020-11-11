<?php $active = 1; require 'parts/menu.php'; ?>
<section class="hero is-light is-medium">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                Bienvenido al Proceso de Inscripción en Línea 2021
            </h1>
            <h2 class="subtitle">
                Desde aquí puede inscribir a los estudiantes, y verificar el estado de las aplicaciones
                <?= var_dump($_SESSION) ?>
            </h2>
        </div>
    </div>
</section>
<?php require 'parts/footer.php'; ?>
