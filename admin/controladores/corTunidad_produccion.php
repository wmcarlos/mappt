<?php
require_once("../modelos/clsTunidad_produccion.php");

$lobjTunidad_produccion = new clsTunidad_produccion();

$lobjTunidad_produccion->acId=$_REQUEST['txtid'];

$lobjTunidad_produccion->acCed_rif_productor=$_POST['txtced_rif_productor'];
$lobjTunidad_produccion->acNombre=$_POST['txtnombre'];
$lobjTunidad_produccion->acId_sector=$_POST['txtid_sector'];
$lobjTunidad_produccion->acDireccion=$_POST['txtdireccion'];
$lobjTunidad_produccion->acUtm_norte=$_POST['txtutm_norte'];
$lobjTunidad_produccion->acUtm_este=$_POST['txtutm_este'];
$lobjTunidad_produccion->acSuperficie_total=$_POST['txtsuperficie_total'];
$lobjTunidad_produccion->acSuperficie_aprovechable=$_POST['txtsuperficie_aprovechable'];
$lobjTunidad_produccion->acSuperficie_aprovechada=$_POST['txtsuperficie_aprovechada'];
$lcVarTem = $_POST["txtvar_tem"];


$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTunidad_produccion->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTunidad_produccion->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTunidad_produccion->buscar()){

			$lcId=$lobjTunidad_produccion->acId;
			$lcCed_rif_productor=$lobjTunidad_produccion->acCed_rif_productor;
			$lcNombre=$lobjTunidad_produccion->acNombre;
			$lcId_sector=$lobjTunidad_produccion->acId_sector;
			$lcDireccion=$lobjTunidad_produccion->acDireccion;
			$lcUtm_norte=$lobjTunidad_produccion->acUtm_norte;
			$lcUtm_este=$lobjTunidad_produccion->acUtm_este;
			$lcSuperficie_total=$lobjTunidad_produccion->acSuperficie_total;
			$lcSuperficie_aprovechable=$lobjTunidad_produccion->acSuperficie_aprovechable;
			$lcSuperficie_aprovechada=$lobjTunidad_produccion->acSuperficie_aprovechada;

			$estado = $lobjTunidad_produccion->estado;
			$municipio = $lobjTunidad_produccion->municipio;
			$parroquia = $lobjTunidad_produccion->parroquia;



			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTunidad_produccion->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTunidad_produccion->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>