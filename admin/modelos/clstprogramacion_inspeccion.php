<?php
	require_once("clsDatos.php");
	class clstprogramacion_inspeccion extends clsDatos{
		private $nro_informe_inspeccion;	
		private $idtsolicitud_certificacion_renovacion;	
		private $fecha_asignacion;	
		private $nombre_usu;	
		private $observacion;	
		private $estatus;

		//constructor de la clase		
		public function __construct(){
			$this->nro_informe_inspeccion = "";
			$this->idtsolicitud_certificacion_renovacion = "";
			$this->fecha_asignacion = "";
			$this->nombre_usu = "";
			$this->observacion = "";
			$this->estatus = "";
		}

		//metodo magico set
		public function __set($atributo, $valor){ $this->$atributo = strtoupper($valor);}		
		//metodo get
		public function __get($atributo){ return trim($this->$atributo); }
		//destructor de la clase        
		public function __destruct() { }

		//insertar los datos
		public function incluir(){
			return $this->ejecutar("INSERT INTO tprogramacion_inspeccion VALUES('','$this->idtsolicitud_certificacion_renovacion','$this->fecha_asignacion','$this->nombre_usu','$this->observacion','$this->estatus') ");
			
		}
		/*FUNCION PARA CAMBIAR EL ESTATUS DE LA SOLICITUD A 2*/
		public function cambiarEstatusSolicitud(){
			return $this->ejecutar("UPDATE tsolicitud_certificado_renovacion SET estatus_solicitud='2' WHERE idtsolicitud_certificacion_renovacion=$this->idtsolicitud_certificacion_renovacion");
		}



		//primeramente vamos a buscar todo el listado de solicitudes de certificado sin utilizar aun
		public function listar_solicitudes(){
			$array_solicitudes = array();
			$this->ejecutar("SELECT tsolicitud_certificado_renovacion.* , tproductor.nom_rso, tunidad_produccion.nombre , tunidad_produccion.superficie_total, tunidad_produccion.superficie_aprovechable, tunidad_produccion.superficie_aprovechada, tsector.nombre AS sector FROM tsolicitud_certificado_renovacion, tproductor, tunidad_produccion, tsector WHERE tsolicitud_certificado_renovacion.estatus_solicitud = 1 AND tsolicitud_certificado_renovacion.cedula_rif_productor = tproductor.ced_rif AND tsolicitud_certificado_renovacion.id_unidad_produccion = tunidad_produccion.id AND tunidad_produccion.id_sector = tsector.id");

				while($laRow=$this->arreglo()){
					array_push($array_solicitudes, array(
						'idsolicitud'=>$laRow['idtsolicitud_certificacion_renovacion'],
						'fecha_recepcion'=>$laRow['fecha_recepcion'],
						'nombre_productor'=>$laRow['nom_rso'],
						'unidad_produccion'=>$laRow['nombre'],
						'superficie_total'=>$laRow['superficie_total'],
						'superficie_aprovechable'=>$laRow['superficie_aprovechable'],
						'superficie_aprovechada'=>$laRow['superficie_aprovechada'],
						'sector'=>$laRow['sector']
						)
					);

				}//closed while

				return $array_solicitudes;
		}//cierre de funcion listar solicitudes 

		//funcion para listar las solicitudes de inspeccion tecnica por inspector tecnico
		public function listar_solicitudes_inspector($usuario_inspector){
			$array_solicitudes = array();

			$this->ejecutar("SELECT tsolicitud_certificado_renovacion.* , tproductor.nom_rso,tproductor.ced_rif,tproductor.direccion, tproductor.telefono, tproductor.correo,tunidad_produccion.id AS idunidad_produccion ,tunidad_produccion.nombre, tunidad_produccion.superficie_total, tunidad_produccion.superficie_aprovechable, tunidad_produccion.superficie_aprovechada, tsector.nombre AS sector,tprogramacion_inspeccion.observacion, tprogramacion_inspeccion.fecha_asignacion ,tprogramacion_inspeccion.nro_informe_inspeccion FROM tsolicitud_certificado_renovacion, tproductor, tunidad_produccion, tsector, tprogramacion_inspeccion WHERE tsolicitud_certificado_renovacion.estatus_solicitud = 2 AND tsolicitud_certificado_renovacion.cedula_rif_productor = tproductor.ced_rif AND tsolicitud_certificado_renovacion.id_unidad_produccion = tunidad_produccion.id AND tunidad_produccion.id_sector = tsector.id AND tsolicitud_certificado_renovacion.idtsolicitud_certificacion_renovacion = tprogramacion_inspeccion.idtsolicitud_certificacion_renovacion 
				AND tprogramacion_inspeccion.nombre_usu = '$usuario_inspector' ");

				while($laRow=$this->arreglo()){
					array_push($array_solicitudes, array(
						'idsolicitud'=>$laRow['idtsolicitud_certificacion_renovacion'],
						'fecha_asignacion'=>$laRow['fecha_asignacion'],
						'nro_informe_inspeccion'=>$laRow['nro_informe_inspeccion'],
						'observacion'=>$laRow['observacion'],
						'tipo_tramite'=>$laRow['tipo_tramite'],
						'nombre_productor'=>$laRow['nom_rso'],
						'cedula_rif_productor'=>$laRow['ced_rif'],
						'direccion_productor'=>$laRow['direccion'],
						'correo_productor'=>$laRow['correo'],
						'telefono_productor'=>$laRow['telefono'],
						'unidad_produccion'=>$laRow['nombre'],
						'idunidad_produccion'=>$laRow['idunidad_produccion'],
						'superficie_total'=>$laRow['superficie_total'],
						'superficie_aprovechable'=>$laRow['superficie_aprovechable'],
						'superficie_aprovechada'=>$laRow['superficie_aprovechada'],
						'sector'=>$laRow['sector']
						)
					);

				}//closed while

				return $array_solicitudes;

		}//cierre de la funcion listar solicitud por inspector

		
		public function listar_solicitudes_analista($usuario_analista){
			$array_solicitudes = array();

			$this->ejecutar("SELECT tsolicitud_certificado_renovacion.* , tproductor.nom_rso,tproductor.ced_rif,tproductor.direccion, tproductor.telefono, tproductor.correo,tunidad_produccion.id AS idunidad_produccion ,tunidad_produccion.nombre, tunidad_produccion.superficie_total,tunidad_produccion.tap_tipo_pasto, tunidad_produccion.superficie_aprovechable, tunidad_produccion.superficie_aprovechada, tunidad_produccion.utm_norte, tunidad_produccion.utm_este, tunidad_produccion.tap_cant_potreros , tunidad_produccion.tap_tipo_cerca , tunidad_produccion.tap_superficie, tunidad_produccion.tap_ultimo_mantenimiento, tunidad_produccion.tap_fertilizacion , tunidad_produccion.maquinariajs, tunidad_produccion.implementojs , tunidad_produccion.tap_carga_animal_an_ha,tsector.nombre AS sector,tprogramacion_inspeccion.observacion, tprogramacion_inspeccion.fecha_asignacion ,tprogramacion_inspeccion.nro_informe_inspeccion  FROM tsolicitud_certificado_renovacion, tproductor, tunidad_produccion, tsector, tprogramacion_inspeccion, tanalisis_inspeccion WHERE tsolicitud_certificado_renovacion.estatus_solicitud = 3 AND tsolicitud_certificado_renovacion.cedula_rif_productor = tproductor.ced_rif AND tsolicitud_certificado_renovacion.id_unidad_produccion = tunidad_produccion.id AND tunidad_produccion.id_sector = tsector.id 
AND tsolicitud_certificado_renovacion.idtsolicitud_certificacion_renovacion = tprogramacion_inspeccion.idtsolicitud_certificacion_renovacion 
AND tprogramacion_inspeccion.nro_informe_inspeccion =  tanalisis_inspeccion.nro_informe_inspeccion");

				while($laRow=$this->arreglo()){
					array_push($array_solicitudes, array(
						'idsolicitud'=>$laRow['idtsolicitud_certificacion_renovacion'],
						'fecha_asignacion'=>$laRow['fecha_asignacion'],
						'nro_informe_inspeccion'=>$laRow['nro_informe_inspeccion'],
						'observacion'=>$laRow['observacion'],
						'tipo_tramite'=>$laRow['tipo_tramite'],
						'nombre_productor'=>$laRow['nom_rso'],
						'cedula_rif_productor'=>$laRow['ced_rif'],
						'direccion_productor'=>$laRow['direccion'],
						'correo_productor'=>$laRow['correo'],
						'telefono_productor'=>$laRow['telefono'],
						'unidad_produccion'=>$laRow['nombre'],
						'idunidad_produccion'=>$laRow['idunidad_produccion'],
						'utm_norte'=>$laRow['utm_norte'],
						'utm_este'=>$laRow['utm_este'],
						'tap_cant_potreros'=>$laRow['tap_cant_potreros'],
						'tap_tipo_cerca'=>$laRow['tap_tipo_cerca'],
						'tap_carga_animal_an_ha'=>$laRow['tap_carga_animal_an_ha'],
						'tap_tipo_pasto'=>$laRow['tap_tipo_pasto'],
						'tap_ultimo_mantenimiento'=>$laRow['tap_ultimo_mantenimiento'],
						'tap_superficie'=>$laRow['tap_superficie'],
						'tap_fertilizacion'=>$laRow['tap_fertilizacion'],
						'maquinariajs'=>$laRow['maquinariajs'],
						'implementojs'=>$laRow['implementojs'],
						'superficie_total'=>$laRow['superficie_total'],
						'superficie_aprovechable'=>$laRow['superficie_aprovechable'],
						'superficie_aprovechada'=>$laRow['superficie_aprovechada'],
						'sector'=>$laRow['sector']
						)
					);

				}//closed while

				return $array_solicitudes;

		}//cierre de la funcion listar solicitud por inspecto


		public function listar_produccion_vegetal_unidad($idunidad){
			$array_vegetal = array();
			$this->ejecutar("SELECT trubro.nombre AS rubro, tciclo.nombre AS ciclo , tproduccion_vegetal.* FROM tunidad_produccion, trubro, tciclo , tproduccion_vegetal WHERE tproduccion_vegetal.id_unidad_produccion='$idunidad' AND tproduccion_vegetal.id_unidad_produccion = tunidad_produccion.id AND tproduccion_vegetal.id_rubro = trubro.id AND tproduccion_vegetal.id_ciclo = tciclo.id");

			while($laRow=$this->arreglo()){
					array_push($array_vegetal, array(
							'ano'=>$laRow['ano'],
							'rubro'=>$laRow['rubro'],
							'ciclo'=>$laRow['ciclo'],
							'superficie'=>$laRow['superficie'],
							'superficie_de_cosecha'=>$laRow['superficie_de_cosecha'],
							'rendimiento'=>$laRow['rendimiento'],
							'produccion'=>$laRow['produccion'],
							'riego'=>$laRow['riego'],
							'superficiebajoriego'=>$laRow['superficiebajoriego'],
							'superficieregada'=>$laRow['superficieregada']
						));
			}
			return $array_vegetal;
		}

		//LISTAS PRODUCCION APICOLA POR UNIDAD
		public function listar_produccion_apicola_unidad($idunidad){
			$fn_array_apicola = array();

			$sql = mysql_query("SELECT trubro.nombre AS rubro, tproduccion_apicola.*, tunidad_medida.siglas FROM tunidad_produccion, trubro, tproduccion_apicola ,tunidad_medida WHERE tproduccion_apicola.id_unidad_produccion='$idunidad' AND tproduccion_apicola.id_unidad_produccion = tunidad_produccion.id AND tproduccion_apicola.id_rubro = trubro.id AND tproduccion_apicola.id_unidad_mendida = tunidad_medida.id");
		
				while($data = mysql_fetch_array($sql)){
					array_push($fn_array_apicola, array(
							'rubro'=>$data['rubro'],
							'cantidad'=>$data['cantidad'],
							'produccion_mensual'=>$data['produccion_mensual'],
							'unidad_medida'=>$data['siglas']
				));

				return  $fn_array_apicola;
			}
		}



		/*listar produccion cunicula*/
		public function listar_produccion_cunicula_unidad($idunidad){
			return $this->ejecutar("SELECT trubro.nombre AS rubro, tproduccion_porcino_cunicula.* FROM tunidad_produccion, trubro, tproduccion_porcino_cunicula WHERE tproduccion_porcino_cunicula.id_unidad_produccion='$idunidad' AND tproduccion_porcino_cunicula.id_unidad_produccion = tunidad_produccion.id AND tproduccion_porcino_cunicula.id_rubro = trubro.id");
		}

	}
?>