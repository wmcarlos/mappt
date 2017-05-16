<?php
require_once("../modelos/clsTproductor.php");
$lobjTproductor = new clsTproductor();

$lobjTproductor->acId=$_REQUEST['txtid'];
$lobjTproductor->acTipo=$_POST['txttipo'];
$lobjTproductor->acCed_rif=$_POST['txtced_rif'];
$lobjTproductor->acNom_rso=$_POST['txtnom_rso'];
$lobjTproductor->acId_sector=$_POST['txtid_sector'];
$lobjTproductor->acDireccion=$_POST['txtdireccion'];
$lobjTproductor->acTelefono=$_POST['txttelefono'];
$lobjTproductor->acCorreo=$_POST['txtcorreo'];
$lobjTproductor->acAsociacionesjs=$_POST['txtasociacionesjs'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTproductor->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTproductor->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTproductor->buscar()){
			$lcId=$lobjTproductor->acId;
$lcTipo=$lobjTproductor->acTipo;
$lcCed_rif=$lobjTproductor->acCed_rif;
$lcNom_rso=$lobjTproductor->acNom_rso;
$lcId_sector=$lobjTproductor->acId_sector;
$lcDireccion=$lobjTproductor->acDireccion;
$lcTelefono=$lobjTproductor->acTelefono;
$lcCorreo=$lobjTproductor->acCorreo;
$lcAsociacionesjs=$lobjTproductor->acAsociacionesjs; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTproductor->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
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