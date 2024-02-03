<?php
include('../Controller/variables.php');
if (!isset($_GET['msm']) || empty($_GET['msm'])){
  $_GET['msm'] = '';
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titulo;?></title>
  <?php echo $estructura.$estilos_login;?>
</head>
<body>

<div class="container-fluid" id="contenedor">

<div class="row rowboxLogin align-items-center justify-content-center">
  <div class="col-xl-7 col-lg-8 col-md-10 col-sm-10 col-11">
    <div class="row justify-content-center rowLogin">
  
    <div class="col-xl-9 col-lg-9 col-md-10 col-sm-10 col-11 pb-4 pr-2 pl-2 form">

      <div class="text-center kl m-0">
        <img src="img/login3.png" class="icono">
      </div>  

      <h1 class="text-primary text-center">Registrarse</h1>
      
      <form method="POST" action="../Model/signin.php" class="m-2">
        <div class="form-group"> 
          <label for="email">Correo</label>
          <input type="text" class="form-control" id="email" name="email" required="required" autocomplete="on" placeholder="Ingresa el correo con el que iniciarás sesión">
        </div> 
        <div class="form-group"> 
          <label for="clave">Clave</label>
          <input type="password" class="form-control" id="clave" name="clave" required="required" placeholder="Ingresa tu clave con la que iniciarás sesión">
          <small class="form-text text-muted text-center"><a href="index.php">Ya tengo cuenta</a></small>
        </div>
        <p class="text-center"><?php echo $_GET['msm']; ?></p>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary col-6">Registrarse</button>
        </div> 
        <a href="javascript:history.back()"> Volver Atrás</a> 
      </form>     
    </div>

    </div>    
  </div>
</div>
  
</div>
  
</body>
</html>