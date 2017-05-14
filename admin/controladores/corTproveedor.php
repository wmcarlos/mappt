<?php
require_once("../modelos/clsTproveedor.php");
$lobjTproveedor = new clsTproveedor();

$lobjTproveedor->acRif=$_REQUEST['txtrif'];
$lobjTproveedor->acLetra=$_POST['txtletra'];
$lobjTproveedor->acNombre=$_POST['txtnombre'];
$lobjTproveedor->acDireccion=$_POST['txtdireccion'];
$lobjTproveedor->acTelefono=$_POST['txttelefono'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTproveedor->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTproveedor->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTproveedor->buscar()){
			$lcRif=$lobjTproveedor->acRif;
$lcLetra=$lobjTproveedor->acLetra;
$lcNombre=$lobjTproveedor->acNombre;
$lcDireccion=$lobjTproveedor->acDireccion;
$lcTelefono=$lobjTproveedor->acTelefono; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTproveedor->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTproveedor->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>