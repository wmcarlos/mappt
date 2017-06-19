<?php
require_once("../modelos/clsTtipo_superficie.php");
$lobjTtipo_superficie = new clsTtipo_superficie();

$lobjTtipo_superficie->acId=$_REQUEST['txtid'];
$lobjTtipo_superficie->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTtipo_superficie->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTtipo_superficie->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTtipo_superficie->buscar()){
			$lcId=$lobjTtipo_superficie->acId;
$lcNombre=$lobjTtipo_superficie->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTtipo_superficie->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTtipo_superficie->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>