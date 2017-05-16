<?php
require_once("../modelos/clsTtipo_pesca.php");
$lobjTtipo_pesca = new clsTtipo_pesca();

$lobjTtipo_pesca->acId=$_REQUEST['txtid'];
$lobjTtipo_pesca->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTtipo_pesca->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTtipo_pesca->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTtipo_pesca->buscar()){
			$lcId=$lobjTtipo_pesca->acId;
$lcNombre=$lobjTtipo_pesca->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTtipo_pesca->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTtipo_pesca->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>