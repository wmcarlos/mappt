<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTparroquia extends clsDatos{
private $acId;
private $acNombre;
private $acId_municipio;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acNombre = "";
$this->acId_municipio = "";
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
$this->ejecutar("select * from tparroquia where(id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_municipio=$laRow['id_municipio'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tparroquia where((id like '%$valor%') or (nombre like '%$valor%') or (id_municipio like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_municipio=$laRow['id_municipio'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>id</td>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
<td style='font-weight:bold; font-size:20px;'>id_municipio</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acId."</td>
<td>".$this->acNombre."</td>
<td>".$this->acId_municipio."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tparroquia(id,nombre,id_municipio)values('$this->acId','$this->acNombre','$this->acId_municipio')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tparroquia set id = '$this->acId', nombre = '$this->acNombre', id_municipio = '$this->acId_municipio' where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tparroquia where(id = '$this->acId')");
}
//fin clase
}?>