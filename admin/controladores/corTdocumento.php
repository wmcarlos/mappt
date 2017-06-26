<?php
require_once("../modelos/clsTdocumento.php");
$lobjTdocumento = new clsTdocumento();

$lobjTdocumento->acId=$_REQUEST['txtid'];
$lobjTdocumento->acNombre=$_POST['txtnombre'];
$lobjTdocumento->acObligatorio=$_POST['txtobligatorio'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTdocumento->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTdocumento->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTdocumento->buscar()){
			$lcId=$lobjTdocumento->acId;
$lcNombre=$lobjTdocumento->acNombre;
$lcObligatorio=$lobjTdocumento->acObligatorio; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTdocumento->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTdocumento->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>