<?php
if(isset($_POST['email']) && !empty ($_POST['email'])){

  include('conexion.php');
  $email = $_POST['email'];
  $sql = "SELECT *
  FROM user
  WHERE email='$email';";
  $result = mysqli_query($conexion, $sql);

  if(mysqli_num_rows($result) >= 1){

    while($row=mysqli_fetch_array($result)){
      $clave = $row['clave'];
    }
    
    $mensaje = 'Tu contraseña es: '.$clave;
    $asunto = 'RECUPERACIÓN DE CONTRASEÑA MedipLine';
    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: BDEGC';
   
    mail($email, $asunto, $mensaje, $cabeceras);
    mysqli_close($conexion); // Cerramos la conexion con la base de datos    
    header('Location:../Model/php/recuperar.php?msm=Envíamos la clave de tu cuenta al correo: '.$email);         
  }
  else{
    mysqli_close($conexion); // Cerramos la conexion con la base de datos    
    header('Location:../Model/php/recuperar.php?msm=No existe una cuenta con el correo '.$email);      
  }
}
else{
  mysqli_close($conexion); // Cerramos la conexion con la base de datos    
  header('Location:../Model/php/recuperar.php?msm=Campo vacío');
}
?>