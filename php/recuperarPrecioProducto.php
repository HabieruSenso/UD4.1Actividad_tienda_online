<?php
session_start();
$user = $_SESSION["user"];
require 'conexion.php';

$precio = intval($_GET["precio"]) ;

$producto = $_GET["producto"];

$sql = "insert into provisional (user, producto, precio) values ('$user', '$producto', $precio)"; //'' es opara anotaciones

mysqli_query($conexion, $sql) or die ("Problemas en el select" . mysqli_error($conexion));

mysqli_close($conexion);

//echo "El producto fue registrado";

header("location: ../category.html");

?>