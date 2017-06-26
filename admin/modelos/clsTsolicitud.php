<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTsolicitud extends clsDatos{
private $acNro_solicitud;
private $acFecha_recepcion;
private $acCedula_rif_productor;
private $acId_funcionario_receptor;
private $acTipo_tramite;
private $fincas;
private $documentos;

//constructor de la clase		
public function __construct(){
$this->acNro_solicitud = "";
$this->acFecha_recepcion = "";
$this->acCedula_rif_productor = "";
$this->acId_funcionario_receptor = "";
$this->acTipo_tramite = "";
}

//metodo magico set
public function __set($atributo, $valor){ 
	$this->$atributo = $valor;
}		
//metodo get
public function __get($atributo){ return trim($this->$atributo); }
//destructor de la clase        
public function __destruct() { }
		
//funcion Buscar        
public function buscar()
{
$llEnc=false;
$this->ejecutar("select tsolicitud .*, date_format(fecha_recepcion, '%d-%m-%Y') as fecha_recepcion from tsolicitud where(nro_solicitud = '$this->acNro_solicitud')");
if($laRow=$this->arreglo())
{		
$this->acNro_solicitud=$laRow['nro_solicitud'];
$this->acFecha_recepcion=$laRow['fecha_recepcion'];
$this->acCedula_rif_productor=$laRow['cedula_rif_productor'];
$this->acId_funcionario_receptor=$laRow['id_funcionario_receptor'];
$this->acTipo_tramite=$laRow['tipo_tramite'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select tsolicitud.*,
	tp.nom_rso as productor
	from tsolicitud 
	inner join tproductor as tp on (tp.ced_rif = tsolicitud.cedula_rif_productor)
	where(
		(tsolicitud.nro_solicitud like '%$valor%') 
		or (tsolicitud.cedula_rif_productor like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_solicitud=$laRow['nro_solicitud'];
$this->acFecha_recepcion=$laRow['fecha_recepcion'];
$this->acCedula_rif_productor=$laRow['cedula_rif_productor'];
$this->acId_funcionario_receptor=$laRow['id_funcionario_receptor'];
$this->acTipo_tramite=$laRow['tipo_tramite'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>Nro. Solicitud</td>
				<td style='font-weight:bold; font-size:20px;'>Productor</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNro_solicitud."</td>
					<td>".$laRow['productor']."</td>
					<td><a href='?txtnro_solicitud=".$laRow['nro_solicitud']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
$fecha = explode("-", $this->acFecha_recepcion);

$this->acFecha_recepcion = $fecha[2]."-".$fecha[1]."-".$fecha[0];

return $this->ejecutar("insert into tsolicitud(nro_solicitud,fecha_recepcion,cedula_rif_productor,id_funcionario_receptor,tipo_tramite)values('$this->acNro_solicitud','$this->acFecha_recepcion','$this->acCedula_rif_productor','$this->acId_funcionario_receptor','$this->acTipo_tramite')");
}

public function incluir_fincas(){
	
	for($i = 0; $i < count($this->fincas); $i++){
		$this->ejecutar("insert into tsolicitud_detalle_unidad_produccion (nro_solicitud,id_unidad_produccion) values ($this->acNro_solicitud,".$this->fincas[$i].")");
	}

}

public function incluir_documentos(){
	for($i = 0; $i < count($this->documentos); $i++){
		$this->ejecutar("insert into tsolicitud_detalle_documento(nro_solicitud,id_documento) 
			values ($this->acNro_solicitud,".$this->documentos[$i].")");
	}
}
        


//funcion modificar
public function modificar($lcVarTem)
{
$this->acFecha_recepcion = $fecha[2]."-".$fecha[1]."-".$fecha[0];

return $this->ejecutar("update tsolicitud set tipo_tramite = '$this->acTipo_tramite' where(nro_solicitud = '$this->acNro_solicitud')");
}

public function getDocuments(){
	$this->ejecutar("select id, nombre from tdocumento order by nombre");

	while($row = $this->arreglo()){
		$data[] = $row;
	}

	return $data;
}

public function getProductores(){
	$this->ejecutar("select ced_rif, nom_rso from tproductor order by nom_rso");

	while($row = $this->arreglo()){
		$arr[] = $row;
	}

	return $arr;
}

public function getFullDataProductor(){
    $this->ejecutar("select 
    	(case when tipo = 1 then 'Natural'
    	when tipo = 2 then 'Juridica' end) AS tipo,
    	telefono,
    	correo,
    	nom_rso
    from tproductor 
    where ced_rif = '$this->acCedula_rif_productor' order by nom_rso");

	while($row = $this->arreglo()){
		$arr[] = $row;
	}

	return $arr;
}

public function getAllUnidadesProduccion(){
	$this->ejecutar("
		select 
		up.id,
		up.nombre,
		te.nombre as estado,
		tm.nombre as municipio,
		tp.nombre as parroquia,
		s.nombre as sector,
		up.direccion,
		up.utm_norte,
		up.utm_este,
		up.superficie_total,
		up.superficie_aprovechable,
		up.superficie_aprovechada
		from tunidad_produccion AS up
		inner join tproductor as p on (p.ced_rif = up.ced_rif_productor)
		inner join tsector as s on (s.id = up.id_sector)
		inner join tparroquia as tp on (tp.id = s.id_parroquia)
		inner join tmunicipio as tm on (tm.id = tp.id_municipio)
		inner join testado as te on (te.id = tm.id_estado) 
		where ced_rif_productor = '$this->acCedula_rif_productor'");

	$cad = "";

	while($arr = $this->arreglo()){
		$row[] = $arr;
	}


	for($i = 0; $i < count($row); $i++){

		$checked = "";
		if( $this->getCheckUnidades($row[$i]["id"]) ){
			$checked = "checked = 'checked'";
			$disabled = 'disabled = "disabled"';
		}

		$cad .= "<tr>";
			$cad.="<td colspan='4'><input type='checkbox' ".$checked ." ".$disabled." name='txtfincas[]' value='".$row[$i]['id']."' /></td>";
		$cad.= "</tr>";
		$cad .= "<tr>";
			$cad.="<td align='right'>Nombre:</td>";
			$cad.="<td colspan='3'>".$row[$i]['nombre']."</td>";
		$cad.= "</tr>";
		$cad .= "<tr>";
			$cad.="<td align='right'>Estado:</td>";
			$cad.="<td>".$row[$i]['estado']."</td>";
			$cad.="<td align='right'>Municipio:</td>";
			$cad.="<td>".$row[$i]['municipio']."</td>";
		$cad.= "</tr>";
		$cad .= "<tr>";
			$cad.="<td align='right'>Parroquia:</td>";
			$cad.="<td>".$row[$i]['parroquia']."</td>";
			$cad.="<td align='right'>Sector:</td>";
			$cad.="<td>".$row[$i]['sector']."</td>";
		$cad.= "</tr>";
		$cad.="<td align='right'>Direccion:</td>";
			$cad.="<td colspan='3'>".$row[$i]['direccion']."</td>";
		$cad .= "<tr>";
			$cad.="<td align='right'>UTM Norte:</td>";
			$cad.="<td>".$row[$i]['utm_norte']."</td>";
			$cad.="<td align='right'>UTM Este:</td>";
			$cad.="<td>".$row[$i]['utm_este']."</td>";
		$cad.= "</tr>";
		$cad.="<td align='right'>Superficie Total (Ha):</td>";
			$cad.="<td colspan='3'>".$row[$i]['superficie_total']."</td>";
		$cad .= "<tr>";
		$cad .= "<tr>";
			$cad.="<td align='right'>Superficie Aprovechable (Ha):</td>";
			$cad.="<td>".$row[$i]['superficie_aprovechable']."</td>";
			$cad.="<td align='right'>Superficie Aprovechada (Ha):</td>";
			$cad.="<td>".$row[$i]['superficie_aprovechada']."</td>";
		$cad.= "</tr>";
	}
	return $cad;
}

public function getCheckUnidades($id_unidad){
	$exs = false;
	if(isset($this->acNro_solicitud) and !empty($this->acNro_solicitud)){

		$this->ejecutar("select id from tsolicitud_detalle_unidad_produccion where nro_solicitud = $this->acNro_solicitud and id_unidad_produccion = ".$id_unidad);
		
		while($row = $this->arreglo()){
			$arr[] = $row;
		}

		if( count($arr) > 0 ){
			$exs = true;
		}else{
			$exs = false;
		}
	}else{
		$exs = false;
	}

	

	return $exs;
}

public function getCheckDocumentos($nro_solicitud,$id_documento){
	$this->ejecutar("select id from tsolicitud_detalle_documento where id_documento = ".$id_documento." and nro_solicitud = ".$nro_solicitud);


	while($row = $this->arreglo()){
		$arr[] = $row;
	}
	
	if(count($arr) > 0){
		return true;
	}else{
		return false;
	}
}
 

public function delete_documentos(){
	return $this->ejecutar("delete from tsolicitud_detalle_documento where nro_solicitud = $this->acNro_solicitud");
}

public function delete_unidades_produccion(){
	return $this->ejecutar("delete from tsolicitud_detalle_unidad_produccion where nro_solicitud = $this->acNro_solicitud");
}
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tsolicitud where(nro_solicitud = '$this->acNro_solicitud')");
}
//fin clase
}?>