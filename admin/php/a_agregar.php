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
  if(!empty($_GET['nombre']) && !empty($_GET['opc'])){


    if($_GET['opc'] == 1){
      $unombre = strtoupper($_GET['nombre']);        
      $sql = "SELECT * FROM enfermedad WHERE UPPER(nombre)='$unombre';";
      $result = mysqli_query($conexion, $sql);
  
      if(mysqli_num_rows($result) >= 1){
        $json['respuesta'] = 'Esta enfermedad ya se encuentra registrada';
        $json['color'] = 'red';   
      }
      else{
        $nombre = $_GET['nombre'];
        $sql = "INSERT INTO enfermedad(nombre)
        VALUES('$nombre');";
        $result = mysqli_query($conexion, $sql);
    
        if($result){
      	     $json['respuesta'] = 'Enfermedad registrada con éxito';
      	     $json['color'] = 'lawngreen';     
        }
        else{
      	    $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
      	    $json['color'] = 'red';    	
        }
      }
    }


    if($_GET['opc'] == 2){
      $unombre = strtoupper($_GET['nombre']);        
      $sql = "SELECT * FROM sintoma WHERE UPPER(nombre)='$unombre';";
      $result = mysqli_query($conexion, $sql);
  
      if(mysqli_num_rows($result) >= 1){
        $json['respuesta'] = 'Este sintoma ya se encuentra registrado';
        $json['color'] = 'red';   
      }
      else{
        $nombre = $_GET['nombre'];
        $sql = "INSERT INTO sintoma(nombre)
        VALUES('$nombre');";
        $result = mysqli_query($conexion, $sql);
    
        if($result){
             $json['respuesta'] = 'Sintoma registrado con éxito';
             $json['color'] = 'lawngreen';     
        }
        else{
            $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
            $json['color'] = 'red';     
        }
      }
    }


  }
  else{
    $json['respuesta'] = 'Debes escribir el nombre y seleccionar lo que deseas agregar';
    $json['color'] = 'red';
  } 

  echo json_encode($json);
  mysqli_close($conexion);
}
?>