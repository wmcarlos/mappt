<?php
require_once("../modelos/clsTproductor.php");

$objFuncionescontroller =  new clsFunciones;
$lobjTproductor = new clsTproductor();
$lobjTproductor->acTipo=$_POST['txttipo'];
$lobjTproductor->acCed_rif=$_REQUEST['txtced_rif'];
$lobjTproductor->acNom_rso=$_POST['txtnom_rso'];
$lobjTproductor->acId_sector=$_POST['txtid_sector'];
$lobjTproductor->acDireccion=$_POST['txtdireccion'];
$lobjTproductor->acTelefono=$_POST['txttelefono'];
$lobjTproductor->acCorreo=$_POST['txtcorreo'];
$lobjTproductor->fincas = $_POST["txtfincas"];
$lobjTproductor->acId_asociacion = $_POST['txtid_asociacion'];

$lcOperacion = $_REQUEST["txtoperacion"];

switch($lcOperacion){

	case "incluir":
		if($lobjTproductor->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTproductor->incluir();
			$lobjTproductor->incluir_fincas();
		}
	
	break;
	
	case "buscar":
	
		if($lobjTproductor->buscar()){
			$lcTipo=$lobjTproductor->acTipo;
			$lcCed_rif=$lobjTproductor->acCed_rif;
			$lcNom_rso=$lobjTproductor->acNom_rso;
			$lcId_sector=$lobjTproductor->acId_sector;
			$lcDireccion=$lobjTproductor->acDireccion;
			$lcTelefono=$lobjTproductor->acTelefono;
			$lcCorreo=$lobjTproductor->acCorreo;
			$lcId_asociacion=$lobjTproductor->acId_asociacion;
			$estado = $lobjTproductor->estado;
			$municipio = $lobjTproductor->municipio;
			$parroquia = $lobjTproductor->parroquia;
			$fincas = $lobjTproductor->getFincas();
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
		$lobjTproductor->modificar($lcVarTem);
		$lobjTproductor->update_fincas();
		$lobjTproductor->incluir_fincas();
		$lcListo = 1;
	break;
	
	case "eliminar":
	
		if($lobjTproductor->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>