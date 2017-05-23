<?php
session_start();
require_once("../controladores/cortprogramacion_inspeccion.php");
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../modelos/clstprogramacion_inspeccion.php');
require_once("../modelos/clstusuario.php");
require_once('../modelos/clsTmaquinaria_implemento.php');
//obtener en formato array list los implementos y maquinarias por separado
$objMaquinariaimplementos = new clsTmaquinaria_implemento();
$viewarray_maquinaria = array();
$viewarray_implemento = array(); 
list($viewarray_maquinaria,$viewarray_implemento) = $objMaquinariaimplementos->listar_maquinaria_complementos();
//cierre de la funcion
//funcion para realizar checkex transaccional

$objFunciones = new clsFunciones;
$objprogramacion_inspeccion = new clstprogramacion_inspeccion();
$objusuario = new clstusuario();
$table_inspeccion = $objprogramacion_inspeccion->listar_solicitudes_inspector($_SESSION['user']);
//esto lo utilizaremos al a hora de enviarlo a la analista
$data_analista = $objusuario->listar_usuarios(4);

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
<caption style="font-size: 14px !important;">Mis solicitudes de inspeccion</caption>
<tr>
	<th>Fecha Asignacion</th>
	<th>Productor</th>
	<th>Unidad de Produccion</th>
	<th>Superficie Total</th>
	<th>Superficie Aprovechable</th>
	<th>Superficie Aprovechada</th>
	<th>Sector</th>
	<th>Observación</th>
	<th></th>

</tr>
<?php for($i=0; $i<count($table_inspeccion); $i++){ ?>
<tr>
	<td><?php echo $table_inspeccion[$i]['fecha_asignacion']; ?></td>
	<td><?php echo $table_inspeccion[$i]['nombre_productor']; ?></td>
	<td><?php echo $table_inspeccion[$i]['unidad_produccion']; ?></td>
	<td><?php echo $table_inspeccion[$i]['superficie_total']; ?></td>
	<td><?php echo $table_inspeccion[$i]['superficie_aprovechable']; ?></td>
	<td><?php echo $table_inspeccion[$i]['superficie_aprovechada']; ?></td>
	<td><?php echo $table_inspeccion[$i]['sector']; ?></td>
	<td><?php echo $table_inspeccion[$i]['observacion']; ?></td>
	<td><a href="?solicitud=<?php echo $table_inspeccion[$i]['idsolicitud']; ?>&pos=<?php echo $i; ?>">Ejecutar Inspección</a></td>
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
	<input type="hidden" name="estatus_programacion" value="3">
	<div class='cont_frame'>
		<h1>Inspeccion Tecnica</h1>
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
				<td align='right'><span class='rojo'>*</span>Cedula</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['cedula_rif_productor']; ?></td>
				<td align='right'><span class='rojo'>*</span>Telefono</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['telefono_productor']; ?></td>
			</tr>
				<tr>
				<td align='right'><span class='rojo'>*</span>Correo</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['correo_productor']; ?></td>
				<td align='right'><span class='rojo'>*</span>Direccion</td>
				<td><?php echo $table_inspeccion[$_GET['pos']]['direccion_productor']; ?></td>
			</tr>
			<tr>
				<td align='right' style="background-color: #C0C0C0;"><span class='rojo'>*</span>Unidad de producción</td>
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
				<td align='right'><span class='rojo'>*</span>Fecha revision</td>
				<td>
					<input type="hidden" name="fecha_revision">
					<strong><?php echo @date('Y-m-d'); ?></strong>
				</td>
			</tr>
			<!--DATOS A RELLENAR DE LA UNIDAD PRODUCTIVA-->
			<tr>
				<td align='right'><span class='rojo'>*</span> UTM Este:</td>
				<td><input type='text'  maxlength='' name='txtutm_este' value='<?php print($lcUtm_este);?>' id='txtutm_este' class='validate[required],custom[integer]'/></td>
				<td align='right'><span class='rojo'>*</span> UTM Norte:</td>
				<td><input type='text'  maxlength='' name='txtutm_norte' value='<?php print($lcUtm_norte);?>' id='txtutm_norte' class='validate[required],custom[integer]'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Croquis:</td>
				<td><input type='file'  maxlength='' name='txtcroquisimg' value='<?php print($lcCroquisimg);?>' id='txtcroquisimg' /></td>
				<td align='right'><span class='rojo'>*</span> Tec. Apoyo Produccion Pecuaria:</td>
				<td>Si <input type='radio' checked name='txttap' value='1'/> No <input type='radio'  <?php if($lcTap == 2){ print "checked"; } ?> name='txttap' value='2'/> </td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Potreros:</td>
				<td colspan="3"><input type='text' disabled='disabled' maxlength='' name='txttap_cant_potreros' value='<?php print($lcTap_cant_potreros);?>' id='txttap_cant_potreros' class='validate[required],custom[integer]'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Tipo de Cerca:</td>
				<td>Convencional <input type='radio' checked name='txttap_tipo_cerca' disaled value='1'/> Electrica <input type='radio' disabled name='txttap_tipo_cerca' <?php if($lcTap_tipo_cerca == 2){ print "checked"; } ?> value='2'/> </td>
				<td align='right'><span class='rojo'>*</span> Carga Animal x Ha:</td>
				<td><input type='text' disabled='disabled' maxlength='' name='txttap_carga_animal_an_ha' value='<?php print($lcTap_carga_animal_an_ha);?>' id='txttap_carga_animal_an_ha' class='validate[required],custom[integer]'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Superficie:</td>
				<td><input type='text' disabled='disabled' maxlength='' name='txttap_superficie' value='<?php print($lcTap_superficie);?>' id='txttap_superficie' class='validate[required],custom[integer]'/></td>
				<td align='right'><span class='rojo'>*</span> Ultimo Mantenimiento:</td>
				<td><input type='text' disabled='disabled' name='txttap_ultimo_mantenimiento' value='<?php print($lcTap_ultimo_mantenimiento);?>' id='txttap_ultimo_mantenimiento' class='validate[required] fecha_formateada'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Fertilizacion:</td>
				<td colspan="4">Si <input type='radio' disabled checked name='txttap_fertilizacion' value='1'/> No <input type='radio' disabled <?php if($lcTap_fertilizacion == 2){ print "checked"; }?> name='txttap_fertilizacion' value='2'/> </td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Maquinarias:</td>
				<td colspan="4">
					<?php for($i=0; $i<count($viewarray_maquinaria); $i++){ ?>
					<input type="checkbox" disabled name="details_maquinarias[]" <?php if(isset($lcMaquinariajs)) echo $objFunciones->checked_transaccional($viewarray_maquinaria[$i]['id'], $lcMaquinariajs);  ?> value="<?php echo $viewarray_maquinaria[$i]['id']; ?>"> <?php echo $viewarray_maquinaria[$i]['nombre']; ?>
					<br>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Implementos:</td>
				<td colspan="4">
					<?php for($j=0; $j<count($viewarray_implemento); $j++){ ?>
					<input type="checkbox" disabled <?php if(isset($lcImplementojs)) echo $objFunciones->checked_transaccional($viewarray_implemento[$j]['id'], $lcImplementojs); ?>  name="details_implementos[]" value="<?php echo $viewarray_implemento[$j]['id']; ?>"> <?php echo $viewarray_implemento[$j]['nombre']; ?>
					<br>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<center>
						<input type="button" value="Produccion Vegetal">
						<input type="button" value="Produccion Pecuaria">
						<input type="button" value="Produccion Pescera">
						<input type="button" value="Produccion Avicola">
						<input type="button" value="Produccion Porcino">
					</center>
				</td>
			</tr>

			<!--AQUI SERIAN LOS DATOS A RELLENAR DE LA UNIDAD PRODUCTIVA-->
			<tr>
				<td align='right'><span class='rojo'>*</span>Analista de inspeccion</td>
				<td colspan="3">
					<select name="inspector_tecnico">
						<option value="">Seleccione el inspector tecnico</option>
						<?php for($ins=0; $ins<count($data_analista); $ins++){ ?>
							<option value="<?php echo $data_analista[$ins]['nombre_usu']; ?>"><?php echo $data_analista[$ins]['nombre_completo']; ?></option>
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
		<input type="submit" name="btnguardar2"  value="Enviar inspeccion">
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