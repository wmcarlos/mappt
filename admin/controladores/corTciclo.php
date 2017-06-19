<?php
require_once("../modelos/clsTciclo.php");
$lobjTciclo = new clsTciclo();

$lobjTciclo->acId=$_REQUEST['txtid'];
$lobjTciclo->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTciclo->buscarbyname()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTciclo->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTciclo->buscar()){
			$lcId=$lobjTciclo->acId;
			$lcNombre=$lobjTciclo->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTciclo->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTciclo->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>