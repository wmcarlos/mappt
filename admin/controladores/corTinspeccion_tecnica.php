<?php
	require_once("../modelos/clsTunidad_produccion.php");
	require_once("../modelos/clsTinspeccion_tecnica.php");
	$objFuncionescontroller =  new clsFunciones;
	//aqui llamaremos multiples detalles
	$lobjTunidad_produccion = new clsTunidad_produccion();
	$lobjTunidad_produccion->acId=$_POST['idunidad_produccion'];
	$lobjTunidad_produccion->acUtm_norte=$_POST['txtutm_norte'];
	$lobjTunidad_produccion->acUtm_este=$_POST['txtutm_este'];
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
	$lobjTunidad_produccion->acMaquinariajs=$objFuncionescontroller->transform_detail_checkbox($_POST['details_maquinarias']);
	$lobjTunidad_produccion->acImplementojs=$objFuncionescontroller->transform_detail_checkbox($_POST['details_implementos']);




	function insertproduccion(){
		$objInspecciontecnica_vegetal = new clsTinspeccion_tecnica(); 
		$objInspecciontecnica_apicola= new clsTinspeccion_tecnica(); 
		$objInspecciontecnica_cunicula= new clsTinspeccion_tecnica(); 


		//insertamos todos los datos de la produccion vegetal
		for($i=0; $i<count($_POST['ciclo_vegetal']); $i++){

			if($i>0){
				//obtener los datos de inspeccion tecnica  en este caso vegetal
				$objInspecciontecnica_vegetal->id_unidad_produccion = $_POST['idunidad_produccion'];
				$objInspecciontecnica_vegetal->id_ciclo = $_POST['ciclo_vegetal'][$i];
				$objInspecciontecnica_vegetal->ano = $_POST['anio_vegetal'][$i];
				$objInspecciontecnica_vegetal->id_rubro = $_POST['rubros_vegetal'][$i];
				$objInspecciontecnica_vegetal->superficie= $_POST['superficie_vegetal'][$i];
				$objInspecciontecnica_vegetal->superficie_de_cosecha = $_POST['superficie_vegetal_cosecha'][$i];
				$objInspecciontecnica_vegetal->rendimiento = $_POST['rendimiento_vegetal'][$i];
				$objInspecciontecnica_vegetal->produccion = $_POST['produccion_vegetal'][$i];
				$objInspecciontecnica_vegetal->riego = $_POST['riego_vegetal'][$i];
				$objInspecciontecnica_vegetal->superficiebajoriego= $_POST['superficie_bajoriego_vegetal'][$i];
				$objInspecciontecnica_vegetal->superficieregada = $_POST['superficie_regada_vegetal'][$i];
				$objInspecciontecnica_vegetal->tipoambiente= $_POST['tipo_ambiente_vegetal'][$i];
				$objInspecciontecnica_vegetal->fecha=  @date('Y-m-d');
				$objInspecciontecnica_vegetal->fuente_agua_vegetal= $_POST['fuente_agua_vegetal'][$i];
				$objInspecciontecnica_vegetal->metodo_riego_js = $_POST['metodo_riego_vegetal'][$i];
				//comenzamos a registrar
				$objInspecciontecnica_vegetal->insertar_produccion_vegetal();
			}
		}//cierre del registro de produccion vegetal



		//insertamos todos los datos de la produccion apicola
		for($i=0; $i<count($_POST['cantidad_apicola']); $i++){
			if($i>0){
				$objInspecciontecnica_apicola->id_unidad_produccion = $_POST['idunidad_produccion'];
				$objInspecciontecnica_apicola->id_rubro = $_POST['rubros_apicola'][$i];
				$objInspecciontecnica_apicola->cantidad_apicola = $_POST['cantidad_apicola'][$i];
				$objInspecciontecnica_apicola->produccion_mensual_apicola = $_POST['produccion_mensual_apicola'][$i];
				$objInspecciontecnica_apicola->unidad_medida_apicola = $_POST['unidad_medida_apicola'][$i];
				/*insertamos los datos*/
				$objInspecciontecnica_apicola->insertar_produccion_apicola();
			}
		}

		//insertamos todos los datos de la produccion cunicula
		for($i=0; $i<count($_POST['cantidad_cunicula']); $i++){
			if($i>0){
				$objInspecciontecnica_cunicula->id_unidad_produccion = $_POST['idunidad_produccion'];
				$objInspecciontecnica_cunicula->id_rubro = $_POST['rubros_cunicula'][$i];
				$objInspecciontecnica_cunicula->cantidad_cunicula = $_POST['cantidad_cunicula'][$i];
				$objInspecciontecnica_cunicula->produccion_mensual_cunicula = $_POST['produccion_mensual_apicola'][$i];
				$objInspecciontecnica_cunicula->unidad_medida_apicola = $_POST['unidad_medida_apicola'][$i];
				/*insertamos los datos*/
				$objInspecciontecnica_cunicula->insertar_produccion_cunicula();
			}
		}

	}	


	/*una ves enviado los datos procederemos a actualizar la unidad de produccion*/
	if($_POST['btnguardar2']){
			
		//primero modificalos la unidad de produccion
		if($lobjTunidad_produccion->actualizar_unidad()>-1){
			//insertar las producciones
			insertproduccion();
			echo '<script> alert("Inspeccion de la unidad enviada a analisis"); </script>';
		}else{
			echo '<script> alert("Ocurrio un error al enviar la inspeccion"); </script>';
		}


	}

?>