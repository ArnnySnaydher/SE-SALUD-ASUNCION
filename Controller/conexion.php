<?php
$conexion = mysqli_connect("localhost", "root", "", "saludse"); 
if (!$conexion) { 
    die('No se pudo conectar a la base de datos: ' . mysqli_connect_error($conexion)); 
} 
// echo "Conexion exitosa usuario";
// mysqli_close($conexion);
?>