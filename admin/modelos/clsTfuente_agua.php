<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTfuente_agua extends clsDatos{
private $acId;
private $acNombre;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acNombre = "";
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
$this->ejecutar("select * from tfuente_agua where(id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];		
$llEnc=true;
}
return $llEnc;
}

public function buscarbyname()
{
$llEnc=false;
$this->ejecutar("select * from tfuente_agua where(nombre = '$this->acNombre')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tfuente_agua where((id like '%$valor%') or (nombre like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tfuente_agua(id,nombre)values('$this->acId','$this->acNombre')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tfuente_agua set id = '$this->acId', nombre = '$this->acNombre' where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tfuente_agua where(id = '$this->acId')");
}
//fin clase
}?>