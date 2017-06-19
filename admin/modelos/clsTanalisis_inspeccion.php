<?php
	//registramos todas las inspeccionesrequire_once("clsDatos.php");
	require_once("clsDatos.php");
	class clsTanalisis_inspeccion extends clsDatos{
	
		public $nro_informe_inspeccion; 
		public $observacion_inspeccion;
		public $nombre_usu;


		/*registrar una nueva solicitud de analisis*/
		public function insertar_solicitud_analisis(){
			return $this->ejecutar("INSERT INTO tanalisis_inspeccion VALUES('','$this->nro_informe_inspeccion','','','','','','','$this->nombre_usu')");
		}

		public function actualizar_solicitud($idsolicitud){
			return $this->ejecutar("UPDATE tsolicitud_certificado_renovacion SET estatus_solicitud ='3' WHERE idtsolicitud_certificacion_renovacion='$idsolicitud'");
		}

	}


?>