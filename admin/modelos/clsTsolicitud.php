<?php
	
	require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
	class clsTsolicitud extends clsDatos{
			
		public $idtsolicitud_certificacion_renovacion;
		public $fecha_recepcion;
		public $cedula_rif_productor;
		public $id_unidad_produccion;	
		public $documentos;	
		public $funcionario_receptor;	
		public $oficina_area;
		public $num_certificado_runnopa;
		public $num_registro_productor;
		public $tipo_tramite;
		public $estatus_solicitud;	


		//insercion de datos	
		public function incluir()
		{
			return $this->ejecutar("insert into tsolicitud_certificado_renovacion values('','$this->fecha_recepcion','$this->cedula_rif_productor','$this->id_unidad_produccion','$this->documentos','$this->funcionario_receptor','$this->oficina_area','$this->num_certificado_runnopa','$this->num_registro_productor','$this->tipo_tramite','1')");
		}
		    



	}//cierre de la clase

?>