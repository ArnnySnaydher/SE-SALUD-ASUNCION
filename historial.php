<?php
session_start();
if (!isset($_SESSION['iduser']) || empty($_SESSION['iduser'])){
  session_destroy();
  header("location:index.php");
}
else{
$iduser = $_SESSION['iduser'];
include('php/variables.php');
include('php/conexion.php');
?>
<!DOCTYPE html>
<html id="html">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titulo; ?></title>
  <?php echo $icono_pestaña.$estructura.$menu.$historial_css.$consultar.$sugerir_css;?>
</head>
<body>
  <div class="container-fluid" id="contenedor">
    <?php echo $menu1;?>

    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-8 col-md-10 col-sm-10 col-11 sombras p-4 mt-2 mb-2">
          <?php
            $sql = "SELECT * FROM historial
            WHERE user=$iduser AND estado=0
            ORDER BY idhistorial ASC;";
            $result = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($result) <= 0){
              echo '<h2 class="text-indigo text-center">No tiene historial</h2>';
            }
            else{
            while($row=mysqli_fetch_array($result)){
              $idhistorial = $row['idhistorial'];
              echo '
              <div class="sombras row p-3 justify-content-center m-4">
                <div class="w-100"></div> 
                <div class="col-10">
                  <h1 class="text-primary text-center">'.$idhistorial.'</h1>
                </div>

                <div class="w-100"></div> 
                <div class="col-10  text-center">
                  <h2 class="text-indigo">Enfermedad/es diagnosticada/s</h2>
                </div>
                <div class="w-100"></div> 
                <div class="col-10  text-center">
                  <p class="p">'.$row['enfermedad'].'</p>
                </div>

                <div class="w-100"></div> 
                <div class="col-10  text-center">                                 
                  <input type="hidden" class="form-control" id="idhistorial" name="idhistorial" value="'.$idhistorial.'">
                  <h2 class="text-indigo">Síntomas consultados</h2>
                  <p class="p">';

              $sql2 = "SELECT * 
              FROM historial as h, sintoma_historial as sh, sintoma as s 
              WHERE h.idhistorial=sh.historial and s.idsintoma=sh.sintoma and h.idhistorial=$idhistorial  
              ORDER BY nombre ASC;";
              $result2 = mysqli_query($conexion, $sql2);
              while($row2=mysqli_fetch_array($result2)){
                echo '<m class="fas fa-arrow-circle-right fa-lg"></m>'.$row2['nombre'].'<br>';
              }  

              echo '
                 </p>
                </div>
                <div class="w-100"></div> 
                <div class="col-10 text-center secc2 pt-2">
                  <h2 class="text-indigo">¿Nuestra predicción fue acertada?</h2>             
                  <button class="btn btn-outline-primary mb-3 mt-5 col-5" onclick="reportar_enf('.$idhistorial.', 2);">
                    Si
                  </button>             
                  <input type="text" class="form-control mb-1 mt-3" id="enfermedad'.$idhistorial.'" name="enfermedad'.$idhistorial.'" placeholder="Escribe la enfermedad detectada por tu médico">
                  <button class="btn btn-outline-primary col-5" onclick="reportar_enf('.$idhistorial.', 1);">
                    No
                  </button>
                  <small class="form-text" id="resultado"></small>
                </div>                 
              </div>';
            }
            }
          ?>           
      </div>

    </div>
  
<?php echo $BotonSubir.$sugerir_sintoma; ?>

</div>
</body>
</html>

<?php
echo $consultar_js.$sug_sintoma_js.$historial_js;
}
?>