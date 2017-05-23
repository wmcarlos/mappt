<?php
require_once("../controladores/cortprogramacion_inspeccion.php");
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../modelos/clstprogramacion_inspeccion.php');
require_once("../modelos/clstusuario.php");
$objFunciones = new clsFunciones;
$objprogramacion_inspeccion = new clstprogramacion_inspeccion();
$objusuario = new clstusuario();
$table_inspeccion = $objprogramacion_inspeccion->listar_solicitudes();
$data_inspector = $objusuario->listar_usuarios(4);
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

<?php if(!isset($_GET['solicitud']) or empty($_GET['solicitud'])){ ?>
<center>
<table style="" align="center" class="table-solicitudes">
<caption style="font-size: 14px !important;">Listado de solicitudes</caption>
<tr>
	<th>Fecha Recepción</th>
	<th>Productor</th>
	<th>Unidad de Produccion</th>
	<th>Superficie Total</th>
	<th>Superficie Aprovechable</th>
	<th>Superficie Aprovechada</th>
	<th>Sector</th>
	<th></th>

</tr>
<?php for($i=0; $i<count($table_inspeccion); $i++){ ?>
<tr>
	<td><?php echo $table_inspeccion[$i]['fecha_recepcion']; ?></td>
	<td><?php echo $table_inspeccion[$i]['nombre_productor']; ?></td>
	<td><?php echo $table_inspeccion[$i]['unidad_produccion']; ?></td>
	<td><?php echo $table_inspeccion[$i]['superficie_total']; ?></td>
	<td><?php echo $table_inspeccion[$i]['superficie_aprovechable']; ?></td>
	<td><?php echo $table_inspeccion[$i]['superficie_aprovechada']; ?></td>
	<td><?php echo $table_inspeccion[$i]['sector']; ?></td>
	<td><a href="?solicitud=<?php echo $table_inspeccion[$i]['idsolicitud']; ?>&pos=<?php echo $i; ?>">Programar Inspección</a></td>
</tr>
<?php } ?>
</table>

<?php 
}else{
	
?>	

	<div id='mensajes_sistema'></div><br />
	<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>
	</br>
	<form name='form1' id='form1' action="?" autocomplete='off' method='post'/>
	<input type="hidden" name="estatus_programacion" value="2">
	<div class='cont_frame'>
		<h1>Programar Inspección de unidad productiva</h1>
		<table border='1' class='datos' align='center'>
			<tr>
				<td align='right'><span class='rojo'>*</span>Nro Solicitud:</td>
				<td colspan="3"><input name="idsolicitud" type='text' readonly="readonly"  value="<?php echo $table_inspeccion[$_GET['pos']]['idsolicitud']; ?>" /></td>
			</tr>

			<tr>
				<td align='right'><span class='rojo'>*</span>Fecha de solicitud</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['fecha_recepcion']; ?></td>
				<td align='right'><span class='rojo'>*</span>Productor</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['nombre_productor']; ?></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span>Unidad de producción</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['unidad_produccion']; ?></td>
				<td align='right'><span class='rojo'>*</span>Sector</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['sector']; ?></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span>Superficie Total</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['superficie_total']; ?></td>
				<td align='right'><span class='rojo'>*</span>Superficie Aprovechable</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['superficie_aprovechable']; ?></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span>Superficie Aprovechada</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['superficie_aprovechada']; ?></td>
				<td align='right'><span class='rojo'>*</span>Fecha de asignacion</td>
				<td><input type="date" name="fecha_asignacion"></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span>Inspector Tecnico Asignado</td>
				<td colspan="3">
					<select name="inspector_tecnico">
						<option value="">Seleccione el inspector tecnico</option>
						<?php for($ins=0; $ins<count($data_inspector); $ins++){ ?>
							<option value="<?php echo $data_inspector[$ins]['nombre_usu']; ?>"><?php echo $data_inspector[$ins]['nombre_completo']; ?></option>
						<?php } ?> 
					</select>
				</td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span>Observación</td>
				<td colspan="3">
					<textarea name="observacion" style="width: 100%; height: 30px;"></textarea>
				</td>
			</tr>
		</table>
		<br>
		<input type="submit" name="btnguardar2"  value="Enviar Programación">
	</div>
	</form>


<?php
}?>
</table>
</center>





<?php @include('despues_form.php'); ?>
</body>
</html>
<style type="text/css">
	.table-solicitudes{
		margin-bottom: 20px !important;
		width: 700px !important;
		overflow:scroll;
	}
	.table-solicitudes caption{
		padding:10px;
		font-size: 16px;
		font-weight: bold;
		background-color: #199611;
		color:white;
	}
	.table-solicitudes tr th,.table-solicitudes tr td{
		font-size: 14px !important;
		padding:5px;
		border:1px solid #B9B9B9;
	}

</style>