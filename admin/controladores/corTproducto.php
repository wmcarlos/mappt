<?php
require_once("../modelos/clsTproducto.php");
$lobjTproducto = new clsTproducto();

$lobjTproducto->acId=$_REQUEST['txtid'];
$lobjTproducto->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTproducto->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTproducto->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTproducto->buscar()){
			$lcId=$lobjTproducto->acId;
$lcNombre=$lobjTproducto->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTproducto->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTproducto->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>