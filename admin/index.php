<?php 
  session_start();
  if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
      header("location: vistas/index.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Entrar</title>
<link href="../css/global.css" rel="stylesheet" type="text/css" />
<script src="vistas/js/jquery2.js"></script>
</head>
<body>
<div id="contenedor">
	<!--Estructura para el banner-->
    <div id="banner" style="height:auto;">
    	<img src="../img/banner.png" style='width:100%;'/>
    </div>
    <div id="nav">
        <ul id="jsddm" class="clearfix">
            <li><a href="../" <?php if($v=="home"){print 'class="active"'; } ?>>Inicio</a></li>
            <li><a href="../?v=about" <?php if($v=="about"){print 'class="active"'; } ?>>Quienes Somos</a></li>
            <li><a href="../?v=history" <?php if($v=="history"){print 'class="active"'; } ?>>Reseña Historica</a></li>
            <li><a href="../?v=news" <?php if($v=="news"){print 'class="active"'; } ?>>Noticias</a></li>
            <li><a href="../?v=contacts" <?php if($v=="contacts"){print 'class="active"'; } ?>>Contactanos</a></li>
        </ul>
   </div>
   <!--Contenedor del Contenido Central-->
   <div id="contenido">
        <div id="derecho" style="´position:relative;width: 100%">
        
		    <!--Cuadros para Colocar Informacion-->
        	<div class="cuadro" style="width: 300px;margin:0px auto; padding-bottom: ">
            	<h1 class="titulo2">Iniciar Sesion</h1>
                <p>
                    <table>
                        <form name="fentrar" action="controladores/corTusuario.php" method="post" autocomplete="off">
                        	<tr>
                            	<td>Usuario:</td>
                                <td><input type="text" name="txtnombre_usu" size="15" /></td>
                            </tr>
                            <tr>
                            	<td>Clave:</td>
                                <td><input type="password" name="txtclave" size="15" /></td>
                            </tr>
                             <tr>
								<td colspan="2" align="center"><input type="submit" name="btn_entrar" value="ENTRAR" /><input type="hidden" name="txtoperacion" value="ingresar" /></td>
                            </tr>
                            <tr>
								<td colspan="2" align="center"><a href="vistas/comprobar_usuario.php">¿Olvidaste Tu Contraseña?</a></td>
                            </tr>
                            <input type="hidden" name='txtoperacion' value='entrar'/>
                            </form>
                    </table>
                </p>
            </div>
            <br>
            <br>
            <span id="fecha" style="padding-right: 40px; padding-bottom: 10px;">Domingo, 10 de Noviembre del 2012</span>
        </div>
   </div>

   <!--Pie de Pagina-->
   <!--Pie de Pagina-->
  <div id="pie">
    <!--
      <ol class="style-footer">
        <li><a href=""><img src="../img/icono_agropatria.png"></a></li>
        <li><a href=""><img src="../img/icono_inti.png"></a></li>
        <li><a href=""><img src="../img/inder.png"></a></li>
        <li><a href=""><img src="../img/inia.png"></a></li>
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
<script type="text/javascript">
mostrar_mensaje = function(){
  <?php
    $error = (isset($_GET['valido']) and !empty($_GET['valido'])) ? $_GET['valido'] : "";
  ?>
  var error = '<?php print $error; ?>';
  if(error == "si"){
      alert("Contraseña Cambiada Con  Exito");
  }else if(error == "no"){
  	alert("Ocurrio un Error al Cambiar la Contraseña");
  }else if(error == "no_pass"){
  	alert("Usuario o Contraseña Invalidos");
  }else if( error == "bloqueado" ){
  	alert("Este Usuario esta Bloqueado");
  }else if( error == "user_block"){
  	alert("Has Superado el Limite de Intentos Fallidos, tu usuario a sido bloqueado");
  }
}

window.onLoad = mostrar_mensaje();
</script>