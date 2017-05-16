<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTunidad_produccion.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('tunidad_produccion','id');
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
<td align='right'><span class='rojo'>*</span> Productor:</td>
<td><select name='txtced_rif_productor' disabled='disabled' id='txtced_rif_productor' class='validate[required]'><option value=''>Seleccione</option></select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombre:</td>
<td><input type='text' disabled='disabled' maxlength='50' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required],maxSize[50],minSize[5]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Sector:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtid_sector' value='<?php print($lcId_sector);?>' id='txtid_sector' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Dirección:</td>
<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> UTM Norte:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtutm_norte' value='<?php print($lcUtm_norte);?>' id='txtutm_norte' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> UTM Este:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtutm_este' value='<?php print($lcUtm_este);?>' id='txtutm_este' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Superficie Total:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_total' value='<?php print($lcSuperficie_total);?>' id='txtsuperficie_total' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Superficie Aprovechable:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechable' value='<?php print($lcSuperficie_aprovechable);?>' id='txtsuperficie_aprovechable' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Superficie Aprovechada:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechada' value='<?php print($lcSuperficie_aprovechada);?>' id='txtsuperficie_aprovechada' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Croquis:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcroquisimg' value='<?php print($lcCroquisimg);?>' id='txtcroquisimg' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tec. Apoyo Produccion Pecuaria:</td>
<td>1 <input type='radio' name='txttap' value='Si'/> 2 <input type='radio' name='txttap' value='No'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Potreros:</td>
<td>1 <input type='radio' name='txttap_potreros' value='Si'/> 2 <input type='radio' name='txttap_potreros' value='No'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Cantidad de Potreros:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txttap_cant_potreros' value='<?php print($lcTap_cant_potreros);?>' id='txttap_cant_potreros' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo de Cerca:</td>
<td>1 <input type='radio' name='txttap_tipo_cerca' value='Convencional'/> 2 <input type='radio' name='txttap_tipo_cerca' value='Electrica'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Carga Animal x Ha:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txttap_carga_animal_an_ha' value='<?php print($lcTap_carga_animal_an_ha);?>' id='txttap_carga_animal_an_ha' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo de Pasto:</td>
<td>1 <input type='radio' name='txttap_tipo_pasto' value='Natural'/> 2 <input type='radio' name='txttap_tipo_pasto' value='Introducido'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Especie de Pasto:</td>
<td><input type='text' disabled='disabled' maxlength='30' name='txttap_especie_pasto' value='<?php print($lcTap_especie_pasto);?>' id='txttap_especie_pasto' class='validate[required],custom[onlyLetterSp],maxSize[30],minSize[5]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Superficie:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txttap_superficie' value='<?php print($lcTap_superficie);?>' id='txttap_superficie' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Ultimo Mantenimiento:</td>
<td><input type='text' disabled='disabled' name='txttap_ultimo_mantenimiento' value='<?php print($lcTap_ultimo_mantenimiento);?>' id='txttap_ultimo_mantenimiento' class='validate[required] fecha_formateada'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Fertilizacion:</td>
<td>1 <input type='radio' name='txttap_fertilizacion' value='Si'/> 2 <input type='radio' name='txttap_fertilizacion' value='No'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Maquinarias:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtmaquinariajs' value='<?php print($lcMaquinariajs);?>' id='txtmaquinariajs' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Implementos:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtimplementojs' value='<?php print($lcImplementojs);?>' id='txtimplementojs' class='validate[required]'/></td>
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