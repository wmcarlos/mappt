<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTsector.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('tsector','id');
}else{
	$municipios = $objFunciones->combo_segun_combo("tmunicipio","id","nombre","id_estado",$estado,$municipio);
	$parroquias = $objFunciones->combo_segun_combo("tparroquia","id","nombre","id_municipio",$municipio,$lcId_parroquia);
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Sector</title>
<?php print($objFunciones->librerias_generales); ?>
<script>
function cargar()
{
	var operacion = '<?php print($operacion);?>';
	var listo = '<?php print($listo);?>';
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
<h1>Sector</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> id:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtid' value='<?php print($lcId);?>' id='txtid' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombre:</td>
<td><input type='text' disabled='disabled' maxlength='30' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required],custom[onlyLetterSp],maxSize[30],minSize[5]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Estado al que Pertenece:</td>
<td><select name='txtid_estado' operacion="listar_municipios" load_data="txtid_municipio" disabled='disabled' id='txtid_estado' class='validate[required] select_change'>
	<option value=''>Seleccione</option>
	<?php print $objFunciones->crear_combo("testado","id","nombre",$estado); ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Municipio al que Pertenece:</td>
<td><select name='txtid_municipio' operacion="listar_parroquias" load_data="txtid_parroquia" disabled='disabled' id='txtid_municipio' class='validate[required] select_change'>
	<option value=''>Seleccione</option>
	<?php print $municipios; ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Parroquia a la que Pertenece:</td>
<td><select name='txtid_parroquia' disabled='disabled' id='txtid_parroquia' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $parroquias; ?>
</select></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
</table>
<?php $objFunciones->botonera_general('Tsector','total',$id); ?>
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