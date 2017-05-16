<?php
require_once("../modelos/clsTsistema_produccion.php");
$lobjTsistema_produccion = new clsTsistema_produccion();

$lobjTsistema_produccion->acId=$_REQUEST['txtid'];
$lobjTsistema_produccion->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTsistema_produccion->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTsistema_produccion->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTsistema_produccion->buscar()){
			$lcId=$lobjTsistema_produccion->acId;
$lcNombre=$lobjTsistema_produccion->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTsistema_produccion->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTsistema_produccion->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>