<?php
require_once("../modelos/clsTparroquia.php");
$lobjTparroquia = new clsTparroquia();

$lobjTparroquia->acId=$_REQUEST['txtid'];
$lobjTparroquia->acNombre=$_POST['txtnombre'];
$lobjTparroquia->acId_municipio=$_POST['txtid_municipio'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTparroquia->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTparroquia->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTparroquia->buscar()){
			$lcId=$lobjTparroquia->acId;
$lcNombre=$lobjTparroquia->acNombre;
$lcId_municipio=$lobjTparroquia->acId_municipio; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTparroquia->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTparroquia->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>