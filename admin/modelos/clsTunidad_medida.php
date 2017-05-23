<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTunidad_medida extends clsDatos{
private $acId;
private $acNombre;
private $acSiglas;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acNombre = "";
$this->acSiglas = "";
}

//metodo magico set
public function __set($atributo, $valor){ $this->$atributo = strtoupper($valor);}		
//metodo get
public function __get($atributo){ return trim($this->$atributo); }
//destructor de la clase        
public function __destruct() { }
		
//funcion Buscar        
public function buscar()
{
$llEnc=false;
$this->ejecutar("select * from tunidad_medida where(id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acSiglas=$laRow['siglas'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tunidad_medida where((id like '%$valor%') or (nombre like '%$valor%') or (siglas like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acSiglas=$laRow['siglas'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
				<td style='font-weight:bold; font-size:20px;'>Siglas</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre."</td>
					<td>".$this->acSiglas."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tunidad_medida(id,nombre,siglas)values('$this->acId','$this->acNombre','$this->acSiglas')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tunidad_medida set id = '$this->acId', nombre = '$this->acNombre', siglas = '$this->acSiglas' where(id = '$this->acId')");
}
 

//listar unidades de medida
public function listar_unidad_medida()
{	
	$array = array();
	$this->ejecutar("SELECT * FROM tunidad_medida");
	//return $this->arreglo();
	while($laRow = $this->arreglo()){
		array_push($array,array(
			'idunidad_medida'=>$laRow['id'],
			'nombre_unidad_medida'=>$laRow['nombre'],
			'siglas_unidad_medida'=>$laRow['siglas']
		));
	}
	return $array; 
} 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tunidad_medida where(id = '$this->acId')");
}
//fin clase
}?>