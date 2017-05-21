<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
//require_once('../controladores/corTproductor.php');
require_once("../modelos/clsTunidad_produccion.php");
require_once('../controladores/corTsolicitud.php');
require_once('../modelos/clsTasociacion.php');


/*vamos a traernos el codigo de la ultima unidad de produccion registrada*/
$objunidad_produccion = new clsTunidad_produccion();
$tunidad_produccion = $objunidad_produccion->traer_codigo_unidadproduccion();



$objtasociacion = new clsTasociacion();
$viewarray_asociaciones = array();
$viewarray_asociaciones  = $objtasociacion->listar_asociaciones();

$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
	$id = $objFunciones->ultimo_id_plus1('tproductor','id');
}else{
	$municipios = $objFunciones->combo_segun_combo("tmunicipio","id","nombre","id_estado",$estado,$municipio);
	$parroquias = $objFunciones->combo_segun_combo("tparroquia","id","nombre","id_municipio",$municipio,$parroquia);
	$sectores = $objFunciones->combo_segun_combo("tsector","id","nombre","id_parroquia",$parroquia,$lcId_sector);
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
<center><h1 style="font-size: 30px;">Certificación</h1></center>
<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>

<!--creando el step-->
<br>
<center><ol class="ol-step">
	<!--<li class="step" tagstep="0">1</li>
	<li class="step" tagstep="1">2</li>
	<li class="step" tagstep="2">3</li>
	<li class="step" tagstep="3">4</li>-->	
</ol></center>
</br>
<form name='form1' id='form1' autocomplete='off' method='post'/>
<div class='cont_frame'>
	<h1>Productor </h1>
	<table border='1' class='datos' align='center'>
		<tr>
			<td align='right'><span class='rojo'>*</span> Tipo de Persona:</td>
			<td colspan="4">Natural <input type='radio' checked name='txttipo' value='1'/> Juridica <input type='radio' <?php if($lcTipo == 2) print "checked"; ?> name='txttipo' value='2'/> </td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Cedula o Rif:</td>
			<td><input type='text' disabled='disabled' maxlength='10' name='txtced_rif' value='<?php print($lcCed_rif);?>' id='txtced_rif' class='validate[required],custom[integer],maxSize[10],minSize[7]'/></td>
			<td align='right'><span class='rojo'>*</span> Nombre o Razon Social:</td>
			<td><input type='text' disabled='disabled' maxlength='60' name='txtnom_rso' value='<?php print($lcNom_rso);?>' id='txtnom_rso' class='validate[required],maxSize[60],minSize[5]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Estado:</td>
			<td><select disabled='disabled' name='txtid_productor_estado' id='txtid_productor_estado' operacion="listar_municipios" load_data="txtid_productor_municipio" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $objFunciones->crear_combo("testado","id","nombre",$estado); ?>
			</select></td>
			<td align='right'><span class='rojo'>*</span> Municipio:</td>
			<td><select disabled='disabled' name='txtid_productor_municipio' id='txtid_productor_municipio' operacion="listar_parroquias" load_data="txtid_productor_parroquia" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $municipios; ?>
			</select></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Parroquia:</td>
			<td><select disabled='disabled' name='txtid_productor_parroquia' id='txtid_productor_parroquia' operacion="listar_sectores" load_data="txtid_productor_sector" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $parroquias; ?>
			</select></td>
			<td align='right'><span class='rojo'>*</span> Sector:</td>
			<td><select disabled='disabled' name='txtid_productor_sector' id='txtid_productor_sector' class='validate[required]'>
				<option value="">Seleccione</option>
				<?php print $sectores; ?>
			</select></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Dirección:</td>
			<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
			<td align='right'><span class='rojo'>*</span> Telefono:</td>
			<td><input type='text' disabled='disabled' maxlength='11' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer],maxSize[11],minSize[11]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Correo:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtcorreo' value='<?php print($lcCorreo);?>' id='txtcorreo' class='validate[required],custom[email]'/></td>
			<td align='right'><span class='rojo'>*</span> Asociaciones:</td>
			<td>
				<?php for($i=0; $i<count($viewarray_asociaciones); $i++){ ?>
				<input type="checkbox" name="txtasociacionesjs[]" <?php if(isset($lcAsociacionesjs)) echo $objFunciones->checked_transaccional($viewarray_asociaciones[$i]['id'], $lcAsociacionesjs);  ?> value="<?php echo $viewarray_asociaciones[$i]['id']; ?>"> <?php echo $viewarray_asociaciones[$i]['nombre']; ?>
				<br>
				<?php }?>
			</td>
		</tr>

		<input type='hidden' name='txtoperacion' value='des'>
		<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
	</table>
	<?php //$objFunciones->botonera_general('Tproductor','total',$id); ?>
</div>


<!--#################################DATOS DE LA UNIDAD DE PRODUCCION############################-->
<div class='cont_frame'>
	<h1>Datos de la Unidad de Produccion</h1>
	<table border='1' class='datos' align='center'>
		<tr style=''>
			<td align='right'><span class='rojo'>*</span> id:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtid_unidad' value='<?php print($tunidad_produccion['txtid_unidad']+1);?>' id='txtid' class='validate[required]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Nombre:</td>
			<td colspan="3"><input style="width:80%;" type='text' disabled='disabled' maxlength='50' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required],maxSize[50],minSize[5]'/></td>
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
			<td><textarea name='txtdireccion_unidad' maxlength='' disabled='disabled' id='txtdireccion_unidad' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
			<td align='right'><span class='rojo'>*</span> Superficie Total:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_total' value='<?php print($lcSuperficie_total);?>' id='txtsuperficie_total' class='validate[required],custom[integer]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Superficie Aprovechable:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechable' value='<?php print($lcSuperficie_aprovechable);?>' id='txtsuperficie_aprovechable' class='validate[required],custom[integer]'/></td>
			<td align='right'><span class='rojo'>*</span> Superficie Aprovechada:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechada' value='<?php print($lcSuperficie_aprovechada);?>' id='txtsuperficie_aprovechada' class='validate[required],custom[integer]'/></td>
		</tr>

	</table>
</div>

<!--REQUISITOS PREVIOS-->
<div class='cont_frame'>
	<h1>Documentos Requeridos para certificación</h1>
	<p style="background-color: #D9D9D9;padding: 10px; color: red; font-weight: bold; text-align: center;">A continuación se presentan los documentos que validan  la condición como productor agrícola ante la UTMPPAT - PORTUGUESA</p>
	<table border='1' class='datos' align='center'>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="1">1.- NOTA DE INSCRIPCIÓN DEL REGISTRO UNICO NACIONAL DE PRODUCTORES Y PRODUCTORAS AGRÍCOLAS (RUNOPPA) DEL SOLICITANTE</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="2">2.- FOTOCOPIA DE LA CÉDULA DE IDENTIDAD DEL SOLICITANTE</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="3">3.- FOTOCOPIA DEL REGISTRO DE INFORMACIÓN FISCAL (R.I.F.) DEL SOLICITANTE	</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="4">4.- DOCUMENTOS QUE ACREDITEN ADJUDICACIÓN O GARANTIA DE PERMANENCIA DE TIERRAS, EMITIDO POR EL INSTITUTO NACIONAL DE TIERRAS (INTi)</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="5">5.- PLANOS DE LA UNIDAD DE PRODUCCIÓN EMITIDO POR EL EL INSTITUTO NACIONAL DE TIERRAS (INTi) CON COORDENADAS UTM</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="6">6.- CONSTANCIA DE OCUPACIÓN DE UNIDAD DE PRODUCCIÓN, EMITIDA POR EL CONSEJO COMUNAL CORRESPONDIENTE A LA UBICACIÓN POLÍTICO TERRITORIAL</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="7">7.-  (SI POSEE) – FOTOCOPIA DEL CERTIFICADO DE REGISTRO NACIONAL DE PRODUCTORES, ASOCIACIONES, EMPRESAS DE SERVICIOS, COOPERATIVAS Y ORGANIZACIONES, ASOCIACIONES ECONÓMICAS DE PRODUCTORAS AGRÍCOLAS</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="documentos[]" value="8">8.- CARPETA MARRÓN CON GANCHOS – TAMAÑO OFICIO</td>
		</tr>
	</table>
</div>
<!--OBTENIENDO LOS REQUISITOS PREVIOS-->


<!--datos del funcionario receptor-->
<div class='cont_frame'>
	<table border='1' class='datos' align='center'>
	<tr>
		<input type="hidden" name="funcionario_receptor" value="<?php print $_SESSION['user']; ?>">
		<td>Funcionario Receptor: <input type="text" name="" value="<?php print $_SESSION['full_name'] ?>" readonly="readonly"></td>
		<td>Oficina: <input type="text" name="oficina_area"></td>
	</tr>
	<tr>
		<td>Numero Registro del productor: <input type="text" name="num_registro_productor"></td>
		<td>Numero de Certificado Runnopa: <input type="text" name="num_registro_productor"></td>
	</tr>
	</table>
</div>
<!--cierre de los datos del funcionario receptor-->


<?php $objFunciones->botonera_general('Tsolicitud','total',$id); ?>
</form><!--cierre del formulario completo-->




<?php @include('despues_form.php'); ?>
</body>
</html>
<style type="text/css">
	ol li.step{
		display: inline;
		padding:10px 15px;
		border:1px solid  #ccc;
		font-size: 25px;
		background-color: #ccc;
		color:black;
		font-weight: bold;
		cursor: pointer;
	}
	ol li.step:hover{
		background-color: #6D6D6D;
		color:white;
	}
	.step_active{
		background-color: #6D6D6D !important;		
	}

</style>
<script type="text/javascript">
	
	jQuery(document).ready(function($){

		$(".cont_frame").each(function(i){
			if(i>0){
				$(this).hide(0);
			}
			if(i==0){
				$(".ol-step").append('<li class="step" tagstep="'+i+'" >'+(i+1)+'</li>');
			}else{
				$(".ol-step").append('<li class="step step_active" tagstep="'+i+'" >'+(i+1)+'</li>');
			}
		});
		$(document).on('click','li.step',function(){
			tagstep = parseInt($(this).attr('tagstep'));
			$(".cont_frame").hide(0);
			$(".cont_frame").eq(tagstep).fadeIn(200);
			//activamos el boton
			$(".ol-ste li").removeClass('step_active');
			//dejamos activado el formulario en donde nos encontramos
			$(this).nextAll().removeClass("step_active");
			$(this).prevAll().removeClass("step_active");
			$(this).addClass("step_active");


		});

	
	});
</script>
