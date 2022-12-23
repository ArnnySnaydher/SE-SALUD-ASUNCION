<?php
$titulo = 'MedipLine';
$iconologin = 'img/login.png';
$icono_pestaña = '<link rel="shortcut icon" href="img/icono.ico">';

// css
$estructura = '<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/estructura.css"> 
   <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.12.0-web/css/all.min.css">';
$estilos_login = '<link rel="stylesheet" type="text/css" href="css/estilos_login.css">';
$menu = '<link rel="stylesheet" type="text/css" href="css/menu.css">';
$consultar = '<link rel="stylesheet" type="text/css" href="css/consultar.css">';
$diagnosticar_css = '<link rel="stylesheet" type="text/css" href="css/diagnostico.css">';
$sugerir_css = '<link rel="stylesheet" type="text/css" href="css/sugerir.css">';
$historial_css = '<link rel="stylesheet" type="text/css" href="css/historial.css">';


// js
$js = '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

   <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>';     

$consultar_js = '<script type="text/javascript" src="js/consultar.js"></script>';
$sug_sintoma_js = '<script type="text/javascript" src="js/sugerirsintoma.js"></script>';
$historial_js = '<script type="text/javascript" src="js/historial.js"></script>';
$opciones_js = '<script type="text/javascript" src="js/opciones.js"></script>';

// estructuras
$menu1 = '
    <div class="row menu justify-content-center p-2">
      <div class="col">
        <div class="row justify-content-center">
          <div class="col-auto menu1a">
            <a href="indexlogin.php" class="aa">Relacionar <m class="fas fa-sync-alt fa-lg"></m></a>
          </div>
          <div class="col-auto menu1a">
            <a href="sugerencias.php" class="aa">Sugerencias <m class="fas fa-comment-medical fa-lg"></m></a>
          </div>
          <div class="col-auto menu1a">
            <a href="opciones.php" class="aa">Opciones <m class="fas fa-tools fa-lg"></m></a>
          </div>    
        </div>  
      </div>
      <div class="col-auto menu1a">
            <a href="php/salir.php" class="aa">Salir <m class="fas fa-power-off fa-lg"></m></a>
      </div>     
    </div>
';

$BotonSubir = '
<!-- Botón flotante para subir -->
<span id="scrollUp" title="Subir" class="fas fa-arrow-circle-up fas-lg" onclick="scrollup();"></span>
';
?>