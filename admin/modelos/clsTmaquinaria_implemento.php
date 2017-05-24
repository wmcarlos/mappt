<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTmaquinaria_implemento extends clsDatos{
private $acId;
private $acNombre;
private $acTipo;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acNombre = "";
$this->acTipo = "";
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
$this->ejecutar("select * from tmaquinaria_implemento where(id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acTipo=$laRow['tipo'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tmaquinaria_implemento where((id like '%$valor%') or (nombre like '%$valor%') or (tipo like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acTipo=$laRow['tipo'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
				<td style='font-weight:bold; font-size:20px;'>Tipo</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$tipo = ($this->acTipo == 1) ? "Maquinaria" : "Implemento";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre."</td>
					<td>".$tipo."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tmaquinaria_implemento(id,nombre,tipo)values('$this->acId','$this->acNombre','$this->acTipo')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tmaquinaria_implemento set id = '$this->acId', nombre = '$this->acNombre', tipo = '$this->acTipo' where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tmaquinaria_implemento where(id = '$this->acId')");
}
	
//funcion para listar las maquinarias
public function listar_maquinaria_complementos(){
	$lrTb=$this->ejecutar("select * from tmaquinaria_implemento");
	$array_maquinaria = array();
	$array_implemento = array();
		while($laRow=$this->arreglo())
	{		
		//$this->acId=$laRow['id'];
		//$this->acNombre=$laRow['nombre'];
		//$this->acTipo=$laRow['tipo'];	
		if($laRow['tipo']==1){	
			array_push($array_maquinaria, array(
				'id'=>$laRow['id'],
				'nombre'=>$laRow['nombre'],
				'tipo'=>$laRow['tipo']
				)
			);
		}else{
			array_push($array_implemento, array(
				'id'=>$laRow['id'],
				'nombre'=>$laRow['nombre'],
				'tipo'=>$laRow['tipo']
				)
			);
		}
	}//closed while

	return array($array_maquinaria, $array_implemento);
}




//fin clase
}?>