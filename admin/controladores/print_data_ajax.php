<?php 

$operacion = $_GET["operacion"];

switch ($operacion) {
		case 'get_full_producto_data':

			require_once("../modelos/clsTsolicitud.php");

			$solicitud = new clsTsolicitud();

			$solicitud ->acCedula_rif_productor = $_GET["cedula"];

			$data = $solicitud->getFullDataProductor();

			print json_encode($data);

	     break;
	     case 'get_all_unidades_produccion':
	     	
	     	require_once("../modelos/clsTsolicitud.php");

	     	$solicitud = new clsTsolicitud();

			$solicitud ->acCedula_rif_productor = $_GET["cedula"];

			$cadena = $solicitud->getAllUnidadesProduccion();

			print $cadena;
	     break;
	}	

?>