<?php
session_start();
if (!isset($_SESSION['iduser']) || empty($_SESSION['iduser'])){
  session_destroy();
  header("location:index.php");
}
else{
include('php/variables.php');
include('php/conexion.php');
?>
<!DOCTYPE html>
<html id="html">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titulo; ?></title>
  <?php echo $icono_pestaña.$estructura.$menu.$consultar.$sugerir_css;?>
</head>
<body>
  <div class="container-fluid" id="contenedor">
    <?php echo $menu1;?>

    <div class="row justify-content-center">
      <div class="col-auto menu2 p-1">
        <ul class="lista">
          <?php 

          $abc = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

          foreach ($abc as $value) {
            echo '<li class="btn p-0"><a class="pl-3 pr-3" href="#'.$value.'">'.$value.'</a></li>';
          }

          ?>
        </ul>
      </div>

      <div class="w-100"></div>

      <div class="col-xl-7 col-lg-8 col-md-10 col-sm-10 col-11">
        <form method="POST" action="relacionar.php" class="formD p-4 mt-2 mb-2">
          <h1 class="text-center text-primary">
            Seleccione la enfermedad, y a continuación sus síntomas
          </h1>
          <div class="form-group mt-5">         
            <select class="form-control" name="enfermedad" id="enfermedad">
              <option value="">SELECCIONE UNA ENFERMEDAD</option>
          <?php

            $sql = "SELECT *FROM enfermedad
            WHERE idenfermedad!=1
            ORDER BY nombre ASC;";
            $result = mysqli_query($conexion, $sql);
            while($row=mysqli_fetch_array($result)){
              echo '<option value="'.$row['idenfermedad'].'">'.$row['nombre'].'</option>';
            }  
            echo '</div></select>';

            foreach($abc as $value){
              $y = strtolower($value);
              $sql = "SELECT *FROM sintoma
              WHERE nombre LIKE '$value%' OR nombre LIKE '$y%'
              ORDER BY nombre ASC;";
              $result = mysqli_query($conexion, $sql);
              if(mysqli_num_rows($result) >= 1){ echo '<div class="sintomas p-3" id="'.$value.'">
              <h1 class="text-primary text-center">'.$value.'</h1>'; }
              while($row=mysqli_fetch_array($result)){
                echo '
                <div class="form-check pt-2 pb-2">
                  <input class="form-check-input" type="checkbox" value="'.$row['idsintoma'].'" id="checkbox'.$row['idsintoma'].'" name="checkbox'.$row['idsintoma'].'">
                  <label class="form-check-label" for="checkbox'.$row['idsintoma'].'">
                    '.$row['nombre'].'
                  </label>
                </div>';
              }
              if(mysqli_num_rows($result) >= 1){ echo '</div>'; }    
            }

          ?>
          <div class="text-center">
            <button type="submit" class="btn btn-outline-primary col-6 mt-2">Relacionar</button>
          </div>           
        </form>    
      </div>

    </div>  
<?php echo $BotonSubir; ?>

</div>
</body>
</html>

<?php
echo $consultar_js;
}
?>