<?php
  session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cambiar Contrase&ntilde;a</title>
<link href="../../css/global.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
</head>
<body>
<div id="contenedor">
    <div id="banner" style="height:auto;">
       <img src="../../img/banner.png" style='width:100%;'/>
    </div>
    <!--Contenedor del Contenido Central-->
   <div id="contenido">
		<!--Contenido derecho-->
        <div id="derecho" style="width: 98%;">
         <span id="fecha">Domingo, 10 de Noviembre del 2012</span>
  				<p class="parrafo">
  					<div class="cuadro">
                <h1 class="titulo2">Nueva Contrase&ntilde;a</h1>
                  <p>
                      <table>
                          <form name="fentrar" action="../controladores/corTusuario.php" method="post" autocomplete="off">
                            <tr>
                                <td>Nueva Contrase&ntilde;a</td>
                                  <td> <input type="password" name="txtnueva_contra" size="15" /></td>
                              </tr>
                               <tr>
                  <td colspan="2" align="center"><a href="cerrar.php">Cancelar</a>  <input type="submit" name="btn_entrar" value="Responder" /><input type="hidden" name="txtoperacion" value="ingresar" /></td>
                              </tr>
                              <input type="hidden" name="txtnombre_usu" value="<?php print $_SESSION['user']; ?>">
                              <input type="hidden" name='txtoperacion' value='cambiar_contra'/>
                              </form>
                      </table>
                  </p>
              </div>
  				</p>
        </div>
   </div>
   <!--Pie de Pagina-->
   <div id="pie">
        <p id="contenido_pie"></p>
   </div>
</div>
</body>
</html>