<?php
session_start();
if (!isset($_SESSION['iduser']) || empty($_SESSION['iduser'])){
  session_destroy();
  header("location:index.php");
}
else{
  include("php/conexion.php");
  include('php/variables.php');
  $user = $_SESSION['iduser'];

  if(empty($_POST['enfermedad']) || count($_POST) <= 1){
    $titulo = 'Campos vacíos';
  }
  else{
    $titulo = 'Relación exitosa';    
    $enfermedad = $_POST['enfermedad'];
    while($value = current($_POST)){
      if(key($_POST) != 'enfermedad'){
        $sintoma = $value;
        $sql = "INSERT INTO sintoma_enfermedad(sintoma, enfermedad, relacion)
        VALUES ($sintoma, $enfermedad, 0);";
        $result = mysqli_query($conexion, $sql);

      }
      next($_POST);
    }
    // }
  }  

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titulo; ?></title>
  <?php echo $icono_pestaña.$estructura.$menu.$diagnosticar_css.$sugerir_css;?>
</head>
<body>
  <div class="container-fluid" id="contenedor">
    <?php echo $menu1;?>

    <div class="row justify-content-center p-3">
      <div class="col-xl-7 col-lg-8 col-md-10 col-sm-10 col-11 diagnostico pl-4 pr-4 pt-2 pb-2">
        <h1 class="text-center text-primary mt-3 mb-3"><?php echo $titulo; ?></h1>      
      </div>
    </div> 
  </div>
</body>
</html>