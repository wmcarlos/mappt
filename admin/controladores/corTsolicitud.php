<?php
session_start();
require_once("../modelos/clsTsolicitud.php");
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
$lobjTsolicitud = new clsTsolicitud();
$objFunciones = new clsFunciones;

$lobjTsolicitud->acNro_solicitud=$_REQUEST['txtnro_solicitud'];
$lobjTsolicitud->acFecha_recepcion=$_POST['txtfecha_recepcion'];
$lobjTsolicitud->acCedula_rif_productor=$_POST['txtcedula_rif_productor'];
$lobjTsolicitud->acId_funcionario_receptor=$_POST['txtid_funcionario_receptor'];
$lobjTsolicitud->acTipo_tramite=$_POST['txttipo_tramite'];
$lobjTsolicitud->fincas = $_POST["txtfincas"];
$lobjTsolicitud->documentos = $_POST["txtdocumentos"];


$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];

$documentos = $lobjTsolicitud->getDocuments();

$lcId_funcionario_receptor = $_SESSION['codigo'];

$productores = $lobjTsolicitud->getProductores();

$lcFecha_recepcion = date("d-m-Y");

$lcNro_solicitud = $objFunciones->ultimo_id_plus1("tsolicitud","nro_solicitud");

$solicitudes = $lobjTsolicitud->getSolicitudes();

$solicitudesTecnico = $lobjTsolicitud->getSolicitudesTecnico($_SESSION['codigo']);


switch($lcOperacion){

	case "incluir":
	
		if($lobjTsolicitud->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTsolicitud->incluir();  
			$lobjTsolicitud->incluir_fincas();
			$lobjTsolicitud->incluir_documentos();
		}
	
	break;
	
	case "buscar":
	
		if($lobjTsolicitud->buscar()){
			$lcNro_solicitud=$lobjTsolicitud->acNro_solicitud;
			$lcFecha_recepcion=$lobjTsolicitud->acFecha_recepcion;
			$lcCedula_rif_productor=$lobjTsolicitud->acCedula_rif_productor;
			$lcId_funcionario_receptor=$lobjTsolicitud->acId_funcionario_receptor;
			$lcTipo_tramite=$lobjTsolicitud->acTipo_tramite;

			$lobjTsolicitud->acCedula_rif_productor = $lcCedula_rif_productor;

			$data = $lobjTsolicitud->getFullDataProductor();

			$nom_rif = $data[0]["nom_rso"];
			$tipo = $data[0]["tipo"];
			$correo = $data[0]["correo"];
			$telefono = $data[0]["telefono"];

			$lobjTsolicitud->acNro_solicitud = $lcNro_solicitud;
			$cadena = $lobjTsolicitud->getAllUnidadesProduccion();

			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":

		$lobjTsolicitud->modificar($lcVarTem);
		$lobjTsolicitud->delete_documentos();
		$lobjTsolicitud->delete_unidades_produccion();

		$lobjTsolicitud->incluir_fincas();
		$lobjTsolicitud->incluir_documentos();
		$lcListo = 1;

	
	break;
	
	case "eliminar":
	
		if($lobjTsolicitud->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>