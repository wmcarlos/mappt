<?php
require_once("../modelos/clsTrubro.php");
$lobjTrubro = new clsTrubro();

$lobjTrubro->acId=$_REQUEST['txtid'];
$lobjTrubro->acNombre=$_POST['txtnombre'];
$lobjTrubro->acId_grupo_rubro=$_POST['txtid_grupo_rubro'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTrubro->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTrubro->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTrubro->buscar()){
			$lcId=$lobjTrubro->acId;
$lcNombre=$lobjTrubro->acNombre;
$lcId_grupo_rubro=$lobjTrubro->acId_grupo_rubro; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTrubro->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTrubro->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>