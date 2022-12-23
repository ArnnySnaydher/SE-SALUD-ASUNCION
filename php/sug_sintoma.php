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

  if(empty($_GET['sintoma'])){ 
  	$json['respuesta'] = 'Debes escribir el síntoma';
  	$json['color'] = 'red';
  }
  else{
  	$sintoma = $_GET['sintoma'];
    $sql = "INSERT INTO sintomas_sugeridos(nombre)
    VALUES('$sintoma');";
    $result = mysqli_query($conexion, $sql);

    if($result){
  	   $json['respuesta'] = 'Síntoma sugerido con éxito';
  	   $json['color'] = 'lawngreen';
    }
    else{
  	  $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
  	  $json['color'] = 'red';    	
    }
  } 

  echo json_encode($json);
  mysqli_close($conexion);
}
?>