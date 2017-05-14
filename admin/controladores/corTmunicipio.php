<?php
require_once("../modelos/clsTmunicipio.php");
$lobjTmunicipio = new clsTmunicipio();

$lobjTmunicipio->acId=$_REQUEST['txtid'];
$lobjTmunicipio->acNombre=$_POST['txtnombre'];
$lobjTmunicipio->acId_estado=$_POST['txtid_estado'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTmunicipio->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTmunicipio->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTmunicipio->buscar()){
			$lcId=$lobjTmunicipio->acId;
$lcNombre=$lobjTmunicipio->acNombre;
$lcId_estado=$lobjTmunicipio->acId_estado; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTmunicipio->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTmunicipio->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>