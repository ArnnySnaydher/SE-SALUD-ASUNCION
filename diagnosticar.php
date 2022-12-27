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
  $json = array();
  $jsonaux = array();
  $enfermedades = array();
  $c_sintomas = array();
  array_push($c_sintomas, '');  
  foreach($_POST as $value){
    // echo $value.'-';
    array_push(
    $c_sintomas, 
    $value
    );  
  }

  //TFase 1

  $sql = "SELECT * FROM enfermedad;";
  $result = mysqli_query($conexion, $sql);

  while($row = mysqli_fetch_array($result)){
    
    $coincidencias = 0;
    $cont = 0;
    $porcentaje = 0;
    $i_enfermedad = $row['idenfermedad'];
    $n_enfermedad = $row['nombre'];
    $sql = "SELECT * FROM sintoma_enfermedad
    WHERE enfermedad=$i_enfermedad";
    $result2 = mysqli_query($conexion, $sql);

    while($row2 = mysqli_fetch_array($result2)){
    $cont += 1;
    $sintoma = $row2['sintoma'];
    if(array_search($sintoma, $c_sintomas, false) !== FALSE && array_search($sintoma, $c_sintomas, false) != FALSE){
      $coincidencias += 1;
    }

    $porcentaje = $coincidencias/$cont;

    }

    array_push(
        $enfermedades, 
        [
        'porcentaje' => $porcentaje,  
        'coincidencias' => $coincidencias,       
        'id' => $i_enfermedad,
        'nombre' => $n_enfermedad
        ]
        );  
  }



  $diagnostico = array();
  rsort($enfermedades);
  // echo json_encode($enfermedades);
  $p_comparar = $enfermedades[0]['porcentaje'];
  foreach($enfermedades as $value){
    // echo $p_comparar.'='.$value['porcentaje'].'<br>';
    if($p_comparar == $value['porcentaje']){

      array_push(
          $diagnostico, 
          [
          'coincidencias' => $value['coincidencias'],  
          'porcentaje' => $value['porcentaje'],       
          'id' => $value['id'],
          'nombre' => $value['nombre']
          ]
          );  

    }
  } 

//TFase 1


//Fase 2

  if(count($diagnostico) >= 2){
    $diagnosticoaux = array();
    $diagnostico2 = array();

    foreach($diagnostico as $value){
      $calificacion = 0;
      $cont = 0;
      $id = $value['id'];
      $sql = "SELECT * FROM sintoma_enfermedad
      WHERE enfermedad=$id";
      $result = mysqli_query($conexion, $sql);
  
      while($row = mysqli_fetch_array($result)){
        $cont += 1;
        $sintoma = $row['sintoma'];
        if(array_search($sintoma, $c_sintomas, false) !== FALSE && array_search($sintoma, $c_sintomas, false) !=   FALSE){
          $calificacion += $row['relacion'];
        }
  
      }
  
      array_push(
          $diagnosticoaux, 
          [
          'calificacion' => $calificacion,
          'coincidencias' => $value['coincidencias'],  
          'porcentaje' => $value['porcentaje'],       
          'id' => $value['id'],
          'nombre' => $value['nombre']
          ]
          );  
  
    }

    rsort($diagnosticoaux);
    // echo json_encode($enfermedades);
    $c_comparar = $diagnosticoaux[0]['calificacion'];
    foreach($diagnosticoaux as $value){
      // echo $p_comparar.'='.$value['porcentaje'].'<br>';
      if($c_comparar == $value['calificacion']){
  
        array_push(
            $diagnostico2, 
            [
            'calificacion' => $value['calificacion'],
            'coincidencias' => $value['coincidencias'],  
            'porcentaje' => $value['porcentaje'],       
            'id' => $value['id'],
            'nombre' => $value['nombre']
            ]
            );  
  
      }
    } 

  }
  else{
    $diagnostico2 = $diagnostico;
  }

//TFase2



//Fase 3

  $enfermedad = '';

  foreach($diagnostico2 as $value){

    $enfermedad .= ' '.$value['nombre'].' -';
    $enfermedadid = $value['id'];
    $sql = "SELECT * 
    FROM enfermedad
    WHERE idenfermedad=$enfermedadid;";
    $result = mysqli_query($conexion, $sql);
    while($row = mysqli_fetch_array($result)){

    array_push(
          $jsonaux, 
          [
          'enfermedad' => $value['nombre'],  
          'descripccion' => $row['descripccion'],       
          'causas' => $row['causas'],
          'recomendaciones' => $row['recomendaciones'],
          'idenfermedad' => $row['idenfermedad']
          ]
          );  
    }  

  }

  $enfermedad = substr($enfermedad, 1, -1);
  if(count($diagnostico2) >= 2){  $titulo = 'Es posible que tengas las siguientes enfermedades'; }
  else{ $titulo = 'Es posible que tengas la siguiente enfermedad'; $enfermedad = $diagnostico2[0]['nombre']; }


  $sql = "INSERT INTO historial(enfermedad, user, estado)
  VALUES ('$enfermedad', $user, 0);";
  $result = mysqli_query($conexion, $sql);

  $historial = mysqli_insert_id($conexion);

  if($result){
    foreach ($c_sintomas as $value){
      $sql = "INSERT INTO sintoma_historial(historial, sintoma)
      VALUES ($historial, $value);";
      // $result = mysqli_query($conexion, $sql);
    }
    foreach ($jsonaux as $value){
      $enf = $value['idenfermedad'];
      $sql = "INSERT INTO enfermedad_historial(historial, enfermedad)
      VALUES ($historial, $enf);";
      $result = mysqli_query($conexion, $sql);
      print_r("hola". $result);
    }    
  } 

//TFase 3

  // echo json_encode($enfermedades).'<br><br>'.json_encode($diagnostico).
  // '<br><br>'.json_encode($diagnosticoaux).'<br><br>'.json_encode($diagnostico2);
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
        <?php
        foreach($jsonaux as $value){

          echo '
          <div class="row justify-content-center p-3 enfermedad mt-3 mb-3">

            <div class="col-10">
              <h2 class="text-center text-indigo mt-4">
                '.$value['enfermedad'].'
              </h2>
            </div>
            <div class="w-100"></div>
            <div class="col-10">
              <p>
                '.$value['descripccion'].'
              </p>
            </div>

            <div class="w-100"></div> 

            <div class="col-10">
              <h2 class="text-center text-indigo mt-4">
                Causas
              </h2>
            </div>  
            <div class="w-100"></div>
            <div class="col-10">         
              <p>
                '.$value['causas'].'
              </p>
            </div>

            <div class="w-100"></div>

            <div class="col-10">   
              <h2 class="text-center text-indigo mt-4">
                Recomendaciones
              </h2>
            </div>
            <div class="w-100"></div>
            <div class="col-10">            
              <p>
                '.$value['recomendaciones'].'
              </p>
            </div>

          </div>
          ';
          
        }
        ?>
      
      </div>
    </div>
  <?php echo $sugerir_sintoma; ?>    
  </div>
</body>
</html>
<?php echo $consultar_js.$sug_sintoma_js; ?>