<?php
$titulo = 'Virgen de la Asuncion';
$iconologin = '../View/img/login.png';
$icono_pestaña = '<link rel="shortcut icon" href="../View/img/logo.png">';

// css
$estructura = '<link rel="stylesheet" type="text/css" href="../View/bootstrap-4.4.1-dist/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../View/css/estructura.css"> 
   <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.12.0-web/css/all.min.css">';
$estilos_login = '<link rel="stylesheet" type="text/css" href="../View/css/estilos_login.css">';
$menu = '<link rel="stylesheet" type="text/css" href="../View/css/menu.css">';
$consultar = '<link rel="stylesheet" type="text/css" href="../View/css/consultar.css">';
$diagnosticar_css = '<link rel="stylesheet" type="text/css" href="../View/css/diagnostico.css">';
$sugerir_css = '<link rel="stylesheet" type="text/css" href="../View/css/sugerir.css">';
$historial_css = '<link rel="stylesheet" type="text/css" href="../View/css/historial.css">';


// js
$js = '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

   <script src="../View/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>';     

$consultar_js = '<script type="text/javascript" src="../js/consultar.js"></script>';
$sug_sintoma_js = '<script type="text/javascript" src="../js/sugerirsintoma.js"></script>';
$historial_js = '<script type="text/javascript" src="../js/historial.js"></script>';

// estructuras
$menu1 = '
    <div class="row menu justify-content-center p-2">
      <div class="col">
        <div class="row justify-content-center">
          <div class="col-auto menu1a">
            <a href="../View/indexlogin.php" class="aa">Consultar <m class="fas fa-notes-medical fa-lg"></m></a>
          </div>
          <div class="col-auto menu1a">
            <a href="../View/historial.php" class="aa">Historial <m class="fas fa-history fa-lg"></m></a>
          </div>
          <div class="col-auto menu1a">
            <a onclick="mostrar();" href="#" class="aa">Sugerir sintoma <m class="fas fa-plus-circle fa-lg"></m></a>
          </div>        
        </div>  
      </div>
      <div class="col-auto menu1a">
            <a href="../Controller/salir.php" class="aa">Salir <m class="fas fa-power-off fa-lg"></m></a>
      </div>     
    </div>
';

$BotonSubir = '
<!-- Botón flotante para subir -->
<span id="scrollUp" title="Subir" class="fas fa-arrow-circle-up fas-lg" onclick="scrollup();"></span>
';

$sugerir_sintoma = '
    <div class="containNuevoSintoma" id="containNuevoSintoma">
      <div class="NuevoSintoma text-center p-4" id="NuevoSintoma">
        <l class="fas fa-times fa-lg cerrar" onclick="ocultar();"></l>
        <h1 class="text-primary m-3 pb-5"> Sugerir síntoma </h1>
        <div class="form-group m-3 pb-1"> 
          <input type="text" class="form-control" id="sintoma" name="sintoma" placeholder="Digita el síntoma" autocomplete="off">
        </div>
        <div class="form-group m-3"> 
          <button onclick="sug_sintoma();" class="btn btn-outline-primary col-8">Sugerir</button>
          <small class="form-text" id="respuesta"></small>
        </div> 
      </div>
    </div>
';
?>