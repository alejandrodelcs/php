<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$enviado = false;

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cuenta28secundaria@gmail.com';                     //SMTP username
    $mail->Password   = 'alejandro1992';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('cuenta28secundaria@gmail.com', 'Insumos Odontologicos Sanchez');
    $mail->addAddress($entidadUsuario->correo, $entidadUsuario->nombre);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Prueba 2';
    $mail->Body    = '  <html>
                        <head>
                            <meta charset="UTF8" />
                            <title>Registro</title>
                        </head>
                        Hola '. $entidadUsuario->nombre .'
                        Aún nos falta que confirmes tu email para completar tu registro.
                        <br>
                        <table bgcolor="#2D8CFF" style="border-spacing:0;border-radius:20px;margin:0 auto">
                            <tbody>
                                <tr>
                                    <td style="padding:0">
                                        <a href="http://localhost/php/sistema/verificar.php?correo='.$entidadUsuario->correo.'&codigo='.$entidadUsuario->codigo.'"
                                        style="border:0 solid #2d8cff;display:inline-block;font-size:14px;padding:15px 50px 15px 50px;text-align:center;font-weight:700;text-decoration:none;color:#ffffff" >Confirma tu email </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </html>';


    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $mensajeEnvioCorrecto = 'El mensaje se envió correctamente';

    $enviado = true;

} catch (Exception $e) {
    $mensajeEnvioIncorrecto = "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}