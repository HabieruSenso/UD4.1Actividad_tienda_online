<?php
require 'conexion.php';
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$direccion = $_POST["direccion"];
$user = $_POST["user"];
$dni = $_POST["dni"];
$email = $_POST["email"];
$password = $_POST["password"];
$estado = "false";//posible fallo
// Guardamos datos en la tabla

$sql = "insert into datospersonales (user,nombre, apellidos, direccion, dni, email, password, estado) 
values('$user', '$nombre', '$apellidos', '$direccion', '$dni', '$email', '$password', '$estado')";

 if($conexion->query($sql) == true){//posible fallo
    echo "Se ha creado el registro";
}else{
    echo "error" . $sql . "<br>" . $conexion->error;
}

//esto viene despues
$sql = "insert into login (user, password) values('$user', '$password')";

 if($conexion->query($sql) == true){
    echo "Se ha accedido el registro";
}else{
    echo "error" . $sql . "<br>" . $conexion->error;
}

header ("location: ../login.html");


// enviar el correo al usuario
use PHPMailer\PHPMailer\PHPMailer;//pposible fallo corchetes
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception;//pposible fallo corchetes
require 'vendor/phpMailer/phpMailer/src/Exception.php';//pposible fallo ruta
require 'vendor/phpMailer/phpMailer/src/PHPMailer.php';//pposible fallo ruta
require 'vendor/phpMailer/phpMailer/src/SMTP.php';//pposible fallo ruta

require 'vendor/autoload.php';//pposible fallo ruta
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";//posible fallo mayusculas

$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";//fallo mal escrito
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->Username = "javier.guerra.live.utad@gmail.com";
$mail->Password = "oywfcmcbxkjxeykx";//TENGO QUE PONER MI CONTRASEÑA DE GOOGLE
$direccion = "http://localhost/aroma-master/php/confirmar.php?user=$user&estado=true";//fallo comillas final
$mail->IsHTML(true);
$mail->AddAddress($email, "Tienda Online");
$email->SetFrom($email, "Cliente");
$email->AddReplyTo("davidlopezsalazar@outlook.com", "alta de un usuario");
$email->Subject = "Suscripcion tienda online";
$content = "<a href='$direccion'>Confirmar subscripcion</a>";
$mail->MsgHTML($content);
if(!$mail->Send()){
    echo "Error en el envio del correo";
}else{
    echo "Correo enviado satisfactoriamente";
}

?>