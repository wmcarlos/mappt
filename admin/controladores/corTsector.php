<?php
require_once("../modelos/clsTsector.php");
$lobjTsector = new clsTsector();

$lobjTsector->acId=$_REQUEST['txtid'];
$lobjTsector->acNombre=$_POST['txtnombre'];
$lobjTsector->acId_parroquia=$_POST['txtid_parroquia'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTsector->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTsector->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTsector->buscar()){
			$lcId=$lobjTsector->acId;
$lcNombre=$lobjTsector->acNombre;
$lcId_parroquia=$lobjTsector->acId_parroquia; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTsector->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTsector->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>