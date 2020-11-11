<?php
if(isset($_SESSION["type"])){
    if($_SESSION["type"] == 1)
        header("location: https://www.inscripcionmonterrosa.info/nuevoingreso/panel");
    else
        header("location: https://www.inscripcionmonterrosa.info/antiguoingreso/panel");
}
require 'config/baseDatos.php';

?>
<section class="hero is-info is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-mobile is-centered">
                <div class="column is-10-desktop is-6-tablet is-four-fifths-mobile">
                    <div class="box">
                        <div class="columns is-centered is-vcentered">
                            <div class="column is-one-fifth is-hidden-mobile">
                                <figure class="image is-96x96">
                                    <img src="https://www.inscripcionmonterrosa.info//assets/images/logo_escuela.png"
                                        alt="Logo Escuela">
                                </figure>
                            </div>
                            <div class="column is-three-fifths">
                                <h1 class="title is-4 has-text-black has-text-centered">Complejo Educativo<br>"Profesor
                                    Martín Romeo Monterrosa Rodríguez"</h1>
                                <h1 class="title is-3 has-text-black has-text-centered">Proceso de Inscripción 2021</h1>
                            </div>
                            <div class="column is-one-fifth is-hidden-mobile">
                                <figure class="image">
                                    <img src="https://www.inscripcionmonterrosa.info//assets/images/logo_mined.jpg"
                                        alt="Logo Escuela">
                                </figure>
                            </div>
                        </div>
                        <hr>
                        <p class="has-text-centered is-size-5 has-text-dark has-text-weight-bold">Inicio de Sesión</p>
                        <?php
                        if(isset($_POST["enviar"])){
                            if($_POST["mail"] != "" && $_POST["pass"] != ""){
                                $objBD = new baseDatos();
                                $registro = $objBD->leer("usuarios","id,correo,password,type",["correo" => $_POST["mail"]]);
                                if(count($registro) > 0){
                                    if(md5($_POST["pass"]) == $registro[0]["password"]){
                                        $type = $registro[0]["type"];
                                        if($type == "1"){
                                            $_SESSION["type"] = 1;
                                            $_SESSION["usuario"] = $registro[0]["id"];
                                            $_SESSION["correo"] = $_POST["mail"];
                                            header("location: https://www.inscripcionmonterrosa.info/nuevoingreso/panel");
                                        }else{
                                            $_SESSION["type"] = 2;
                                            $_SESSION["usuario"] = $registro[0]["id"];
                                            $_SESSION["correo"] = $_POST["mail"];
                                            header("location: https://www.inscripcionmonterrosa.info/antiguoingreso/panel");
                                        }
                                    }else{
                                        ?>
                                        <div class="message is-danger">
                                            <div class="message-body">
                                                <b>Contraseña Incorrecta</b>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <div class="message is-danger">
                                        <div class="message-body">
                                            <b>No existe un usuario con ese correo</b>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                        <div class="columns is-mobile is-centered">
                            <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop">
                                <form action="" method="post" id="frm_login">
                                    <div class="field">
                                        <label class="label">Correo Electrónico</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="email" placeholder="Correo Electrónico"
                                                name="mail" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Contraseña</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="password" placeholder="Contraseña"
                                                name="pass" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <button type="submit" name="enviar" id="sender" class="button is-info is-fullwidth">Iniciar Sesión</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).on("click","#sender",function(e){
        $(this).addClass("is-loading");
    })
</script>