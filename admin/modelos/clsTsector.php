<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTsector extends clsDatos{
private $acId;
private $acNombre;
private $acId_parroquia;
private $estado;
private $municipio;
private $parroquia;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acNombre = "";
$this->acId_parroquia = "";
$this->estado = "";
$this->municipio = "";
$this->parroquia = "";
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
$this->ejecutar("select 
	ts.id,
	ts.nombre,
	ts.id_parroquia,
	tm.id as municipio,
	tp.id as estado
from 
tsector as ts 
	inner join tparroquia as tp on (tp.id = ts.id_parroquia)
	inner join tmunicipio as tm on (tm.id = tp.id_municipio)
	inner join testado as te on (te.id = tm.id_estado)
 where(ts.id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_parroquia=$laRow['id_parroquia'];
$this->municipio = $laRow['municipio'];
$this->estado = $laRow['estado'];	
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select
ts.id,
ts.nombre,
ts.id_parroquia,
tp.nombre as parroquia,
tm.nombre as municipio,
te.nombre as estado
from tsector as ts
inner join tparroquia as tp on (tp.id = ts.id_parroquia)
inner join tmunicipio as tm on (tm.id = tp.id_municipio)
inner join testado as te on (te.id = tm.id_estado)
where((ts.id like '%$valor%') or (ts.nombre like '%$valor%') or (ts.id_parroquia like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_parroquia=$laRow['id_parroquia'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
				<td style='font-weight:bold; font-size:20px;'>Estado al que Pertenece</td>
				<td style='font-weight:bold; font-size:20px;'>Municipio al que Pertenece</td>
				<td style='font-weight:bold; font-size:20px;'>Parroquia al que Pertenece</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre."</td>
					<td>".$laRow['estado']."</td>
					<td>".$laRow['municipio']."</td>
					<td>".$laRow['parroquia']."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tsector(id,nombre,id_parroquia)values('$this->acId','$this->acNombre','$this->acId_parroquia')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tsector set id = '$this->acId', nombre = '$this->acNombre', id_parroquia = '$this->acId_parroquia' where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tsector where(id = '$this->acId')");
}
//fin clase
}?>