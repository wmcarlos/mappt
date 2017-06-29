<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTsolicitud.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = 'no';
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Solicitud</title>
<?php print($objFunciones->librerias_generales); ?>
<script>

function cargar()
{
	var operacion = '<?php print($operacion);?>';
	var listo = '<?php print($listo);?>';

	mensajes(operacion,listo);
	cargar_select(operacion,listo);

	<?php 

		if($_GET['aplicado'] == "si"){
			print "alert('Visita Aplicada con Exito!!!');";
		}

	?>

}
</script>
</head>
<body onload='cargar();'>

<?php @include('antes_form.php'); ?>

<div id='mensajes_sistema'></div><br />
<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>
</br>
<form name='form1' id='form1' autocomplete='off' method='post'/>
<div class='cont_frame' style="width: 97%;">
	<h1>Lista de Solicitudes</h1>
	<table class="datos" width="100%" align="center">
		<tr>
			<td>Nro Solicitud</td>
			<td>Cedula</td>
			<td>Nombre</td>
			<td>Unidad Produccion</td>
			<td>Sector</td>
			<td>Parroquia</td>
			<td>Municipio</td>
			<td>Estado</td>
			<td>Estatus</td>
			<td>-</td>
		</tr>
		<?php print $solicitudesTecnico; ?>
	</table>
</div>


<?php @include('despues_form.php'); ?>
</body>
</html>