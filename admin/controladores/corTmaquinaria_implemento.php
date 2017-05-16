<?php
require_once("../modelos/clsTmaquinaria_implemento.php");
$lobjTmaquinaria_implemento = new clsTmaquinaria_implemento();

$lobjTmaquinaria_implemento->acId=$_REQUEST['txtid'];
$lobjTmaquinaria_implemento->acNombre=$_POST['txtnombre'];
$lobjTmaquinaria_implemento->acTipo=$_POST['txttipo'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTmaquinaria_implemento->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTmaquinaria_implemento->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTmaquinaria_implemento->buscar()){
			$lcId=$lobjTmaquinaria_implemento->acId;
$lcNombre=$lobjTmaquinaria_implemento->acNombre;
$lcTipo=$lobjTmaquinaria_implemento->acTipo; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTmaquinaria_implemento->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTmaquinaria_implemento->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>