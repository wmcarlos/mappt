<?php
session_start();
require_once("../controladores/cortprogramacion_inspeccion.php");
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../modelos/clstprogramacion_inspeccion.php');
require_once("../modelos/clstusuario.php");
require_once('../modelos/clsTmaquinaria_implemento.php');
$objFunciones = new clsFunciones;
$objprogramacion_inspeccion = new clstprogramacion_inspeccion();
$produccion_vegetal = new clstprogramacion_inspeccion();
$produccion_apicola= new clstprogramacion_inspeccion();
$produccion_porcino = new clstprogramacion_inspeccion();
$objusuario = new clstusuario();
$table_inspeccion = $objprogramacion_inspeccion->listar_solicitudes_analista($_SESSION['user']);


$objMaquinariaimplementos = new clsTmaquinaria_implemento();
$viewarray_maquinaria = array();
$viewarray_implemento = array(); 
list($viewarray_maquinaria,$viewarray_implemento) = $objMaquinariaimplementos->listar_maquinaria_complementos();
//cierre de la funcion
//funcion para realizar checkex transaccional

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
<caption style="font-size: 14px !important;">Lista de inspecciones a analizar</caption>
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
	<td><a href="?solicitud=<?php echo $table_inspeccion[$i]['idsolicitud']; ?>&pos=<?php echo $i; ?>">Ver inspección</a></td>
</tr>
<?php } ?>
</table>

<?php 
}else{
	
?>	

<div id='mensajes_sistema'></div><br />
	<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>
	</br>
	<form name='form1' id='form1'  autocomplete='off' method='post'/>
	<input type="hidden" name="estatus_programacion" value="3">
	<div class='cont_frame'>
		<h1>Inspeccion Realizada</h1>
		<input type="hidden" name="nro_informe_inspeccion" value="<?php echo $table_inspeccion[$_GET['pos']]['nro_informe_inspeccion']; ?>">
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
				<td colspan="4" style="padding:10px; background-color: #ccc; color:black; font-weight: bold;"><center>DATOS A INSPECCIONAR</center></td>
			</tr>
			<input type="hidden" name="idunidad_produccion" value="<?php echo $table_inspeccion[$_GET['pos']]['idunidad_produccion']; ?>">
			<tr>
				<td align='right'><span class='rojo'>*</span> UTM Este:</td>
				<td><input type='text'  maxlength='' name='txtutm_este' value='<?php echo $table_inspeccion[$_GET['pos']]['utm_este']; ?>' id='txtutm_este' class='validate[required],custom[integer]'/></td>
				<td align='right'><span class='rojo'>*</span> UTM Norte:</td>
				<td><input type='text'  maxlength='' name='txtutm_norte' value='<?php echo $table_inspeccion[$_GET['pos']]['utm_norte']; ?>' id='txtutm_norte' class='validate[required],custom[integer]'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Potreros:</td>
				<td colspan="3"><input type='text'  maxlength='' name='txttap_cant_potreros' value='<?php echo $table_inspeccion[$_GET['pos']]['tap_cant_potreros']; ?>' id='txttap_cant_potreros' class='validate[required],custom[integer]'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Tipo de Cerca:</td>
				<td>Convencional <input  type='radio' checked name='txttap_tipo_cerca' disaled value='1' /> Electrica <input type='radio' name='txttap_tipo_cerca' <?php if($table_inspeccion[$_GET['pos']]['tap_tipo_cerca'] == 2){ print "checked"; } ?> value='2'/> </td>

				<td align='right'><span class='rojo'>*</span> Carga Animal x Ha:</td>
				<td><input type='text'  maxlength='' name='txttap_carga_animal_an_ha' value='<?php echo $table_inspeccion[$_GET['pos']]['tap_carga_animal_an_ha']?>' id='txttap_carga_animal_an_ha' class='validate[required],custom[integer]'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Superficie:</td>
				<td><input type='text'  maxlength='' name='txttap_superficie' value='<?php print($table_inspeccion[$_GET['pos']]['tap_superficie']);?>' id='txttap_superficie' class='validate[required],custom[integer]'/></td>
				<td align='right'><span class='rojo'>*</span> Ultimo Mantenimiento:</td>
				<td><input type='text'  name='txttap_ultimo_mantenimiento' value='<?php print($table_inspeccion[$_GET['pos']]['tap_ultimo_mantenimiento']);?>' id='txttap_ultimo_mantenimiento' class='validate[required] fecha_formateada'/></td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span> Fertilizacion:</td>
				<td colspan="4">Si <input type='radio' checked name='txttap_fertilizacion' value='1'/> No <input type='radio'  <?php if($table_inspeccion[$_GET['pos']]['tap_fertilizacion'] == 2){ print "checked"; }?> name='txttap_fertilizacion' value='2'/> </td>
			</tr>
			<tr>
			<?php
				$lcMaquinariajs = explode(',',$table_inspeccion[$_GET['pos']]['maquinariajs']);
			 ?>

				<td align='right'><span class='rojo'>*</span> Maquinarias:</td>
				<td colspan="4">
					<?php for($i=0; $i<count($viewarray_maquinaria); $i++){ ?>
					<input type="checkbox"  name="details_maquinarias[]" <?php if(isset($lcMaquinariajs)) echo $objFunciones->checked_transaccional($viewarray_maquinaria[$i]['id'], $lcMaquinariajs);  ?> value="<?php echo $viewarray_maquinaria[$i]['id']; ?>"> <?php echo $viewarray_maquinaria[$i]['nombre']; ?>
					<br>
					<?php }?>
				</td>
			</tr>
			<?php 
				$lcImplementojs = explode(',',$table_inspeccion[$_GET['pos']]['implementojs']);
			?>
			<tr>
				<td align='right'><span class='rojo'>*</span> Implementos:</td>
				<td colspan="4">
					<?php for($j=0; $j<count($viewarray_implemento); $j++){ ?>
					<input type="checkbox"  <?php if(isset($lcImplementojs)) echo $objFunciones->checked_transaccional($viewarray_implemento[$j]['id'], $lcImplementojs); ?>  name="details_implementos[]" value="<?php echo $viewarray_implemento[$j]['id']; ?>"> <?php echo $viewarray_implemento[$j]['nombre']; ?>
					<br>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="padding:10px; background-color: #ccc; color:black; font-weight: bold;"><center>PRODUCCIONES DE LA UNIDAD</center></td>
			</tr>
			<tr>
			<style type="text/css">
					.elementos_vegetal span,.elementos_apicola span{
						padding:10px;
						border:1px solid #ccc;
						font-size: 18px;
						background-color: #E3ECD8;
						color:black;
						display: inline-block;
					}

			</style>
				<td colspan="4" class="elementos_vegetal">
					<center><h2 style="background-color: #E3ECD8; color: white; font-size: 18px; font-weight: bold; padding: 10px; color:black;">Produccion Vegetal</h2></center>
					<br>
					<br>
					<?php 
						$array_vegetal = array();
						$array_vegetal = $produccion_vegetal->listar_produccion_vegetal_unidad($table_inspeccion[$_GET['pos']]['idunidad_produccion']);
						for($i=0; $i<count($array_vegetal);$i++){
					?><center>
						<span>
						Ciclo:
							<?php echo $array_vegetal[$i]['ciclo'] ?>
						</span>
					<span>
						Año:
						<?php echo $array_vegetal[$i]['ano'] ?>
					</span>
					<span>
						Rubro:
						<?php echo $array_vegetal[$i]['rubro'] ?>
					</span>
					<span>
						Superficie:
						<?php echo $array_vegetal[$i]['superficie'] ?>
					</span>
					<br>
					<br>
					<span>
						Superficie de cosecha:
							<?php echo $array_vegetal[$i]['superficie_de_cosecha'] ?>
					</span>
					<span>
						Rendimiento:
						<?php echo $array_vegetal[$i]['rendimiento'] ?>
					</span>
					<span>
						Produccion:
						<?php echo $array_vegetal[$i]['produccion'] ?>
					</span>
					<br>
					<br>
					<span>Riego:
							<?php echo $array_vegetal[$i]['riego'] ?>
						
					</span>
					<span>
						Superficie Bajo Riego:
						<?php echo $array_vegetal[$i]['superficiebajoriego'] ?>
					</span>
					<span>
						Superficie Regada:
						<?php echo $array_vegetal[$i]['superficie_regada'] ?>
					</span>
					<br>
					</center>
					<?php  } ?>
				</td>

				<!--produccion apicola-->
					<td colspan="4" class="elementos_apicola" style="display: none;">
					<center><h2 style="background-color: #E3ECD8; color: white; font-size: 18px; font-weight: bold; padding: 10px; color:black;">Produccion Apicola</h2></center>
					<br>
					<br>
					<?php 
						$view_array_apicola= array();
						$view_array_apicola = $produccion_apicola->listar_produccion_apicola_unidad($table_inspeccion[$_GET['pos']]['idunidad_produccion']);
						//print_r($view_array_apicola);
						
						for($j=0; $j<count($view_array_apicola);$j++){
					?><center>
					<span>
						Rubro:
						<?php echo $view_array_apicola[$j]['rubro'] ?>
					</span>
					<span>
						Cantidad:
						<?php echo $view_array_apicola[$j]['cantidad'] ?>
					</span>
					<span>
						Produccion Mensual:
							<?php echo $view_array_apicola[$j]['produccion_mensual'] ?>
					</span>
					<span>
						Unidad de medida:
						<?php echo $view_array_apicola[$j]['unidad_medida'] ?>
					</span>
					<br>
					</center>
					<?php  } ?>
				</td>
			
			</tr>

			<tr>
				<td align='right'><span class='rojo'>*</span> Aprobacion de Certificado:</td>
				<td colspan="3">
					SI: <input type="radio" name="">
					NO: <input type="radio" name="">
				</td>
			</tr>
			<tr>
				<td align='right'><span class='rojo'>*</span>Descripcion del porque?</td>
				<td colspan="3"><textarea style="width: 100%; height: 60px;"></textarea></td>
			</tr>
			</table>
			</div>


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