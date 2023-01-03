<?php 


if (isset($_POST['email']) && !empty ($_POST['email']) && isset($_POST['clave']) && !empty ($_POST['clave'])){

    include ("conexion.php");
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    	
    $sql = "SELECT *
    FROM user
    WHERE email='$email';";
    $result = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($result) >= 1){
        mysqli_close($conexion); // Cerramos la conexion con la base de datos
        header('Location:../registrarse.php?msm=El usuario ya se encuentra registrado');
    }

    else{
      $sql = "INSERT INTO user(email, clave)
      VALUES('$email', '$clave');";
      $result = mysqli_query($conexion, $sql);
      mysqli_close($conexion); // Cerramos la conexion con la base de datos
  
      if(!$result){
       mysqli_close($conexion); // Cerramos la conexion con la base de datos
       header('Location:../registrarse.php?msm=Hubo un problema, intenta más tarde');
      }
  
      else{
        mysqli_close($conexion); // Cerramos la conexion con la base de datos        
        header('Location:../registrarse.php?msm=Registro exitoso');
    }

    }      

}

else{
    mysqli_close($conexion); // Cerramos la conexion con la base de datos    
    header('Location:../registrarse.php?msm=Campos vacios');
}
?>