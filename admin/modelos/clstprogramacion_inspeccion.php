<?php
	require_once("clsDatos.php");
	class clstprogramacion_inspeccion extends clsDatos{
		
		//primeramente vamos a buscar todo el listado de solicitudes de certificado sin utilizar aun
		public function listar_solicitudes(){
			$array_solicitudes = [];
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

		
	}
?>