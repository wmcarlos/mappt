<?php
//Cantidad de Atributos y clase
require_once("../modelos/clsFunciones.php");
$clase = "cls".$_POST['clase'];
$operacion = $_POST['operacion'];
$datos = $_POST['datos'];
if(!isset($operacion)){
require_once("../modelos/".$clase.".php");
$obj = new $clase();
print($obj->busqueda_ajax($datos));
}else{
	$objFunciones = new clsFunciones();
	//Otra Manera
	switch($operacion){
		case "listar_municipios":
			print "<option value=''>Seleccione</option>".$objFunciones->combo_segun_combo("tmunicipio","id","nombre","id_estado",$datos,"");
		break;
		case "listar_parroquias":
			print "<option value=''>Seleccione</option>".$objFunciones->combo_segun_combo("tparroquia","id","nombre","id_municipio",$datos,"");
		break;
		case "listar_sectores":
			print "<option value=''>Seleccione</option>".$objFunciones->combo_segun_combo("tsector","id","nombre","id_parroquia",$datos,"");
		break;
		case "busqueda_ajax_productor":
			require_once("../modelos/clsTproductor.php");
			$objProductor = new clsTproductor();
			print $objProductor->busqueda_ajax2($datos);
		break;
	}	
}
?>