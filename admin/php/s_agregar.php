<?php
session_start();
if (!isset($_SESSION['iduser']) && empty($_SESSION['iduser'])){
  session_destroy();
  header("location:../index.php");
}
else{
  include("conexion.php");
  include('variables.php');
  $json = array();
  if(!empty($_GET['nombre'])){
    $nombre = $_GET['nombre'];
    $sql = "INSERT INTO sintoma(nombre)
    VALUES('$nombre')";
    $result = mysqli_query($conexion, $sql);

    if($result){
         $json['respuesta'] = 'Sintoma agregado con éxito';
         $json['color'] = 'lawngreen';     
    }
    else{
        $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
        $json['color'] = 'red';    	
    }
  }
  else{
    $json['respuesta'] = 'Debes ingresar el nombre';
    $json['color'] = 'red';
  } 

  echo json_encode($json);
  mysqli_close($conexion);
}
?>