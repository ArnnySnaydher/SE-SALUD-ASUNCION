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

      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 col-10 sombras pl-4 pr-4 pt-2 pb-2 mt-5">
        <h1 class="text-center text-primary mt-3 mb-3">Agregar enfermedades</h1>
        <div class="form-group"> 
          <input type="text" name="nombreae" id="nombreae" class="form-control" placeholder="Ingresa el nombre de la enfermedad que deseas ingresar" title="Ingresa el nombre de la enfermedad que deseas ingresar">
        </div>        
        <div class="form-group"> 
          <label for="descripccion">Descripcción</label>
          <textarea class="form-control" rows="3" id="descripccion" name="descripccion"></textarea>
        </div>
        <div class="form-group"> 
          <label for="causas">Causas</label>
          <textarea class="form-control" rows="3" id="causas" name="causas"></textarea>
        </div> 
        <div class="form-group"> 
          <label for="recomendaciones">Recomendaciones</label>
          <textarea class="form-control" rows="3" id="recomendaciones" name="recomendaciones"></textarea>
        </div>                           
        <div class="form-group text-center">
          <button onclick="e_agg();" class="btn btn-outline-primary col-8">Agregar</button>
          <small class="form-text" id="respae"></small>
        </div>
      </div>

<!-- ---- -->
<div class="w-100"></div>
<!-- ---- -->
      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 col-10 sombras pl-4 pr-4 pt-2 pb-2 mt-5">
        <h1 class="text-center text-primary mt-3 mb-3">Agregar síntomas</h1>        
        <div class="form-group"> 
          <input type="text" name="nombreas" id="nombreas" class="form-control" placeholder="Ingresa el nombre del síntoma que deseas ingresar" title="Ingresa el nombre del síntoma que deseas ingresar">
        </div>
        <div class="form-group text-center">
          <button onclick="s_agg();" class="btn btn-outline-primary col-8">Agregar</button>
          <small class="form-text" id="respas"></small>
        </div>
      </div>

<!-- ---- -->
<div class="w-100"></div>
<!-- ---- -->

      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 col-10 sombras pl-4 pr-4 pt-2 pb-2 mt-5">
        <h1 class="text-center text-primary mt-3 mb-3">Eliminar enfermedades</h1>
        <div class="form-group"> 
          <select class="form-control" name="opcee" id="opcee">
            <option value="">Selecciona la enfermedad que deseas eliminar</option>
            <?php
            $sql = "SELECT * FROM enfermedad ORDER BY nombre ASC;";
            $result = mysqli_query($conexion, $sql);            
            while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['idenfermedad'].'">'.$row['nombre'].'</option>';
            }
            ?>
          </select>
        </div>          
        <div class="form-group text-center">
          <button onclick="del_e();" class="btn btn-outline-primary col-8">Eliminar</button>
          <small class="form-text" id="resp2ee"></small>
        </div>
      </div>

<!-- ---- -->
<div class="w-100"></div>
<!-- ---- -->

      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 col-10 sombras pl-4 pr-4 pt-2 pb-2 mt-5">
        <h1 class="text-center text-primary mt-3 mb-3">Eliminar sintomas</h1>
        <div class="form-group"> 
          <select class="form-control" name="opces" id="opces">
            <option value="">Selecciona el síntoma que deseas eliminar</option>
            <?php
            $sql = "SELECT * FROM sintoma ORDER BY nombre ASC;";
            $result = mysqli_query($conexion, $sql);            
            while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['idsintoma'].'">'.$row['nombre'].'</option>';
            }
            ?>
          </select>
        </div>          
        <div class="form-group text-center">
          <button onclick="del_s();" class="btn btn-outline-primary col-8">Eliminar</button>
          <small class="form-text" id="resp2es"></small>
        </div>
      </div>


<!-- ---- -->
<div class="w-100"></div>
<!-- ---- -->

      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 col-10 sombras pl-4 pr-4 pt-2 pb-2 mt-5">
        <h1 class="text-center text-primary mt-3 mb-3">Modificar enfermedad</h1>
        <div class="form-group"> 
          <select class="form-control" name="opcme" id="opcme">
            <option value="">Selecciona la enfermedad que deseas modificar</option>
            <?php
            $sql = "SELECT * FROM enfermedad ORDER BY nombre ASC;";
            $result = mysqli_query($conexion, $sql);            
            while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['idenfermedad'].'">'.$row['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group"> 
          <input type="text" name="nombreme" id="nombreme" class="form-control" placeholder="Ingresa el nuevo nombre de la enfermedad" title="Ingresa el nuevo nombre de la enfermedad">
        </div>              
        <div class="form-group text-center">
          <button onclick="mod_e();" class="btn btn-outline-primary col-8">Modificar</button>
          <small class="form-text" id="resp2me"></small>
        </div>
      </div>


<!-- ---- -->
<div class="w-100"></div>
<!-- ---- -->

      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 col-10 sombras pl-4 pr-4 pt-2 pb-2 mt-5">
        <h1 class="text-center text-primary mt-3 mb-3">Modificar sintoma</h1>
        <div class="form-group"> 
          <select class="form-control" name="opcms" id="opcms">
            <option value="">Selecciona el síntoma que deseas modificar</option>
            <?php
            $sql = "SELECT * FROM sintoma ORDER BY nombre ASC;";
            $result = mysqli_query($conexion, $sql);            
            while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['idsintoma'].'">'.$row['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group"> 
          <input type="text" name="nombrems" id="nombrems" class="form-control" placeholder="Ingresa el nuevo nombre del síntoma" title="Ingresa el nuevo nombre del síntoma">
        </div>              
        <div class="form-group text-center">
          <button onclick="mod_s();" class="btn btn-outline-primary col-8">Modificar</button>
          <small class="form-text" id="resp2ms"></small>
        </div>
      </div>


<!-- ---- -->
<div class="w-100"></div>
<!-- ---- -->

      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 col-10 sombras pl-4 pr-4 pt-2 pb-2 mt-5">
        <h1 class="text-center text-primary mt-3 mb-3">Eliminar relación</h1>
        <div class="form-group"> 
          <select class="form-control" name="opcers" id="opcers">
            <option value="">Selecciona el síntoma</option>
            <?php
            $sql = "SELECT * FROM sintoma ORDER BY nombre ASC;";
            $result = mysqli_query($conexion, $sql);            
            while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['idsintoma'].'">'.$row['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group"> 
          <select class="form-control" name="opcere" id="opcere">
            <option value="">Selecciona la enfermedad</option>
            <?php
            $sql = "SELECT * FROM enfermedad ORDER BY nombre ASC;";
            $result = mysqli_query($conexion, $sql);            
            while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['idenfermedad'].'">'.$row['nombre'].'</option>';
            }
            ?>
          </select>
        </div>             
        <div class="form-group text-center">
          <button onclick="del_r();" class="btn btn-outline-primary col-8">Eliminar relación</button>
          <small class="form-text" id="resp2er"></small>
        </div>
      </div>

    </div>

  </div>
</body>
</html>
<?php echo $opciones_js;?>