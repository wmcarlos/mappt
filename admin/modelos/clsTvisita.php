<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTvisita extends clsDatos{
private $acId;
private $acId_solicitud;
private $acId_tecnico;
private $acFecha;
private $acComentario;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acId_solicitud = "";
$this->acId_tecnico = "";
$this->acFecha = "";
$this->acComentario = "";
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
$this->ejecutar("select id, id_solicitud, id_tecnico, date_format(fecha, '%d/%m/%Y') as fecha, comentario from tvisita where(id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acId_solicitud=$laRow['id_solicitud'];
$this->acId_tecnico=$laRow['id_tecnico'];
$this->acFecha=$laRow['fecha'];
$this->acComentario=$laRow['comentario'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tvisita where((id like '%$valor%') or (id_solicitud like '%$valor%') or (id_tecnico like '%$valor%') or (fecha like '%$valor%') or (comentario like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acId_solicitud=$laRow['id_solicitud'];
$this->acId_tecnico=$laRow['id_tecnico'];
$this->acFecha=$laRow['fecha'];
$this->acComentario=$laRow['comentario'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>id</td>
				<td style='font-weight:bold; font-size:20px;'>id_solicitud</td>
				<td style='font-weight:bold; font-size:20px;'>id_tecnico</td>
				<td style='font-weight:bold; font-size:20px;'>fecha</td>
				<td style='font-weight:bold; font-size:20px;'>comentario</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acId."</td>
					<td>".$this->acId_solicitud."</td>
					<td>".$this->acId_tecnico."</td>
					<td>".$this->acFecha."</td>
					<td>".$this->acComentario."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
 $expl = explode("/", $this->acFecha);
 $this->acFecha = $expl[2]."/".$expl[1]."/".$expl[0];

return $this->ejecutar("insert into tvisita(id,id_solicitud,id_tecnico,fecha,comentario)values('$this->acId','$this->acId_solicitud','$this->acId_tecnico','$this->acFecha','$this->acComentario')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
$expl = explode("/", $this->acFecha);
 $this->acFecha = $expl[2]."/".$expl[1]."/".$expl[0];

return $this->ejecutar("update tvisita set id = '$this->acId', id_solicitud = '$this->acId_solicitud', id_tecnico = '$this->acId_tecnico', fecha = '$this->acFecha', comentario = '$this->acComentario' where(id = '$this->acId')");
}

public function modificar_desde_tecnico()
{

return $this->ejecutar("update tvisita set estatus = 2, comentario = '$this->acComentario' where(id = '$this->acId')");
}

public function modificar_desde_analista($st)
{
	return $this->ejecutar("update tvisita set estatus = $st where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tvisita where(id = '$this->acId')");
}
//fin clase
}?>