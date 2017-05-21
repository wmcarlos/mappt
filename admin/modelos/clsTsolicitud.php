<?php
	
	require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
	class clsTsolicitud extends clsDatos{
			
		private $idtsolicitud_certificacion_renovacion;
		private $fecha_recepcion;
		private $cedula_rif_productor;
		private $id_unidad_produccion;	
		private $documentos;	
		private $funcionario_receptor;	
		private $oficina_area;
		private $num_certificado_runnopa;
		private $num_registro_productor;
		private $tipo_tramite;
		private $estatus_solicitud;	

		public function __construct(){
			$this->fecha_recepcion="";
			$this->idtsolicitud_certificacion_renovacion="";
			$this->cedula_rif_productor = "";
			$this->id_unidad_produccion = "";
			$this->documentos = "";
			$this->funcionario_receptor = "";
			$this->oficina_area = "";
			$this->num_registro_productor = "";
			$this->tipo_tramite = "";
			$this->estatus_solicitud = "";
		}


		//metodo magico set
		public function __set($atributo, $valor){ $this->$atributo = strtoupper($valor);}		
		//metodo get
		public function __get($atributo){ return trim($this->$atributo); }
		//destructor de la clase        
		public function __destruct() { }


		//insercion de datos	
		public function incluir()
		{
			return $this->ejecutar("insert into tsolicitud_certificado_renovacion values('','$this->fecha_recepcion','$this->cedula_rif_productor','$this->id_unidad_produccion','$this->documentos','$this->funcionario_receptor','$this->oficina_area','$this->num_certificado_runnopa','$this->num_registro_productor','$this->tipo_tramite','1')");
		}
		    



	}//cierre de la clase

?>