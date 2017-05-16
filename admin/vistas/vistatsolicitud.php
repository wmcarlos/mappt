<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
//require_once('../controladores/corTproductor.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
	//$id = $objFunciones->ultimo_id_plus1('tproductor','id');
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


<!--transacion1-->
<table id="transaccion1" class="transaccion_estile"   align="center" style="width: 80% !important;"> 
	<caption>Transaccion de persona</caption>
	<!-- Cabecera de la tabla -->
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Cedula</th>
			<th>Hospital</th>
			<th><input type="button" class="agregar" value="+"/></th>
		</tr>
	</thead>
	<!-- Cuerpo de la tabla con los campos -->
	<tbody>
		<!-- fila base a tomar en cuenta-->
		<tr class="tr_padre">
			<td>
				<input type="text" name="nombres[]"  />	
			</td>
			<td><input type="text"  name="apellidos[]"/></td>
			<td><input type="text" name="cedulas[]"/></td>
			<td>
				<select name="hopitales[]" >
					<option value="">Ingrese el hospital</option>
					<option value="1">San Carlos</option>
					<option value="2">HPO</option>
					<option value="3">Bicentenaria</option>
					<option value="4">Santa Maria</option>
				</select>
			</td>
			<td class="eliminar"><input type="button" value="-"></td>
		</tr>
		<!-- fin de código: fila base --> 
	</tbody>
</table>




<?php @include('despues_form.php'); ?>
</body>
</html>


</script>
