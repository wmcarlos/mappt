<?php
require_once("../modelos/clsTgrupo_rubro.php");
$lobjTgrupo_rubro = new clsTgrupo_rubro();

$lobjTgrupo_rubro->acId=$_REQUEST['txtid'];
$lobjTgrupo_rubro->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTgrupo_rubro->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTgrupo_rubro->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTgrupo_rubro->buscar()){
			$lcId=$lobjTgrupo_rubro->acId;
$lcNombre=$lobjTgrupo_rubro->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTgrupo_rubro->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTgrupo_rubro->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>