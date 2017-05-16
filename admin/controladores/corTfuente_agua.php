<?php
require_once("../modelos/clsTfuente_agua.php");
$lobjTfuente_agua = new clsTfuente_agua();

$lobjTfuente_agua->acId=$_REQUEST['txtid'];
$lobjTfuente_agua->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTfuente_agua->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTfuente_agua->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTfuente_agua->buscar()){
			$lcId=$lobjTfuente_agua->acId;
$lcNombre=$lobjTfuente_agua->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTfuente_agua->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTfuente_agua->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>