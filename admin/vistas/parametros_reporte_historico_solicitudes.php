<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
$objFunciones = new clsFunciones;
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Reporte Historico Productor</title>
<?php print($objFunciones->librerias_generales); ?>
</head>
<body>
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
<form name='form1' id='form1' autocomplete='off' target="_blank" action="reporte_historico_solicitudes.php" method='post'/>
<div class='cont_frame'>
<h1>Parametros Reporte Historico Solicitudes</h1>
<table border='1' class='datos' align='center'>
<tr>
<td align='right'><span class='rojo'>*</span> Productor:</td>
<td>
	<select name="cedula" id="cedula">
		<option value="">Seleccione</option>
		<?php print $objFunciones->crear_combo("tproductor","ced_rif","nom_rso",NULL); ?>
	</select>
</td>
</tr>
<tr>
	<td colspan="2" align="center"><button type="submit">Generar Reporte</button></td>
</tr>
<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
</table>
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