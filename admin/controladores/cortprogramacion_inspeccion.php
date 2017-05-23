<?php 
		
	include_once("../modelos/clstprogramacion_inspeccion.php");
	$objp_inspeccion = new clstprogramacion_inspeccion();
	$objp_inspeccion->idtsolicitud_certificacion_renovacion = $_POST['idsolicitud'];	
	$objp_inspeccion->fecha_asignacion = $_POST['fecha_asignacion'];
	$objp_inspeccion->nombre_usu = $_POST['inspector_tecnico'];
	$objp_inspeccion->observacion = $_POST['observacion'];
	$objp_inspeccion->estatus = $_POST['estatus_programacion'];

	if($_POST['btnguardar2']){
		if($objp_inspeccion->incluir()>(-1)){
			$objp_inspeccion->cambiarEstatusSolicitud();
			echo '<script> alert("Pedido enviado exitosamenter"); </script>';
		}else{
			echo '<script> alert("No se pudo enviar el pedido"); </script>';

		}
	}

?>