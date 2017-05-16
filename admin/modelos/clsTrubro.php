<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTrubro extends clsDatos{
private $acId;
private $acNombre;
private $acId_grupo_rubro;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acNombre = "";
$this->acId_grupo_rubro = "";
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
$this->ejecutar("select * from trubro where(id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_grupo_rubro=$laRow['id_grupo_rubro'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select tr.*,
	(select nombre from tgrupo_rubro as tg where tg.id = tr.id_grupo_rubro) as grupo
 from trubro as tr where((tr.id like '%$valor%') or (tr.nombre like '%$valor%') or (tr.id_grupo_rubro like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acNombre=$laRow['nombre'];
$this->acId_grupo_rubro=$laRow['grupo'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
				<td style='font-weight:bold; font-size:20px;'>Grupo</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre."</td>
					<td>".$this->acId_grupo_rubro."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into trubro(id,nombre,id_grupo_rubro)values('$this->acId','$this->acNombre','$this->acId_grupo_rubro')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update trubro set id = '$this->acId', nombre = '$this->acNombre', id_grupo_rubro = '$this->acId_grupo_rubro' where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from trubro where(id = '$this->acId')");
}
//fin clase
}?>