<?php
require_once("../modelos/clsTvisita.php");
$lobjTvisita = new clsTvisita();

$lobjTvisita->acId=$_REQUEST['txtid'];
$lobjTvisita->acId_solicitud=$_POST['txtid_solicitud'];
$lobjTvisita->acId_tecnico=$_POST['txtid_tecnico'];
$lobjTvisita->acFecha=$_POST['txtfecha'];
$lobjTvisita->acComentario=$_POST['txtcomentario'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTvisita->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTvisita->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTvisita->buscar()){
			$lcId=$lobjTvisita->acId;
$lcId_solicitud=$lobjTvisita->acId_solicitud;
$lcId_tecnico=$lobjTvisita->acId_tecnico;
$lcFecha=$lobjTvisita->acFecha;
$lcComentario=$lobjTvisita->acComentario; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTvisita->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTvisita->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>