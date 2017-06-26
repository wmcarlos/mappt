<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTsolicitud.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1("tsolicitud","nro_solicitud");
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Solicitud</title>
<?php print($objFunciones->librerias_generales); ?>
<script>
  $(document).ready(function(){
	    var availableTags = [

	    <?php 
	    	for($i = 0; $i < count($productores); $i++){
	    		if( ($i+1) == count($productores) ){
	    			print '"'.$productores[$i]['ced_rif'].'_'.$productores[$i]['nom_rso'].'"';
	    		}else{
	    			print '"'.$productores[$i]['ced_rif'].'_'.$productores[$i]['nom_rso'].'",';
	    		}
	    	}
	    ?>
	    ];
	    $( "#txtcedula_rif_productor" ).autocomplete({
	      source: availableTags,

	      select : function(event, ui){
	      	event.preventDefault();

	      	var part = ui.item.value.split("_");
	      	$("#txtcedula_rif_productor").val(part[0]);
	      	$("#nom_rso").val(part[1]);

	      	$.get("../controladores/print_data_ajax.php",{ operacion : 'get_full_producto_data', cedula : part[0] },function(data){
	      		var arr = $.parseJSON(data);

	      		$("#tipo_persona").val(arr[0].tipo);
	      		$("#correo").val(arr[0].correo);
	      		$("#telefono").val(arr[0].telefono);

	      	});

	      	$.get("../controladores/print_data_ajax.php",{ operacion : 'get_all_unidades_produccion', cedula : part[0] },function(data){
	      		$("#unidades_produccion").html(data);
	      	});

	      }
	    });
  } );


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
<h1>Solicitud</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Nro Solicitud:</td>
<td><input type='text' disabled='disabled' readonly="readonly" maxlength='' name='txtnro_solicitud' value='<?php print($lcNro_solicitud);?>' id='txtnro_solicitud' class='validate[required]'/></td>
<td align='right'><span class='rojo'>*</span> Fecha Recepcion:</td>
<td><input type='text' readonly="readonly" disabled='disabled' maxlength='' name='txtfecha_recepcion' value='<?php print($lcFecha_recepcion);?>' id='txtfecha_recepcion' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo de Tramite:</td>
<td colspan="3">Certificacion <input type='radio' checked="checked" disabled="disabled" name='txttipo_tramite' value='1'/> Renovacion <input type='radio' disabled="disabled" <?php if($lcTipo_tramite == "2"){ print "checked='checked'"; } ?> name='txttipo_tramite' value='2'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Analista:</td>
<td><input type='hidden'  name='txtid_funcionario_receptor' value='<?php print($lcId_funcionario_receptor);?>' id='txtid_funcionario_receptor'/>
<input type="text" readonly="readonly" name="funcionario" value="<?php print $_SESSION['full_name']; ?>">
</td>
<td align='right'><span class='rojo'>*</span> Cargo:</td>
<td><input type='text' readonly="readonly" value="<?php print $_SESSION['rol']; ?>" disabled='disabled'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Oficina:</td>
<td colspan="3"><input type='text' readonly="readonly" value="<?php print $_SESSION['oficina']; ?>" disabled='disabled'/></td>
</tr>
</table>
</div>
<div class="cont_frame">
<h1>Datos del Productor</h1>
<table border="1" class="datos" align="center">
<tr>
<td align='right'><span class='rojo'>*</span> Cedula o Rif del Productor:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcedula_rif_productor' value='<?php print($lcCedula_rif_productor);?>' id='txtcedula_rif_productor' class='validate[required]'/></td>
<td align='right'><span class='rojo'>*</span> Nombre o Razon Social:</td>
<td><input type='text' readonly="readonly" value="<?php print $nom_rif; ?>" id="nom_rso" disabled='disabled'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo de Persona:</td>
<td><input type="text" readonly="readonly" value="<?php print $tipo; ?>" id="tipo_persona"></td>
<td align='right'><span class='rojo'>*</span> Correo:</td>
<td><input type='text' readonly="readonly" value="<?php print $correo; ?>" id="correo" disabled='disabled'/></td>
</tr>
<tr>
	<td align="right"><span class='rojo'>*</span> Telefono: </td>
	<td colspan="3"><input type='text' value="<?php print $telefono; ?>" readonly="readonly" id="telefono" disabled='disabled'/></td>
</tr>
</table>
</div>
<div class="cont_frame">
<h1>Unidades de Produccion</h1>
<table border="1" class="datos" id="unidades_produccion" align="center">
	<?php if(isset($cadena) and !empty($cadena)){
			print $cadena;
		}else{ ?>
	<tr>
		<td align="center">Selecciona un productor para cargar sus unidades de produccion!!!</td>
	</tr>
	<?php } ?>
</table>
</div>
<div class="cont_frame">
<h1>Documentos Entregados</h1>
<table class="datos" align="center" border="1">
	<?php 
		$checked = "";
		for($i = 0; $i < count($documentos); $i++){

			if($lobjTsolicitud->getCheckDocumentos($lcNro_solicitud,$documentos[$i]["id"])){
				$checked = "checked='checked'";
			}else{
				$checked = "";
			}


			print "<tr>";
				print "<td><input type='checkbox' ".$checked." disabled='disabled' name='txtdocumentos[]' value='".$documentos[$i]['id']."'></td>";
				print "<td>".$documentos[$i]['nombre']."</td>";
			print "</tr>";
		}
	?>
</table>
</div>
<div class="cont_frame">
<table border="1" class="datos" align="center">
<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcNro_solicitud); ?>'>
</table>
<?php $objFunciones->botonera_general('Tsolicitud','total',$id); ?>
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