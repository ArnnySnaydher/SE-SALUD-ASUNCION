<?php 
session_start();
include ("conexion.php");

if (isset($_POST['email']) && !empty ($_POST['email']) && isset($_POST['clave']) && !empty ($_POST['clave'])){

    $email = $_POST['email'];
    $clave= $_POST['clave'];
    	
    $sql = "SELECT *
    FROM user_r
    WHERE email='$email' AND clave='$clave';";
    $result = mysqli_query($conexion, $sql);
    mysqli_close($conexion); // Cerramos la conexion con la base de datos

    if(mysqli_num_rows($result) <= 0){ header('Location:../index.php?msm=Email o contraseña incorrecta'); }

    else{

        while($row=mysqli_fetch_array($result)){

            $_SESSION['clave'] = $row['clave'];
            $_SESSION['iduser'] = $row['iduser_r'];
            $_SESSION['email'] = $row['email'];
            header('Location:../indexlogin.php');

        }

    }     

}

else{ header('Location:../index.php?msm=Campos vacios'); }
?>