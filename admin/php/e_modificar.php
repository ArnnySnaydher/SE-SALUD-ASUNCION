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
  if(!empty($_GET['opc']) && !empty($_GET['nombre'])){
    $enfermedad = $_GET['opc'];
    $nombre = $_GET['nombre'];
    $sql = "UPDATE enfermedad SET nombre='$nombre'
    WHERE idenfermedad=$enfermedad";
    $result = mysqli_query($conexion, $sql);

    if($result){
         $json['respuesta'] = 'Enfermedad modificada con éxito';
         $json['color'] = 'lawngreen';     
    }
    else{
        $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
        $json['color'] = 'red';     
    }
  }
  else{
    $json['respuesta'] = 'Debes seleccionar la enfermedad e ingresar el nuevo nombre';
    $json['color'] = 'red';
  } 

  echo json_encode($json);
  mysqli_close($conexion);
}
?>