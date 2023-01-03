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

  if($_GET['opc'] == 1){
    $historial = $_GET['historial'];        
    $sql = "SELECT * FROM historial WHERE idhistorial=$historial AND estado=1;";
    $result = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($result) >= 1){
      $json['respuesta'] = 'Ya envíaste éste reporte';
      $json['color'] = 'red';   
    }
    else{
      if(!empty($_GET['enfermedad'])){ 
    	  $enfermedad = $_GET['enfermedad'];
        $sql = "INSERT INTO enfermedades_sugeridas(nombre)
        VALUES('$enfermedad');";
        $result = mysqli_query($conexion, $sql);
    
        if($result){
    	     $json['respuesta'] = 'Reporte enviado con éxito';
    	     $json['color'] = 'lawngreen';
  
           $historial = $_GET['historial'];
           $sql = "UPDATE historial SET estado=1
           WHERE idhistorial=$historial;";
           $result = mysqli_query($conexion, $sql);       
        }
        else{
    	    $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
    	    $json['color'] = 'red';    	
        }

      }
      else{
        $json['respuesta'] = 'Debes escribir la enfermedad detectada por tu médico';
        $json['color'] = 'red';
      }  

    }
  }


  if($_GET['opc'] == 2){

    $historial = $_GET['historial'];  
    $sql = "SELECT * FROM historial WHERE idhistorial=$historial AND estado!=1;";
    $result = mysqli_query($conexion, $sql);    

    if(mysqli_num_rows($result) >= 1){

      $sql = "UPDATE historial SET estado=1
      WHERE idhistorial=$historial;";
      $result = mysqli_query($conexion, $sql);

      if($result){
        $sql = "SELECT * FROM enfermedad_historial WHERE historial=$historial;";
        $result = mysqli_query($conexion, $sql);
        while($row=mysqli_fetch_array($result)){
    
          $enfermedad = $row['enfermedad'];
      
          $sql2 = "SELECT * FROM sintoma_historial WHERE historial=$historial;";
          $result2 = mysqli_query($conexion, $sql2);
          while($row2=mysqli_fetch_array($result2)){
      
            $sintoma = $row2['sintoma'];
    
            $sql3 = "UPDATE sintoma_enfermedad SET relacion=relacion+1
            WHERE sintoma=$sintoma AND enfermedad=$enfermedad;";
            $result3 = mysqli_query($conexion, $sql3);

      
          }
    
        }

        $json['respuesta'] = 'Reporte enviado con éxito';
        $json['color'] = 'lawngreen';
      }
      else{
        $json['respuesta'] = 'Lo sentimos, hubo un error, intenta más tarde';
        $json['color'] = 'red';            
      } 



    }
    else{
      $json['respuesta'] = 'Ya envíaste éste reporte';
      $json['color'] = 'red';             
    } 
   

  }  

  echo json_encode($json);
  mysqli_close($conexion);
}
?>