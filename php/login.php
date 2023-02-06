<?php
// Conectamos el archivo con la sesion del navegador
session_start();
// Cargamos la conexion 
require 'conexion.php';
// Recuperamos los datos del formulario
$user = $_POST["user"];
$password = $_POST["password"];
echo "El usuario es:" . $user;
echo "El password es:" . $password;
// Preparamos la consulta sql
$sql = "select user, password from login where user='" . $user . "' and password='" . $password . "'";
// Ejecutamos la consulta sql
$registros = mysqli_query($conexion, $sql) 
or die ("Problemas en el select:" . mysqli_error($conexion));
// Comprobar si existe algun registro
if($reg = mysqli_fetch_array($registros)){
    // Si existe un registro, creamos una variable de sesion para controlar al usuario
    $_SESSION["user"] = $reg['user'];

    echo "Login correcto";
    // Redirigimos al usuario a la pagina principal
   header('location: ../index.html');
}

//Realizamos consilta para comprobar que esya registrado el usuario
$sql = "select user, password from datospersonales where user='" . $user . "' and password='" . $password . "'";

if($result->num_rows > 0){
    $_SESSION["user"] = $user;
    header('location: ../index.html');
}else{
    echo "No esta registrado";
    header('location: ../register.html');
}

$conexion->close();

?>