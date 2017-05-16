<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTproductor.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('tproductor','id');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Productor</title>
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
<h1>Productor</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> id:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtid' value='<?php print($lcId);?>' id='txtid' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo de Persona:</td>
<td>1 <input type='radio' name='txttipo' value='Natural'/> 2 <input type='radio' name='txttipo' value='Juridica'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Cedula o Rif:</td>
<td><input type='text' disabled='disabled' maxlength='10' name='txtced_rif' value='<?php print($lcCed_rif);?>' id='txtced_rif' class='validate[required],custom[integer],maxSize[10],minSize[7]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombre o Razon Social:</td>
<td><input type='text' disabled='disabled' maxlength='60' name='txtnom_rso' value='<?php print($lcNom_rso);?>' id='txtnom_rso' class='validate[required],maxSize[60],minSize[5]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Sector:</td>
<td><select name='txtid_sector' disabled='disabled' id='txtid_sector' class='validate[required]'><option value=''>Seleccione</option></select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Dirección:</td>
<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Telefono:</td>
<td><input type='text' disabled='disabled' maxlength='11' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer],maxSize[11],minSize[11]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Correo:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcorreo' value='<?php print($lcCorreo);?>' id='txtcorreo' class='validate[required],custom[email]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Asociaciones:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtasociacionesjs' value='<?php print($lcAsociacionesjs);?>' id='txtasociacionesjs' class='validate[required]'/></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
</table>
<?php $objFunciones->botonera_general('Tproductor','total',$id); ?>
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