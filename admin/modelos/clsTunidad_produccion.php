<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTunidad_produccion extends clsDatos{
private $acId;
private $acCed_rif_productor;
private $acNombre;
private $acId_sector;
private $acDireccion;
private $acUtm_norte;
private $acUtm_este;
private $acSuperficie_total;
private $acSuperficie_aprovechable;
private $acSuperficie_aprovechada;
private $acCroquisimg;
private $acTap;
private $acTap_potreros;
private $acTap_cant_potreros;
private $acTap_tipo_cerca;
private $acTap_carga_animal_an_ha;
private $acTap_tipo_pasto;
private $acTap_especie_pasto;
private $acTap_superficie;
private $acTap_ultimo_mantenimiento;
private $acTap_fertilizacion;
private $acMaquinariajs;
private $acImplementojs;
private $estado;
private $municipio;
private $parroquia;

//constructor de la clase		
public function __construct(){
$this->acId = "";
$this->acCed_rif_productor = "";
$this->acNombre = "";
$this->acId_sector = "";
$this->acDireccion = "";
$this->acUtm_norte = "";
$this->acUtm_este = "";
$this->acSuperficie_total = "";
$this->acSuperficie_aprovechable = "";
$this->acSuperficie_aprovechada = "";
$this->acCroquisimg = "";
$this->acTap = "";
$this->acTap_potreros = "";
$this->acTap_cant_potreros = "";
$this->acTap_tipo_cerca = "";
$this->acTap_carga_animal_an_ha = "";
$this->acTap_tipo_pasto = "";
$this->acTap_especie_pasto = "";
$this->acTap_superficie = "";
$this->acTap_ultimo_mantenimiento = "";
$this->acTap_fertilizacion = "";
$this->acMaquinariajs = "";
$this->acImplementojs = "";
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
up.*, 
te.id as estado,
tm.id as municipio,
tp.id as parroquia,
date_format(up.tap_ultimo_mantenimiento, '%d/%m/%Y') as tap_ultimo_mantenimiento
from tunidad_produccion as up
inner join tsector as ts on (ts.id = up.id_sector)
inner join tparroquia as tp on (tp.id = ts.id_parroquia)
inner join tmunicipio as tm on (tm.id = tp.id_municipio)
inner join testado as te on (te.id = tm.id_estado)
where(up.id = '$this->acId')");
if($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acCed_rif_productor=$laRow['ced_rif_productor'];
$this->acNombre=$laRow['nombre'];
$this->acId_sector=$laRow['id_sector'];
$this->acDireccion=$laRow['direccion'];
$this->acUtm_norte=$laRow['utm_norte'];
$this->acUtm_este=$laRow['utm_este'];
$this->acSuperficie_total=$laRow['superficie_total'];
$this->acSuperficie_aprovechable=$laRow['superficie_aprovechable'];
$this->acSuperficie_aprovechada=$laRow['superficie_aprovechada'];
$this->acCroquisimg=$laRow['croquisimg'];
$this->acTap=$laRow['tap'];
$this->acTap_potreros=$laRow['tap_potreros'];
$this->acTap_cant_potreros=$laRow['tap_cant_potreros'];
$this->acTap_tipo_cerca=$laRow['tap_tipo_cerca'];
$this->acTap_carga_animal_an_ha=$laRow['tap_carga_animal_an_ha'];
$this->acTap_tipo_pasto=$laRow['tap_tipo_pasto'];
$this->acTap_especie_pasto=$laRow['tap_especie_pasto'];
$this->acTap_superficie=$laRow['tap_superficie'];
$this->acTap_ultimo_mantenimiento=$laRow['tap_ultimo_mantenimiento'];
$this->acTap_fertilizacion=$laRow['tap_fertilizacion'];
$this->acMaquinariajs=$laRow['maquinariajs'];
$this->acImplementojs=$laRow['implementojs'];
$this->estado = $laRow["estado"];
$this->municipio = $laRow["municipio"];
$this->parroquia = $laRow["parroquia"];
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tunidad_produccion where((id like '%$valor%') or (ced_rif_productor like '%$valor%') or (nombre like '%$valor%') or (id_sector like '%$valor%') or (direccion like '%$valor%') or (utm_norte like '%$valor%') or (utm_este like '%$valor%') or (superficie_total like '%$valor%') or (superficie_aprovechable like '%$valor%') or (superficie_aprovechada like '%$valor%') or (croquisimg like '%$valor%') or (tap like '%$valor%') or (tap_potreros like '%$valor%') or (tap_cant_potreros like '%$valor%') or (tap_tipo_cerca like '%$valor%') or (tap_carga_animal_an_ha like '%$valor%') or (tap_tipo_pasto like '%$valor%') or (tap_especie_pasto like '%$valor%') or (tap_superficie like '%$valor%') or (tap_ultimo_mantenimiento like '%$valor%') or (tap_fertilizacion like '%$valor%') or (maquinariajs like '%$valor%') or (implementojs like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acId=$laRow['id'];
$this->acCed_rif_productor=$laRow['ced_rif_productor'];
$this->acNombre=$laRow['nombre'];
$this->acId_sector=$laRow['id_sector'];
$this->acDireccion=$laRow['direccion'];
$this->acUtm_norte=$laRow['utm_norte'];
$this->acUtm_este=$laRow['utm_este'];
$this->acSuperficie_total=$laRow['superficie_total'];
$this->acSuperficie_aprovechable=$laRow['superficie_aprovechable'];
$this->acSuperficie_aprovechada=$laRow['superficie_aprovechada'];
$this->acCroquisimg=$laRow['croquisimg'];
$this->acTap=$laRow['tap'];
$this->acTap_potreros=$laRow['tap_potreros'];
$this->acTap_cant_potreros=$laRow['tap_cant_potreros'];
$this->acTap_tipo_cerca=$laRow['tap_tipo_cerca'];
$this->acTap_carga_animal_an_ha=$laRow['tap_carga_animal_an_ha'];
$this->acTap_tipo_pasto=$laRow['tap_tipo_pasto'];
$this->acTap_especie_pasto=$laRow['tap_especie_pasto'];
$this->acTap_superficie=$laRow['tap_superficie'];
$this->acTap_ultimo_mantenimiento=$laRow['tap_ultimo_mantenimiento'];
$this->acTap_fertilizacion=$laRow['tap_fertilizacion'];
$this->acMaquinariajs=$laRow['maquinariajs'];
$this->acImplementojs=$laRow['implementojs'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Productor</td>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
				<td style='font-weight:bold; font-size:20px;'>Superficie Total</td>
				<td style='font-weight:bold; font-size:20px;'>Superficie Aprovechable</td>
				<td style='font-weight:bold; font-size:20px;'>Superficie Aprovechada</td>
				<td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
				<td>".$this->acCed_rif_productor."</td>
				<td>".$this->acNombre."</td>
				<td>".$this->acSuperficie_total."</td>
				<td>".$this->acSuperficie_aprovechable."</td>
				<td>".$this->acSuperficie_aprovechada."</td>
					<td><a href='?txtid=".$laRow['id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
$this->acTap_ultimo_mantenimiento = $this->changedate($this->acTap_ultimo_mantenimiento);
return $this->ejecutar("insert into tunidad_produccion(id,ced_rif_productor,nombre,id_sector,direccion,utm_norte,utm_este,superficie_total,superficie_aprovechable,superficie_aprovechada,croquisimg,tap,tap_potreros,tap_cant_potreros,tap_tipo_cerca,tap_carga_animal_an_ha,tap_tipo_pasto,tap_especie_pasto,tap_superficie,tap_ultimo_mantenimiento,tap_fertilizacion,maquinariajs,implementojs)values('$this->acId','$this->acCed_rif_productor','$this->acNombre','$this->acId_sector','$this->acDireccion','$this->acUtm_norte','$this->acUtm_este','$this->acSuperficie_total','$this->acSuperficie_aprovechable','$this->acSuperficie_aprovechada','$this->acCroquisimg','$this->acTap','$this->acTap_potreros','$this->acTap_cant_potreros','$this->acTap_tipo_cerca','$this->acTap_carga_animal_an_ha','$this->acTap_tipo_pasto','$this->acTap_especie_pasto','$this->acTap_superficie','$this->acTap_ultimo_mantenimiento','$this->acTap_fertilizacion','$this->acMaquinariajs','$this->acImplementojs')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
$this->acTap_ultimo_mantenimiento = $this->changedate($this->acTap_ultimo_mantenimiento);
return $this->ejecutar("update tunidad_produccion set id = '$this->acId', ced_rif_productor = '$this->acCed_rif_productor', nombre = '$this->acNombre', id_sector = '$this->acId_sector', direccion = '$this->acDireccion', utm_norte = '$this->acUtm_norte', utm_este = '$this->acUtm_este', superficie_total = '$this->acSuperficie_total', superficie_aprovechable = '$this->acSuperficie_aprovechable', superficie_aprovechada = '$this->acSuperficie_aprovechada', croquisimg = '$this->acCroquisimg', tap = '$this->acTap', tap_potreros = '$this->acTap_potreros', tap_cant_potreros = '$this->acTap_cant_potreros', tap_tipo_cerca = '$this->acTap_tipo_cerca', tap_carga_animal_an_ha = '$this->acTap_carga_animal_an_ha', tap_tipo_pasto = '$this->acTap_tipo_pasto', tap_especie_pasto = '$this->acTap_especie_pasto', tap_superficie = '$this->acTap_superficie', tap_ultimo_mantenimiento = '$this->acTap_ultimo_mantenimiento', tap_fertilizacion = '$this->acTap_fertilizacion', maquinariajs = '$this->acMaquinariajs', implementojs = '$this->acImplementojs' where(id = '$this->acId')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tunidad_produccion where(id = '$this->acId')");
}
//fin clase
}?>