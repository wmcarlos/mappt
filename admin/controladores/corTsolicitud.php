<?php
	
	//primero obtendremos los datos del productor
	require_once("../modelos/clsTsolicitud.php");
	$objFuncionescontroller =  new clsFunciones;
	$objTsolicitud  = new clsTsolicitud();

	$objTsolicitud->idtsolicitud_certificacion_renovacion='';
	//$objTsolicitud->cedula_rif_productor=$_POST['txtced_rif'];
	$objTsolicitud->cedula_rif_productor = '20467294';
	$objTsolicitud->id_unidad_produccion = $_POST['txtid_unidad'];
	$objTsolicitud->documentos = $objFuncionescontroller->transform_detail_checkbox($_POST['documentos']);
	$objTsolicitud->funcionario_receptor = $_POST['funcionario_receptor'];
	$objTsolicitud->oficina_area = $_POST['oficina_area'];
	$objTsolicitud->num_registro_productor = $_POST['num_registro_productor'];
	$objTsolicitud->$num_certificado_runnopa; = $_POST['num_certificado_runnopa'];
	$objTsolicitud->tipo_tramite = '1';
	$objTsolicitud->estatus_solicitud = '1';



	if(isset($_POST['btnguardar']))
	{
		$objTsolicitud->incluir();
	}



?>