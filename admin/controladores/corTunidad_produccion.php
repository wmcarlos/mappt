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
$lcVarTem = $_POST["txtvar_tem"];


$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTunidad_produccion->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTunidad_produccion->incluir(); 

			$data = $lobjTunidad_produccion->getUPforName();

			$id_unidad_produccion = $data[0]['id_unidad_produccion'];

			//Datos Vegetales
			$anos = $_POST['anos'];
  			$ciclos = $_POST['ciclos'];
  			$rubros = $_POST['rubros'];
  			$superficies = $_POST['superficies'];
  			$superficie_cosechas = $_POST['superficie_cosechas'];
  			$rendimientos = $_POST['rendimientos'];
  			$producciones = $_POST['producciones'];
  			$fuente_aguas = $_POST['fuente_aguas'];
  			$metodo_riegos = $_POST['metodo_riegos'];
  			$sbajoriegos = $_POST['sbajoriegos'];
  			$sregadas = $_POST['sregadas'];
  			$tipo_ambientes = $_POST['tipo_ambientes'];

  			for($i = 0; $i < count($anos); $i++){
  				$lobjTunidad_produccion->insertar_vegetal($id_unidad_produccion,$ciclos[$i],$anos[$i],$rubros[$i],$superficies[$i],$superficie_cosechas[$i],$rendimientos[$i],$producciones[$i],$fuente_aguas[$i],$metodo_riegos[$i],$sbajoriegos[$i],$sregadas[$i],$tipo_ambientes[$i]);
  			}

  			//Datos Pecuaria
			$sistema_producciones = $_POST['sistema_producciones'];
			$rubro_pecuarias = $_POST['rubro_pecuarias'];
			$nrocabmachos = $_POST['nrocabmachos'];
			$nrocabhembras = $_POST['nrocabhembras'];
			$tipo_ordeneos = $_POST['tipo_ordeneos'];
			$modo_ordeneos = $_POST['modo_ordeneos'];
			$cant_anim_ordeneos = $_POST['cant_anim_ordeneos'];
			$cant_leches = $_POST['cant_leches'];
			$cant_beneficios = $_POST['cant_beneficios'];

  			for($x = 0; $x < count($sistema_producciones); $x++){
  				$lobjTunidad_produccion->insertar_pecuaria($id_unidad_produccion,$sistema_producciones[$x],$rubro_pecuarias[$x],$nrocabmachos[$x],$nrocabhembras[$x],$tipo_ordeneos[$x],$modo_ordeneos[$x],$cant_anim_ordeneos[$x],$cant_leches[$x],$cant_beneficios[$x]);
  			}

  			//Datos Porcino Cunicula
  			$rubro_porcino_cuniculas = $_POST['rubro_porcino_cuniculas'];
  			$cantidad_porcino_cuniculas = $_POST['cantidad_porcino_cuniculas'];

  			for($z = 0; $z < count($rubro_porcino_cuniculas); $z++){
  				$lobjTunidad_produccion->insertar_porcino_cunicula($id_unidad_produccion,$rubro_porcino_cuniculas[$z],$cantidad_porcino_cuniculas[$z]);
  			}

  			//Datos Avicolas
  			$especies = $_POST['especies'];
  			$rubros_avicolas = $_POST['rubros_avicolas'];
  			$produccion_mensuales = $_POST['produccion_mensuales'];
  			$cant_aves_producciones = $_POST['cant_aves_producciones'];
  			$unidad_medidas = $_POST['unidad_medidas'];

  			for($o = 0; $o < count($especies); $o++){
  				$lobjTunidad_produccion->insertar_avicola($id_unidad_produccion,$rubros_avicolas[$o],$especies[$o],$cant_aves_producciones[$o],$produccion_mensuales[$o],$unidad_medidas[$o]);
  			}
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

			$estado = $lobjTunidad_produccion->estado;
			$municipio = $lobjTunidad_produccion->municipio;
			$parroquia = $lobjTunidad_produccion->parroquia;

			$cad_vegetal = $lobjTunidad_produccion->getDataVegetal();

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