<?php 
	require_once("../modelos/clsTsolicitud.php");
	$objSolicitud = new clsTsolicitud();

	$estatus = $_POST['estatus'];

	$cad = $objSolicitud->getReportEstatus($estatus);

	require_once("../reportes/dompdf/autoload.inc.php");
	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	$dompdf = new Dompdf();

	$html = '<!DOCTYPE html>
	<html>
	<head>
		<title>Reporte de Solicitudes por Estatus</title>
		<style type="text/css">
			table#customers{
				width: 100%;
			}

			table#customers tr td{
				border: 1px solid #ccc;
				text-align: center;
				padding:2px;
				font-size:12px;
			}
		</style>
	</head>
	<body>
	<div id="content" style="height:980px;">
	   <img src="img/banner.png" width="723"/>
	   <center><h3>Reporte de Solicitudes por Estatus</h3></center>
	   <table width="100%"><tr><td align="right"><b>Fecha Hora: </b>'.date("d/m/Y H:m:s").'</td></tr></table>
		<table id="customers">
		<tr>
			<td>Nro Solicitud</td>
			<td>Cedula</td>
			<td>Productor</td>
			<td>Unidad de Prouccion</td>
			<td>Estado</td>
			<td>Municipio</td>
			<td>Parroquia</td>
			<td>Sector</td>
			<td>Estatus</td>
			<td>Tecnico</td>
		</tr>
		'.$cad.'
	</table> 
	</div>
	<table width="100%"><tr><td align="center"><b>Pagina</b> 1 / 1</td></tr></table>
	</body>
	</html>';

	$dompdf->loadHtml($html);
	// (Optional) Setup the paper size and orientation
	//$dompdf->setPaper('A', 'landscape');
	$dompdf->setPaper('A4');
	// Render the HTML as PDF
	$dompdf->render();
	// Output the generated PDF to Browser
	$dompdf->stream("reporte_historico_solicitudes.pdf", array("Attachment" => false));

	exit(0);
?>