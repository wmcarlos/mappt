<?php
require_once("../modelos/clsTunidad_produccion.php");
$lobjTunidad_produccion = new clsTunidad_produccion();

$lobjTunidad_produccion->acId=$_REQUEST['txtid'];
$lobjTunidad_produccion->acCed_rif_productor=$_POST['txtced_rif_productor'];
$lobjTunidad_produccion->acNombre=$_POST['txtnombre'];
$lobjTunidad_produccion->acId_sector=$_POST['txtid_sector'];
$lobjTunidad_produccion->acDireccion=$_POST['txtdireccion'];
$lobjTunidad_produccion->acUtm_norte=$_POST['txtutm_norte'];
$lobjTunidad_produccion->acUtm_este=$_POST['txtutm_este'];
$lobjTunidad_produccion->acSuperficie_total=$_POST['txtsuperficie_total'];
$lobjTunidad_produccion->acSuperficie_aprovechable=$_POST['txtsuperficie_aprovechable'];
$lobjTunidad_produccion->acSuperficie_aprovechada=$_POST['txtsuperficie_aprovechada'];
$lobjTunidad_produccion->acCroquisimg=$_POST['txtcroquisimg'];
$lobjTunidad_produccion->acTap=$_POST['txttap'];
$lobjTunidad_produccion->acTap_potreros=$_POST['txttap_potreros'];
$lobjTunidad_produccion->acTap_cant_potreros=$_POST['txttap_cant_potreros'];
$lobjTunidad_produccion->acTap_tipo_cerca=$_POST['txttap_tipo_cerca'];
$lobjTunidad_produccion->acTap_carga_animal_an_ha=$_POST['txttap_carga_animal_an_ha'];
$lobjTunidad_produccion->acTap_tipo_pasto=$_POST['txttap_tipo_pasto'];
$lobjTunidad_produccion->acTap_especie_pasto=$_POST['txttap_especie_pasto'];
$lobjTunidad_produccion->acTap_superficie=$_POST['txttap_superficie'];
$lobjTunidad_produccion->acTap_ultimo_mantenimiento=$_POST['txttap_ultimo_mantenimiento'];
$lobjTunidad_produccion->acTap_fertilizacion=$_POST['txttap_fertilizacion'];
$lobjTunidad_produccion->acMaquinariajs=$_POST['txtmaquinariajs'];
$lobjTunidad_produccion->acImplementojs=$_POST['txtimplementojs'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTunidad_produccion->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTunidad_produccion->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTunidad_produccion->buscar()){
			$lcId=$lobjTunidad_produccion->acId;
$lcCed_rif_productor=$lobjTunidad_produccion->acCed_rif_productor;
$lcNombre=$lobjTunidad_produccion->acNombre;
$lcId_sector=$lobjTunidad_produccion->acId_sector;
$lcDireccion=$lobjTunidad_produccion->acDireccion;
$lcUtm_norte=$lobjTunidad_produccion->acUtm_norte;
$lcUtm_este=$lobjTunidad_produccion->acUtm_este;
$lcSuperficie_total=$lobjTunidad_produccion->acSuperficie_total;
$lcSuperficie_aprovechable=$lobjTunidad_produccion->acSuperficie_aprovechable;
$lcSuperficie_aprovechada=$lobjTunidad_produccion->acSuperficie_aprovechada;
$lcCroquisimg=$lobjTunidad_produccion->acCroquisimg;
$lcTap=$lobjTunidad_produccion->acTap;
$lcTap_potreros=$lobjTunidad_produccion->acTap_potreros;
$lcTap_cant_potreros=$lobjTunidad_produccion->acTap_cant_potreros;
$lcTap_tipo_cerca=$lobjTunidad_produccion->acTap_tipo_cerca;
$lcTap_carga_animal_an_ha=$lobjTunidad_produccion->acTap_carga_animal_an_ha;
$lcTap_tipo_pasto=$lobjTunidad_produccion->acTap_tipo_pasto;
$lcTap_especie_pasto=$lobjTunidad_produccion->acTap_especie_pasto;
$lcTap_superficie=$lobjTunidad_produccion->acTap_superficie;
$lcTap_ultimo_mantenimiento=$lobjTunidad_produccion->acTap_ultimo_mantenimiento;
$lcTap_fertilizacion=$lobjTunidad_produccion->acTap_fertilizacion;
$lcMaquinariajs=$lobjTunidad_produccion->acMaquinariajs;
$lcImplementojs=$lobjTunidad_produccion->acImplementojs; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTunidad_produccion->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTunidad_produccion->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>