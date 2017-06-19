<?php
require_once("../modelos/clsTestado.php");
$lobjTestado = new clsTestado();

$lobjTestado->acId=$_REQUEST['txtid'];
$lobjTestado->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTestado->buscarbyname()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTestado->incluir();
		}
	
	break;
	
	case "buscar":
	
		if($lobjTestado->buscar()){
			$lcId=$lobjTestado->acId;
			$lcNombre=$lobjTestado->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTestado->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTestado->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>