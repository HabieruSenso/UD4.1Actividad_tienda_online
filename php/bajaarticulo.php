<?php
    session_start();
    require 'conexion.php';
    $user = $_SESSION["user"];
    $producto = $_GET["producto"];

    $conexion->query("delete from provisional where user='$user' and producto='$producto'") 
    or die($conexion->error);

    $conexion->close();

    header("location: ../cart2.php");

?>