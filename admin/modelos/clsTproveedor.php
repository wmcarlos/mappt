<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTproveedor extends clsDatos{
private $acRif;
private $acLetra;
private $acNombre;
private $acDireccion;
private $acTelefono;

//constructor de la clase		
public function __construct(){
$this->acRif = "";
$this->acLetra = "";
$this->acNombre = "";
$this->acDireccion = "";
$this->acTelefono = "";
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
$this->ejecutar("select * from tproveedor where(rif = '$this->acRif')");
if($laRow=$this->arreglo())
{		
$this->acRif=$laRow['rif'];
$this->acLetra=$laRow['letra'];
$this->acNombre=$laRow['nombre'];
$this->acDireccion=$laRow['direccion'];
$this->acTelefono=$laRow['telefono'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tproveedor where((rif like '%$valor%') or (letra like '%$valor%') or (nombre like '%$valor%') or (direccion like '%$valor%') or (telefono like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acRif=$laRow['rif'];
$this->acLetra=$laRow['letra'];
$this->acNombre=$laRow['nombre'];
$this->acDireccion=$laRow['direccion'];
$this->acTelefono=$laRow['telefono'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>rif</td>
<td style='font-weight:bold; font-size:20px;'>letra</td>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
<td style='font-weight:bold; font-size:20px;'>direccion</td>
<td style='font-weight:bold; font-size:20px;'>telefono</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acRif."</td>
<td>".$this->acLetra."</td>
<td>".$this->acNombre."</td>
<td>".$this->acDireccion."</td>
<td>".$this->acTelefono."</td>
					<td><a href='?txtrif=".$laRow['rif']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tproveedor(rif,letra,nombre,direccion,telefono)values('$this->acRif','$this->acLetra','$this->acNombre','$this->acDireccion','$this->acTelefono')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tproveedor set rif = '$this->acRif', letra = '$this->acLetra', nombre = '$this->acNombre', direccion = '$this->acDireccion', telefono = '$this->acTelefono' where(rif = '$this->acRif')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tproveedor where(rif = '$this->acRif')");
}
//fin clase
}?>