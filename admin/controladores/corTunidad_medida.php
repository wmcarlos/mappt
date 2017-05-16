<?php
require_once("../modelos/clsTunidad_medida.php");
$lobjTunidad_medida = new clsTunidad_medida();

$lobjTunidad_medida->acId=$_REQUEST['txtid'];
$lobjTunidad_medida->acNombre=$_POST['txtnombre'];
$lobjTunidad_medida->acSiglas=$_POST['txtsiglas'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTunidad_medida->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTunidad_medida->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTunidad_medida->buscar()){
			$lcId=$lobjTunidad_medida->acId;
$lcNombre=$lobjTunidad_medida->acNombre;
$lcSiglas=$lobjTunidad_medida->acSiglas; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTunidad_medida->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTunidad_medida->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>