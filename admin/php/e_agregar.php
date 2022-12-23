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
  if(!empty($_GET['nombre']) && !empty($_GET['des']) && !empty($_GET['cau']) && !empty($_GET['rec'])){
    $nombre = $_GET['nombre'];
    $des = $_GET['des'];
    $cau = $_GET['cau'];
    $rec = $_GET['rec'];
    $sql = "INSERT INTO enfermedad(nombre, descripccion, causas, recomendaciones)
    VALUES('$nombre', '$des', '$cau', '$rec')";
    $result = mysqli_query($conexion, $sql);

    if($result){
         $json['respuesta'] = 'Enfermedad agregada con éxito';
         $json['color'] = 'lawngreen';     
    }
    else{
        $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
        $json['color'] = 'red';    	
    }
  }
  else{
    $json['respuesta'] = 'Debes rellenar todos los campos';
    $json['color'] = 'red';
  } 

  echo json_encode($json);
  mysqli_close($conexion);
}
?>