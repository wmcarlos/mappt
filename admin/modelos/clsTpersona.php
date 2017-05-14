<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTpersona extends clsDatos{
private $acCedula;
private $acNacionalidad;
private $acNombres;
private $acApellidos;
private $acFechanacimiento;
private $acSexo;
private $acTelefono;
private $acCorreo;
private $acDireccion;

//constructor de la clase		
public function __construct(){
$this->acCedula = "";
$this->acNacionalidad = "";
$this->acNombres = "";
$this->acApellidos = "";
$this->acFechanacimiento = "";
$this->acSexo = "";
$this->acTelefono = "";
$this->acCorreo = "";
$this->acDireccion = "";
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
$this->ejecutar("select * from tpersona where(cedula = '$this->acCedula')");
if($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNacionalidad=$laRow['nacionalidad'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acFechanacimiento=$laRow['fechanacimiento'];
$this->acSexo=$laRow['sexo'];
$this->acTelefono=$laRow['telefono'];
$this->acCorreo=$laRow['correo'];
$this->acDireccion=$laRow['direccion'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tpersona where((cedula like '%$valor%') or (nacionalidad like '%$valor%') or (nombres like '%$valor%') or (apellidos like '%$valor%') or (fechanacimiento like '%$valor%') or (sexo like '%$valor%') or (telefono like '%$valor%') or (correo like '%$valor%') or (direccion like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNacionalidad=$laRow['nacionalidad'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acFechanacimiento=$laRow['fechanacimiento'];
$this->acSexo=$laRow['sexo'];
$this->acTelefono=$laRow['telefono'];
$this->acCorreo=$laRow['correo'];
$this->acDireccion=$laRow['direccion'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>cedula</td>
<td style='font-weight:bold; font-size:20px;'>nacionalidad</td>
<td style='font-weight:bold; font-size:20px;'>nombres</td>
<td style='font-weight:bold; font-size:20px;'>apellidos</td>
<td style='font-weight:bold; font-size:20px;'>fechanacimiento</td>
<td style='font-weight:bold; font-size:20px;'>sexo</td>
<td style='font-weight:bold; font-size:20px;'>telefono</td>
<td style='font-weight:bold; font-size:20px;'>correo</td>
<td style='font-weight:bold; font-size:20px;'>direccion</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCedula."</td>
<td>".$this->acNacionalidad."</td>
<td>".$this->acNombres."</td>
<td>".$this->acApellidos."</td>
<td>".$this->acFechanacimiento."</td>
<td>".$this->acSexo."</td>
<td>".$this->acTelefono."</td>
<td>".$this->acCorreo."</td>
<td>".$this->acDireccion."</td>
					<td><a href='?txtcedula=".$laRow['cedula']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tpersona(cedula,nacionalidad,nombres,apellidos,fechanacimiento,sexo,telefono,correo,direccion)values('$this->acCedula','$this->acNacionalidad','$this->acNombres','$this->acApellidos','$this->acFechanacimiento','$this->acSexo','$this->acTelefono','$this->acCorreo','$this->acDireccion')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tpersona set cedula = '$this->acCedula', nacionalidad = '$this->acNacionalidad', nombres = '$this->acNombres', apellidos = '$this->acApellidos', fechanacimiento = '$this->acFechanacimiento', sexo = '$this->acSexo', telefono = '$this->acTelefono', correo = '$this->acCorreo', direccion = '$this->acDireccion' where(cedula = '$this->acCedula')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tpersona where(cedula = '$this->acCedula')");
}
//fin clase
}?>