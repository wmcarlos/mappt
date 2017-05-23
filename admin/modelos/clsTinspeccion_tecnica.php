<?php
	//registramos todas las inspeccionesrequire_once("clsDatos.php");
	require_once("clsDatos.php");
	class clsTinspeccion_tecnica extends clsDatos{
			/*datos de produccion vegetal*/
			public $id_unidad_produccion;
			public $id_ciclo;
			public $ano;
			public $id_rubro;
			public $superficie; 
			public $superficie_de_cosecha; 
			public $rendimiento; 
			public $produccion; 
			public $riego; 
			public $superficiebajoriego; 
			public $superficieregada;
			public $tipoambiente; 
			public $fecha; 
			public $fuente_agua_vegetal; 
			public $metodo_riego_js ; 

			/*datos de produccion apicola*/
			public $cantidad_apicola;
			public $produccion_mensual_apicola;
			public $unidad_medida_apicola;

			/*datos produccion cunicula*/
			public $cantidad_cunicula;



		//insertar produccion vegetal
		public function insertar_produccion_vegetal(){
			return $this->ejecutar("INSERT INTO  tproduccion_vegetal VALUES ('','$this->id_unidad_produccion','$this->id_ciclo','$this->ano','$this->id_rubro','$this->superficie','$this->superficie_de_cosecha','$this->rendimiento','$this->produccion','$this->riego','$this->superficiebajoriego','$this->superficieregada','$this->tipoambiente','','$this->fecha','$this->fuente_agua_vegetal','$this->metodo_riego_js','1')");
		}
		/*Insertar produccion apicola*/
		public function insertar_produccion_apicola(){
			return $this->ejecutar("INSERT INTO tproduccion_apicola VALUES ('','$this->id_unidad_produccion','','$this->cantidad_apicola','$this->id_rubro','$this->produccion_mensual_apicola','$this->unidad_medida_apicola','1')");
		}
		/*Insertar produccion cunicula*/
		public function insertar_produccion_cunicula(){
			return $this->ejecutar("INSERT INTO tproduccion_porcino_cunicula VALUES ('','$this->id_unidad_produccion','','$this->id_rubro','$this->cantidad_cunicula','1')");
		}



	}


?>