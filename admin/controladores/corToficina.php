<?php
require_once("../modelos/clsToficina.php");
$lobjToficina = new clsToficina();

$lobjToficina->acId=$_REQUEST['txtid'];
$lobjToficina->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjToficina->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjToficina->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjToficina->buscar()){
			$lcId=$lobjToficina->acId;
$lcNombre=$lobjToficina->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjToficina->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjToficina->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>