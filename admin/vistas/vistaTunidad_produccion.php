<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTunidad_produccion.php');

$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
	$id = $objFunciones->ultimo_id_plus1('tunidad_produccion','id');
}else{
	//$municipios = $objFunciones->combo_segun_combo("tmunicipio","id","nombre","id_estado",$estado,$municipio);
	//$parroquias = $objFunciones->combo_segun_combo("tparroquia","id","nombre","id_municipio",$municipio,$parroquia);
	//$sectores = $objFunciones->combo_segun_combo("tsector","id","nombre","id_parroquia",$parroquia,$lcId_sector);
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title>Gestion Unidad de Produccion</title>
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
	<h1>Unidad de Produccion</h1>
	<table border='1' class='datos' align='center'>
		<tr style='display:none;'>
			<td align='right'><span class='rojo'>*</span> id:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtid' value='<?php print($lcId);?>' id='txtid' class='validate[required]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Nombre:</td>
			<td colspan="3"><input type='text' disabled='disabled' maxlength='50' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required],maxSize[50],minSize[5]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Estado:</td>
			<td><select disabled='disabled' name='txtid_estado' id='txtid_estado' operacion="listar_municipios" load_data="txtid_municipio" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $objFunciones->crear_combo("testado","id","nombre",$estado); ?>
			</select></td>
			<td align='right'><span class='rojo'>*</span> Municipio:</td>
			<td><select disabled='disabled' name='txtid_municipio' id='txtid_municipio' operacion="listar_parroquias" load_data="txtid_parroquia" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $municipios; ?>
			</select></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Parroquia:</td>
			<td><select disabled='disabled' name='txtid_parroquia' id='txtid_parroquia' operacion="listar_sectores" load_data="txtid_sector" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $parroquias; ?>
			</select></td>
			<td align='right'><span class='rojo'>*</span> Sector:</td>
			<td><select disabled='disabled' name='txtid_sector' id='txtid_sector' class='validate[required]'>
				<option value="">Seleccione</option>
				<?php print $sectores; ?>
			</select></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Dirección:</td>
			<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
			<td align='right'><span class='rojo'>*</span> UTM Norte:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtutm_norte' value='<?php print($lcUtm_norte);?>' id='txtutm_norte' class='validate[required],custom[integer]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> UTM Este:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtutm_este' value='<?php print($lcUtm_este);?>' id='txtutm_este' class='validate[required],custom[integer]'/></td>
			<td align='right'><span class='rojo'>*</span> Superficie Total:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_total' value='<?php print($lcSuperficie_total);?>' id='txtsuperficie_total' class='validate[required],custom[integer]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Superficie Aprovechable:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechable' value='<?php print($lcSuperficie_aprovechable);?>' id='txtsuperficie_aprovechable' class='validate[required],custom[integer]'/></td>
			<td align='right'><span class='rojo'>*</span> Superficie Aprovechada:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechada' value='<?php print($lcSuperficie_aprovechada);?>' id='txtsuperficie_aprovechada' class='validate[required],custom[integer]'/></td>
		</tr>
		<input type='hidden' name='txtoperacion' value='des'>
		<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
	</table>
	<?php $objFunciones->botonera_general('Tunidad_produccion','total',$id); ?>
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