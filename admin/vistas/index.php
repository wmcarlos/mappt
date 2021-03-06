<?php
session_start();
  if(!isset($_SESSION['user']) && empty($_SESSION['user'])){
      header("location: ../index.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de Administracion</title>
<link href="../../css/global.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div id="contenedor">
    <!--Estructura para el banner-->
    <div id="banner" style="height:auto;">
        <img src="../../img/banner.png" style='width:100%;'/>
    </div>
	<!--Menu de Navegacion-->
    <div id="nav">
        <?php include("menu.php"); ?>
   </div>
   <!--Contenedor del Contenido Central-->
   <div id="contenido">
		<!--Contenido Derecho-->
        <div id="derecho">
        <span id="fecha">Domingo, 10 de Noviembre del 2012</span>
		    <!--Cuadros para Colocar Informacion-->
            <div class="cuadro">
            	<h1 class="titulo2">Bienvenido</h1>
                <p>
                    Usuario : <?php print $_SESSION['full_name'] ?>
                </p>
            </div>
        </div>
   </div>
   <!--Pie de Pagina-->
   <!--Pie de Pagina-->
    <div id="pie">
      <!--<ol class="style-footer">
        <li><a href=""><img src="../../img/icono_agropatria.png"></a></li>
        <li><a href=""><img src="../../img/icono_inti.png"></a></li>
        <li><a href=""><img src="../../img/inder.png"></a></li>
        <li><a href=""><img src="../../img/inia.png"></a></li>
      </ol>-->
      <p id="contenido_pie"></p>
  </div>
</div>
</body>
</html>
<style type="text/css">
  .style-footer{
    list-style: none;
  }
  .style-footer li{
    display: inline;
    margin-left: 10px;
  }

</style>