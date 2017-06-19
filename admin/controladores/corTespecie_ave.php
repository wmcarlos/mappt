<?php
require_once("../modelos/clsTespecie_ave.php");
$lobjTespecie_ave = new clsTespecie_ave();

$lobjTespecie_ave->acId=$_REQUEST['txtid'];
$lobjTespecie_ave->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTespecie_ave->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTespecie_ave->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTespecie_ave->buscar()){
			$lcId=$lobjTespecie_ave->acId;
$lcNombre=$lobjTespecie_ave->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTespecie_ave->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTespecie_ave->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>