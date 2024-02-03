<?php
$conexion = mysqli_connect('localhost', 'root', '', 'saludse'); 
if (!$conexion) { 
    die('No se pudo conectar a la base de datos: ' . mysqli_connect_error()); 
} 

//echo "Conexion exitosa admin";
// mysqli_close($conexion);
?>