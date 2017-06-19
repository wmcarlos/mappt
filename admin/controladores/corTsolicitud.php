<?php
	
	//primero obtendremos los datos del productor
	require_once("../modelos/clsTsolicitud.php");
	require_once("../modelos/clsTunidad_produccion.php");
	$objFuncionescontroller =  new clsFunciones;
	$objTsolicitud  = new clsTsolicitud();
	$lobjTunidad_produccion = new clsTunidad_produccion();

	$objTsolicitud->idtsolicitud_certificacion_renovacion='';
	//$objTsolicitud->cedula_rif_productor=$_POST['txtced_rif'];
	$objTsolicitud->fecha_recepcion = $_POST['fecha_recepcion'];
	$objTsolicitud->cedula_rif_productor = $_POST['txtced_rif'];
	$objTsolicitud->id_unidad_produccion = $_POST['txtid_unidad'];
	$objTsolicitud->documentos = $objFuncionescontroller->transform_detail_checkbox($_POST['documentos']);
	$objTsolicitud->funcionario_receptor = $_POST['funcionario_receptor'];
	$objTsolicitud->oficina_area = $_POST['oficina_area'];
	$objTsolicitud->num_registro_productor = $_POST['num_registro_productor'];
	$objTsolicitud->num_certificado_runnopa = $_POST['num_certificado_runnopa'];
	$objTsolicitud->tipo_tramite = '1';
	$objTsolicitud->estatus_solicitud = '1';

	/*GUARDAREMOS LOS DATOS DE LA UNIDAD DE PRODUCCION*/
	$lobjTunidad_produccion->acId=$_POST['txtid_unidad'];
	$lobjTunidad_produccion->acCed_rif_productor=$_POST['txtced_rif'];
	$lobjTunidad_produccion->acNombre=$_POST['txtnombre'];
	$lobjTunidad_produccion->acId_sector=$_POST['txtid_sector'];
	$lobjTunidad_produccion->acDireccion=$_POST['txtdireccion_unidad'];
	$lobjTunidad_produccion->acSuperficie_total=$_POST['txtsuperficie_total'];
	$lobjTunidad_produccion->acSuperficie_aprovechable=$_POST['txtsuperficie_aprovechable'];
	$lobjTunidad_produccion->acSuperficie_aprovechada=$_POST['txtsuperficie_aprovechada'];



	if(isset($_POST['btnguardar']))
	{
		$lcOperacion = "incluir";
		//guardamos la unidad de produccion primeramente
		$lobjTunidad_produccion->incluir();
		$objTsolicitud->incluir();
		$lcListo = 1;
	}



?>