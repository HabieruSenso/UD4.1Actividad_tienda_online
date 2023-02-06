<?php
// Clases que necesitamos para enviar correos desde la libreria PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/phpMailer/phpMailer/src/Exception.php';
    require 'vendor/phpMailer/phpMailer/src/PHPMailer.php';
    require 'vendor/phpMailer/phpMailer/src/SMTP.php';

    require 'vendor/autoload.php';
    // Configuracion de envio correo
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "javier.guerra@live.u-tad.com";
    $mail->Password = "oywfcmcbxkjxeykx";//TENGO QUE PONER MI CONTRASEÑA DE GOOGLE

    // Preparar el correo
    $mail->IsHTML(true);//posible error
    $mail->AddAddress("davidlopezsalazar@outlook.com", "Tienda Online");
    $mail->SetFrom("javier.guerra@live.u-tad.com", "Cliente");
    $mail->AddReplyTo("Wilder.Lopez@live.u-tad.com", "Alta Direccion");//copia a cuenta
    $mail->Subject = "Subscripcion a nuestra tienda online";
    $content = "<b>Confirma que te quieres inscribir en nuestra plataforma de ventas</b>";

    // Enviar el correo
    $mail->MsgHTML($content);
    if(!$mail->Send()){
        echo "Error en el envio del correo";
    }else{
        echo "Correo enviado satisfactoriamente";
    }

?>