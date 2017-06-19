<?php
require_once("../modelos/clsTasociacion.php");
$lobjTasociacion = new clsTasociacion();

$lobjTasociacion->acId=$_REQUEST['txtid'];
$lobjTasociacion->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTasociacion->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTasociacion->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTasociacion->buscar()){
			$lcId=$lobjTasociacion->acId;
$lcNombre=$lobjTasociacion->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTasociacion->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTasociacion->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>