<?php
if(isset($_SESSION["type"])){
    if($_SESSION["type"] == 1)
        header("location: https://www.inscripcionmonterrosa.info/nuevoingreso-dev/panel");
    else
        header("location: https://www.inscripcionmonterrosa.info/antiguoingreso-dev/panel");
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';
require 'config/baseDatos.php';

$valid = 0;
if(isset($_GET["type"])){
    if(base64_decode($_GET["type"]) == "nuevo" || base64_decode($_GET["type"]) == "antiguo")
        $valid = 1;
}else{
    $valid = 0;
}

if($valid == 1){
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
                        <p class="has-text-centered is-size-5 has-text-dark has-text-weight-bold">Registro de usuario para proceso de inscripción</p>
                        <div class="content">
                        <p class="has-text-justified">Para poder aplicar al proceso de inscripción en línea, debe tomar en cuenta:
                            <ul>
                                <li>Debe tener un correo electrónico <b>válido</b>, es decir, que debe tener acceso a él</li>
                                <li>Se enviará un correo con su contraseña, si no lo encuentra en su carpeta principal, búsquelo en la carpeta de SPAM</li>
                                <li>Una vez tenga su contraseña, podrá ingresar a la plataforma con el mismo correo electrónico	que registró acá.</li>
                            </ul>
                        </p>
                        </div>
                        <br>
                        <?php
                        if(isset($_POST["enviar"]) && isset($_GET["type"])){
                            $mail1 = $_POST["mail1"];
                            $mail2 = $_POST["mail2"];
                            if($mail1 != ""  && $mail2 != ""){
                                if($mail1 == $mail2){
                                    $email = $mail1;
                                    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){
                                        ?>
                                        <div class="message is-danger">
                                            <div class="message-body">
                                                <b>La dirección ingresada no es válida</b>
                                            </div>
                                        </div>
                                        <?php
                                    }else{
                                        if(verificar_correo($email) == 0){
                                            send_mail($email);
                                        }else{
                                            ?>
                                            <div class="message is-danger">
                                                <div class="message-body">
                                                    <b>El correo electrónico ya está registrado</b>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }else{
                                    ?>
                                    <div class="message is-danger">
                                        <div class="message-body">
                                            <b>Los correos electrónicos no coinciden</b>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }else{
                                ?>
                                <div class="message is-danger">
                                    <div class="message-body">
                                        <b>El correo electrónico es necesario</b>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="columns is-mobile is-centered">
                            <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop">
                                <form action="" method="post" id="frm_register">
                                    <div class="field">
                                        <label class="label">Correo Electrónico</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="email" placeholder="Correo Electrónico"
                                                name="mail1" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Confirmar Correo Electrónico</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="email" placeholder="Correo Electrónico"
                                                name="mail2" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <button  id="sender" name="enviar" type="submit" class="button is-info is-fullwidth">Registrar Usuario</button>
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
<?php
}else{
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
                        <div class="message is-danger">
                            <div class="message-body">
                                <b>FALTA EL TOKEN DE SEGURIDAD, NO SE PUEDE CONTINUAR</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}

function send_mail($correo){
    $mail = new PHPMailer(true);
    // $mail->CharSet = 'UTF-8';
    // $mail->Encoding = 'base64';
    $clave_generada = generar_clave();
    $cuerpo = '<p><b>Complejo Educativo "Profesor Martin Romeo Monterrosa Rodriguez"</b></p><br><p>Se ha registrado correctamente en la plataforma de inscripcion. Sus datos de inicio de sesion son los siguientes: </p><br>
    <p><b>Correo Electronico: </b>'.$correo.'</p><p><b>Clave: </b>'.$clave_generada.'</p><br><p>Puede iniciar sesion en la plataforma en la siguiente direccion: <a href="https://www.inscripcionmonterrosa.info/login">https://www.inscripcionmonterrosa.info/login?type=YW50aWd1bw==</a></p>';
    try {
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        // $mail->Host = 'smtp.mail.yahoo.com';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        // $mail->Username = 'inscripcionesmonterrosa@yahoo.com';
        $mail->Username = 'inscripcionmonterrosa@gmail.com';
        $mail->Password = '1600Ajmal56!';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // $mail->setFrom('inscripcionesmonterrosa@yahoo.com','Inscripciones C.E. Prof. Monterrosa');
        $mail->setFrom('inscripcionmonterrosa@gmail.com','Inscripciones C.E. Prof. Monterrosa');
        $mail->addAddress($correo);
        // $mail->addReplyTo('inscrip2@inscripcionmonterrosa.info','Inscripciones C.E. Prof. Monterrosa');
    
        $mail->isHTML(true);
        $mail->Subject = 'Registro en proceso de Inscripcion 2021';
        $mail->Body = $cuerpo;
        $mail->AltBody = 'Complejo Educativo "Profesor Martin Romeo Monterrosa Rodriguez"\r\n\r\nSe ha registrado correctamente en la plataforma de inscripcion. Sus datos de inicio de sesion son los siguientes:\r\n\r\nCorreo Electronico: '.$correo.'\r\n\r\nClave: '.$clave_generada.'\r\n\r\nPuede iniciar sesion en la plataforma en la siguiente direccion: https://www.inscripcionmonterrosa.info/login?type=YW50aWd1bw==';
    
        if($mail->send()){
            $objBD = new baseDatos();
            $type = base64_decode($_GET["type"]);
            if($type == "nuevo"){
                $type = 1;
            }else{
                $type = 2;
            }
            $res = $objBD->insertar("usuarios",["correo" => $correo, "password" => md5($clave_generada), "type" => $type]);
            echo gettype($res);
            if(gettype($res) == 'integer'){
                if($res > 0){
                    ?>
                    <script>
                        window.location = "https://www.inscripcionmonterrosa.info/registro/exito";
                    </script>
                    <?php
                }
            }else{
                ?>
                <div class="message is-danger">
                    <div class="message-body">
                        <b>Error de Inserción en BD</b>
                    </div>
                </div>
                <?php
            }
            
        }
    } catch (Exception $e) {
        ?>
        <div class="message is-danger">
            <div class="message-body">
                <b>No se pudo entregar el mensaje: </b> <?= $mail->ErrorInfo ?>
            </div>
        </div>
        <?php
    }
}

function generar_clave(){
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function verificar_correo($correo){
    $objBD = new baseDatos();
    return count($objBD->leer("usuarios","correo",["correo" => $correo]));
}