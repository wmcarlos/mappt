<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTsector extends clsDatos{
private $acId;
private $acNombre;
private $acId_parroquia;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acNombre = "";
$this->acId_parroquia = "";
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
$this->ejecutar("select * from tsector where(id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_parroquia=$laRow['id_parroquia'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tsector where((id like '%$valor%') or (nombre like '%$valor%') or (id_parroquia like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_parroquia=$laRow['id_parroquia'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>id</td>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
<td style='font-weight:bold; font-size:20px;'>id_parroquia</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acId."</td>
<td>".$this->acNombre."</td>
<td>".$this->acId_parroquia."</td>
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