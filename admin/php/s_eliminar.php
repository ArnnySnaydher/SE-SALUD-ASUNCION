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
  if(!empty($_GET['opc'])){
    $sintoma = $_GET['opc'];
    $sql = "DELETE FROM sintoma
    WHERE idsintoma=$sintoma";
    $result = mysqli_query($conexion, $sql);

    if($result){
         $json['respuesta'] = 'Sintoma eliminado con éxito';
         $json['color'] = 'lawngreen';     
    }
    else{
        $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
        $json['color'] = 'red';    	
    }
  }
  else{
    $json['respuesta'] = 'Debes seleccionar el sintoma';
    $json['color'] = 'red';
  } 

  echo json_encode($json);
  mysqli_close($conexion);
}
?>