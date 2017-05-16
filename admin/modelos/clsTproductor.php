<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTproductor extends clsDatos{
private $acId;
private $acTipo;
private $acCed_rif;
private $acNom_rso;
private $acId_sector;
private $acDireccion;
private $acTelefono;
private $acCorreo;
private $acAsociacionesjs;
private $estado;
private $municipio;
private $parroquia;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acTipo = "";
$this->acCed_rif = "";
$this->acNom_rso = "";
$this->acId_sector = "";
$this->acDireccion = "";
$this->acTelefono = "";
$this->acCorreo = "";
$this->acAsociacionesjs = "";
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
tp.id,
tp.tipo,
tp.ced_rif,
tp.nom_rso,
tp.id_sector,
tp.direccion,
tp.telefono,
tp.correo,
tp.asociacionesjs,
te.id as estado,
tm.id as municipio,
tpa.id as parroquia
 from tproductor as tp
 inner join tsector as ts on (ts.id = tp.id_sector)
 inner join tparroquia as tpa on (tpa.id = ts.id_parroquia)
 inner join tmunicipio as tm on (tm.id = tpa.id_municipio)
 inner join testado as te on (te.id = tm.id_estado)
 where(tp.id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acTipo=$laRow['tipo'];
$this->acCed_rif=$laRow['ced_rif'];
$this->acNom_rso=$laRow['nom_rso'];
$this->acId_sector=$laRow['id_sector'];
$this->acDireccion=$laRow['direccion'];
$this->acTelefono=$laRow['telefono'];
$this->acCorreo=$laRow['correo'];
$this->acAsociacionesjs=$laRow['asociacionesjs'];
$this->estado = $laRow['estado'];
$this->municipio = $laRow['municipio'];
$this->parroquia = $laRow['parroquia'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tproductor where((id like '%$valor%') or (tipo like '%$valor%') or (ced_rif like '%$valor%') or (nom_rso like '%$valor%') or (id_sector like '%$valor%') or (direccion like '%$valor%') or (telefono like '%$valor%') or (correo like '%$valor%') or (asociacionesjs like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acTipo=$laRow['tipo'];
$this->acCed_rif=$laRow['ced_rif'];
$this->acNom_rso=$laRow['nom_rso'];
$this->acId_sector=$laRow['id_sector'];
$this->acDireccion=$laRow['direccion'];
$this->acTelefono=$laRow['telefono'];
$this->acCorreo=$laRow['correo'];
$this->acAsociacionesjs=$laRow['asociacionesjs'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Tipo</td>
				<td style='font-weight:bold; font-size:20px;'>Cedula / Rif</td>
				<td style='font-weight:bold; font-size:20px;'>Nombre / Razon Social</td>
				<td style='font-weight:bold; font-size:20px;'>Telefono</td>
				<td style='font-weight:bold; font-size:20px;'>Correo</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";

$tipo = ($this->acTipo == 1) ? "Natural" : "Juridica";

$llEnc=$llEnc."<tr>
					<td>".$tipo."</td>
					<td>".$this->acCed_rif."</td>
					<td>".$this->acNom_rso."</td>
					<td>".$this->acTelefono."</td>
					<td>".$this->acCorreo."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tproductor(id,tipo,ced_rif,nom_rso,id_sector,direccion,telefono,correo,asociacionesjs)values('$this->acId','$this->acTipo','$this->acCed_rif','$this->acNom_rso','$this->acId_sector','$this->acDireccion','$this->acTelefono','$this->acCorreo','$this->acAsociacionesjs')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tproductor set id = '$this->acId', tipo = '$this->acTipo', ced_rif = '$this->acCed_rif', nom_rso = '$this->acNom_rso', id_sector = '$this->acId_sector', direccion = '$this->acDireccion', telefono = '$this->acTelefono', correo = '$this->acCorreo', asociacionesjs = '$this->acAsociacionesjs' where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tproductor where(id = '$this->acId')");
}
//fin clase
}?>