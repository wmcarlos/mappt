<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTvisita.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
	$id = $objFunciones->ultimo_id_plus1('tvisita','id');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Visita</title>
<?php print($objFunciones->librerias_generales); ?>
<script>
function cargar()
{
	var operacion = '<?php print($operacion);?>';
	var listo = '<?php print($listo);?>';
	var desde = '<?php print ($_GET['desde']); ?>';

	if(operacion == "Nuevo" && desde == "coordinador"){
		Incluir('no');

		$(".btn-incluir, .btn-buscar, .btn-modificar, .btn-eliminar").hide();

		$("input[name='btncancelar']").attr("onclick","javascript:location.href='vistaTasignacion.php'");
	}

	if(operacion == 'buscar' && desde == 'coordinador'){
		Modificar();
		$(".btn-incluir, .btn-buscar, .btn-modificar, .btn-eliminar").hide();

		$("input[name='btncancelar']").attr("onclick","javascript:location.href='vistaTasignacion.php'");
	}

	if(operacion == 'buscar' && desde == 'tecnico'){
		Modificar();
		$(".btn-incluir, .btn-buscar, .btn-modificar, .btn-eliminar").hide();

		$("input[name='btncancelar']").attr("onclick","javascript:location.href='vistaTaplicarvisita.php'");
	}

	if(operacion == 'buscar' && desde == 'analista'){
		$(".btn-incluir, .btn-buscar, .btn-modificar, .btn-eliminar, .btn-guardar").hide();

		$("input[name='btncancelar']").attr("onclick","javascript:location.href='vistaTlistaanalisis.php'");
	}

	mensajes(operacion,listo);
	cargar_select(operacion,listo);
}
</script>
</head>
<body onload='cargar();'>
<?php print($objFunciones->cuadro_busqueda); ?>
<!--
	Codigo
	Antes del
	Formulario
	antes_form.php
-->
<?php @include('antes_form.php'); ?>
<div id='mensajes_sistema'></div><br />
<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>
</br>
<form name='form1' id='form1' autocomplete='off' method='post'/>
<div class='cont_frame'>
<h1>Programar Visita</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> id:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtid' value='<?php print($lcId);?>' id='txtid' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Solicitud:</td>
<td>
<select name='txtid_solicitud' disabled='disabled' id='txtid_solicitud' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("v_solicitud","nro_solicitud","concat(nro_solicitud,' - ',productor,' - ',unidad_produccion)",$lcId_solicitud); ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tecnico:</td>
<td><select name='txtid_tecnico' disabled='disabled' id='txtid_tecnico' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tusuario where tipo = 4","id_usuario","nombre_completo",$lcId_tecnico); ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Fecha:</td>
<td><input type='text' disabled='disabled' name='txtfecha' value='<?php print($lcFecha);?>' id='txtfecha' class='validate[required] fecha_formateada'/></td>
</tr>
<?php if($_GET['desde'] != "coordinador"){ ?>
<tr>
<td align='right'><span class='rojo'>*</span> Comentario:</td>
<td><textarea name='txtcomentario' maxlength='' disabled='disabled' id='txtcomentario' class='validate[required]'><?php print($lcComentario);?></textarea></td>
</tr>
<?php } ?>
<input type='hidden' name='txtdesde' value='<?php print $_GET['desde']; ?>'>
<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
</table>
<?php $objFunciones->botonera_general('Tvisita','total',$id); ?>
</div>
</form>
<!--
	Codigo
	Despues del
	Formulario
	despues_form.php
-->
<?php @include('despues_form.php'); ?>
</body>
</html>