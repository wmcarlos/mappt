<?php
	//registramos todas las inspeccionesrequire_once("clsDatos.php");
	class clsTinspeccion_tecnica extends clsDatos{

			private $id_unidad_produccion;
			private $id_ciclo;
			private $ano;
			private $id_rubro;
			private $superficie; 
			private $superficie_de_cosecha; 
			private $rendimiento; 
			private $produccion; 
			private $riego; 
			private $superficiebajoriego; 
			private $superficieregada;
			private $tipoambiente; 
			private $fecha; 
			private $fuente_agua_vegetal; 
			private $metodo_riego_js ; 



		//constructor de la clase		
		public function __construct(){
			$this->id_unidad_produccion = "";
			$this->id_ciclo = "";
			$this->ano = "";
			$this->id_rubro = "";
			$this->superficie= ""; 
			$this->superficie_de_cosecha = ""; 
			$this->rendimiento = ""; 
			$this->produccion = ""; 
			$this->riego = ""; 
			$this->superficiebajoriego= ""; 
			$this->superficieregada = "";
			$this->tipoambiente= ""; 
			$this->fecha= ""; 
			$this->fuente_agua_vegetal= ""; 
			$this->metodo_riego_js = ""; 
		}

		//insertar produccion vegetal
		public function insertar_produccion_vegetal(){
			return $this->ejecutar("INSERT INTO  tproduccion_vegetal VALUES ('','$this->id_unidad_produccion','$this->id_ciclo','$this->ano','$this->id_rubro','$this->superficie','$this->superficie_de_cosecha','$this->rendimiento','$this->produccion','$this->riego','$this->superficiebajoriego','$this->superficieregada','$this->tipoambiente','','$this->fecha','$this->fuente_agua_vegetal','$this->metodo_riego_js','1')");
		}

		//metodo magico set
		public function __set($atributo, $valor){ $this->$atributo = strtoupper($valor);}		
		//metodo get
		public function __get($atributo){ return trim($this->$atributo); }
		//destructor de la clase        
		public function __destruct() { }



	}


?>