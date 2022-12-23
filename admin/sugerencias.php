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
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titulo; ?></title>
  <?php echo $icono_pestaña.$estructura.$menu.$historial_css;?>
</head>
<body>
  <div class="container-fluid" id="contenedor">
    <?php echo $menu1;?>

    <div class="row justify-content-center p-3">

      <div class="col-xl-7 col-lg-8 col-md-10 col-sm-10 col-11 sombras pl-4 pr-4 pt-2 pb-2 mt-3 mb-3">
        <h1 class="text-center text-primary mt-3 mb-3">Enfermedades</h1>
        <p class="pbold">
        <?php
        $sql = "SELECT *FROM enfermedades_sugeridas ORDER BY nombre ASC;";
        $result = mysqli_query($conexion, $sql);
        while($row=mysqli_fetch_array($result)){
          echo '<m class="fas fa-arrow-circle-right fa-lg"></m>'.$row['nombre'].'<br>';
        }
        ?>
        </p>
        <h1 class="text-center text-primary mt-3 mb-3">Síntomas</h1>
        <p class="pbold">
        <?php
        $sql = "SELECT *FROM sintomas_sugeridos ORDER BY nombre ASC;";
        $result = mysqli_query($conexion, $sql);
        while($row=mysqli_fetch_array($result)){
          echo '<m class="fas fa-arrow-circle-right fa-lg"></m>'.$row['nombre'].'<br>';
        }
        ?>
        </p>          
      </div>

      <div class="col-xl-7 col-lg-8 col-md-10 col-sm-10 col-11 sombras pl-4 pr-4 pt-2 pb-2 mt-3 mb-3">
        <h1 class="text-center text-primary mt-3 mb-3">Relaciones</h1>     
        <?php
        $sql = "SELECT *FROM enfermedad WHERE idenfermedad!= 1 ORDER BY nombre ASC;";
        $result = mysqli_query($conexion, $sql);
        while($row=mysqli_fetch_array($result)){
          $idenfermedad = $row['idenfermedad'];
          echo '
          <h2 class="text-center text-indigo mt-3 mb-3">'.$row['nombre'].'</h2>
            <p class="pbold">';          

          $sql2 = "SELECT s.nombre as snombre
          FROM sintoma as s, sintoma_enfermedad as se
          WHERE se.sintoma=s.idsintoma AND se.enfermedad=$idenfermedad
          ORDER BY s.nombre ASC;";
          $result2 = mysqli_query($conexion, $sql2);
          while($row2=mysqli_fetch_array($result2)){
            echo '<m class="fas fa-arrow-right fa-lg"></m>'.$row2['snombre'].'<br>';
          }


          echo '</p>';
        }
        ?>        
      </div>

    </div> 
  </div>
</body>
</html>