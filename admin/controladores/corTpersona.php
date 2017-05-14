<?php
require_once("../modelos/clsTpersona.php");
$lobjTpersona = new clsTpersona();

$lobjTpersona->acCedula=$_REQUEST['txtcedula'];
$lobjTpersona->acNacionalidad=$_POST['txtnacionalidad'];
$lobjTpersona->acNombres=$_POST['txtnombres'];
$lobjTpersona->acApellidos=$_POST['txtapellidos'];
$lobjTpersona->acFechanacimiento=$_POST['txtfechanacimiento'];
$lobjTpersona->acSexo=$_POST['txtsexo'];
$lobjTpersona->acTelefono=$_POST['txttelefono'];
$lobjTpersona->acCorreo=$_POST['txtcorreo'];
$lobjTpersona->acDireccion=$_POST['txtdireccion'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTpersona->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTpersona->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTpersona->buscar()){
			$lcCedula=$lobjTpersona->acCedula;
$lcNacionalidad=$lobjTpersona->acNacionalidad;
$lcNombres=$lobjTpersona->acNombres;
$lcApellidos=$lobjTpersona->acApellidos;
$lcFechanacimiento=$lobjTpersona->acFechanacimiento;
$lcSexo=$lobjTpersona->acSexo;
$lcTelefono=$lobjTpersona->acTelefono;
$lcCorreo=$lobjTpersona->acCorreo;
$lcDireccion=$lobjTpersona->acDireccion; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTpersona->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTpersona->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>