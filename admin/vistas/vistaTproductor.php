<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTproductor.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{

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
	<style type="text/css">
		tr.agregada{
			border:1px solid green;
			padding: 2px;
			background: #ccc;
		}
	</style>
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
<div class='cont_frame' style="width: 95%;">
	<h1>Productor</h1>
	<table border='1' class='datos' align='center'>
		<tr>
			<td align='right'><span class='rojo'>*</span> Cedula o Rif:</td>
			<td><input type='text' disabled='disabled' maxlength='10' name='txtced_rif' value='<?php print($lcCed_rif);?>' id='txtced_rif' class='validate[required],custom[integer],maxSize[10],minSize[7]'/></td>
			<td align='right'><span class='rojo'>*</span> Tipo de Persona:</td>
			<td colspan="4">Natural <input type='radio' disabled="disabled" checked name='txttipo' value='1'/> Juridica <input type='radio' disabled="disabled" <?php if($lcTipo == 2) print "checked"; ?> name='txttipo' value='2'/> </td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Nombre o Razon Social:</td>
			<td colspan="3"><input type='text' disabled='disabled' maxlength='60' name='txtnom_rso' value='<?php print($lcNom_rso);?>' id='txtnom_rso' class='validate[required],maxSize[60],minSize[5]'/></td>
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
			<td align='right'><span class='rojo'>*</span> Telefono:</td>
			<td><input type='text' disabled='disabled' maxlength='11' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer],maxSize[11],minSize[11]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Correo:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtcorreo' value='<?php print($lcCorreo);?>' id='txtcorreo' class='validate[required],custom[email]'/></td>
			<td align='right'><span class='rojo'>*</span> Asociaciones:</td>
			<td>
				<select name="txtid_asociacion" id="txtid_asociacion" disabled="disabled">
					<option value="">Seleccione:</option>
					<?php print $objFunciones->crear_combo("tasociacion","id","nombre",$lcId_asociacion); ?>
				</select>
					
			</td>
		</tr>

		<input type='hidden' name='txtoperacion' value='des'>
		<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
	</table>
	<div class="cont_frame" style="width: 100%;">
		<h1>Unidades de Produccion</h1>
		<table border="1" class="datos" align="center">
			<tr>
				<td>Finca</td>
				<td>-</td>
			</tr>
			<tr>
				<td>
					<select id="finca" disabled="disabled">
						<option value="">Seleccione la Finca</option>
						<?php 
							print $objFunciones->crear_combo("tunidad_produccion WHERE ced_rif_productor IS NULL","id","nombre",NULL);
						?>
					</select>
				</td>
				<td><button onclick="add_detail();" type="button">+</button></td>
			</tr>
			<tbody id="load_detail">
				<?php print $fincas; ?>
			</tbody>
		</table>
	</div>
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
<script type="text/javascript">

	getElement = function(id){
		return document.getElementById(id);
	}

	getDataSelect = function(id){
		var tbody = getElement("load_data");
		var select = document.getElementById(id);
		var val = select.value;
		var tex = select.options[select.selectedIndex].text;
		var data = new Array();

		data.push({
			'val' : val,
			'text' : tex
		});
		console.log(val+" "+tex);

		return data[0];
	}


	add_detail = function(){
		var parent = getElement("load_detail");
		var o_finca = getDataSelect("finca");
		var finca_v = o_finca.val;
		var finca_t = o_finca.text;

		var cad = "";

		cad += "<tr>";
			cad += "<td>"+finca_t+"<input type='hidden' name='txtfincas[]' value='"+finca_v+"'/></td>";
			cad += "<td><button onclick='del_detail(this);'>X</button></td>";
		cad += "</tr>";

		parent.innerHTML += cad;

		var fields = new Array("finca");
		empty_fields(fields);

	}

	del_detail = function(e){
		var td = e.parentNode;
		var tr = td.parentNode;
		var tbody = tr.parentNode;

		tbody.removeChild(tr);
	}

	empty_fields = function(a){
		for(var i = 0; i < a.length; i++){
			document.getElementById(a[i]).value = "";
		}
	}

</script>
</body>
</html>