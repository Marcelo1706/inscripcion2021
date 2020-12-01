<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'sv91.ifastnet.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'inscrip2';
    $mail->Password = 'Q.z43ZgB;j1a1W';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('inscrip2@inscripcionmonterrosa.info','Inscripciones C.E. Prof. Monterrosa');
    $mail->addAddress('tapp5241@gmail.com',"Marcelo Cerritos");
    $mail->addReplyTo('inscrip2@inscripcionmonterrosa.info','Inscripciones C.E. Prof. Monterrosa');

    $mail->isHTML(true);
    $mail->Subject = 'Correo de Prueba';
    $mail->Body = 'Correo de prueba <B>HTML</B>';
    $mail->AltBody = 'Correo de prueba';

    $mail->send();
    echo "Se envió el mensaje";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}