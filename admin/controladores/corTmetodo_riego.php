<?php
require_once("../modelos/clsTmetodo_riego.php");
$lobjTmetodo_riego = new clsTmetodo_riego();

$lobjTmetodo_riego->acId=$_REQUEST['txtid'];
$lobjTmetodo_riego->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTmetodo_riego->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTmetodo_riego->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTmetodo_riego->buscar()){
			$lcId=$lobjTmetodo_riego->acId;
$lcNombre=$lobjTmetodo_riego->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTmetodo_riego->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTmetodo_riego->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>