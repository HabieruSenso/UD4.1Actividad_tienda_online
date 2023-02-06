<?php
    session_start();
    require 'conexion.php';

    // Obtener el valor de la confirmacion del correo.
    $user = $_GET["user"];
    $valor_confirmacion = $_GET["estado"];

    // Cambiamos el estado del registro a true del usuario en la tabla de datos personales
    if($conexion->connect_error){
        die("Connection failed:" . $conexion->connect_error);
    }

    $sql = "UPDATE datospersonales SET estado='$valor_confirmacion' WHERE user='$user'";

    if($conexion->query($sql) == TRUE){
        echo "Se ha registrado perfectamente";
    }else{
        echo "Error en el registro:" . $conexion->error;
    }
?>