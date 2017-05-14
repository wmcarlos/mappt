<?php
require_once("../modelos/clsTpredio.php");
$lobjTpredio = new clsTpredio();

$lobjTpredio->acId=$_REQUEST['txtid'];
$lobjTpredio->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTpredio->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTpredio->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTpredio->buscar()){
			$lcId=$lobjTpredio->acId;
$lcNombre=$lobjTpredio->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTpredio->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTpredio->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>