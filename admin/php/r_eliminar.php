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
  if(!empty($_GET['opce']) && !empty($_GET['opcs'])){
    $enfermedad = $_GET['opce'];
    $sintoma = $_GET['opcs'];
    $sql = "DELETE FROM sintoma_enfermedad
    WHERE enfermedad=$enfermedad AND sintoma=$sintoma";
    $result = mysqli_query($conexion, $sql);

    if($result){
         $json['respuesta'] = 'Relación eliminada con éxito';
         $json['color'] = 'lawngreen';     
    }
    else{
        $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
        $json['color'] = 'red';    	
    }
  }
  else{
    $json['respuesta'] = 'Debes seleccionar la enfermedad y el síntoma';
    $json['color'] = 'red';
  } 

  echo json_encode($json);
  mysqli_close($conexion);
}
?>