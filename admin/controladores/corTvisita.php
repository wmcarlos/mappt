<?php
require_once("../modelos/clsTvisita.php");
$lobjTvisita = new clsTvisita();

$lobjTvisita->acId=$_REQUEST['txtid'];
$lobjTvisita->acId_solicitud=$_POST['txtid_solicitud'];
$lobjTvisita->acId_tecnico=$_POST['txtid_tecnico'];
$lobjTvisita->acFecha=$_POST['txtfecha'];
$lobjTvisita->acComentario=$_POST['txtcomentario'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];

$lcId_solicitud = $_GET["txtid_solicitud"];

$desde = $_POST['txtdesde'];

switch($lcOperacion){

	case "incluir":
	
		if($lobjTvisita->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTvisita->incluir();
			if($desde == 'coordinador'){
				print "<script> location.href='vistaTasignacion.php?asignado=si'; </script>";
			}
			
		}
	
	break;
	
	case "buscar":
	
		if($lobjTvisita->buscar()){
			$lcId=$lobjTvisita->acId;
			$lcId_solicitud=$lobjTvisita->acId_solicitud;
			$lcId_tecnico=$lobjTvisita->acId_tecnico;
			$lcFecha=$lobjTvisita->acFecha;
			$lcComentario=$lobjTvisita->acComentario; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":

		if($desde == 'coordinador'){
			$lobjTvisita->modificar($lcVarTem);
			print "<script> location.href='vistaTasignacion.php?modificado=si'; </script>";
		}else if ($desde == 'tecnico'){
			$lobjTvisita->modificar_desde_tecnico();
			print "<script> location.href='vistaTaplicarvisita.php?modificado=si'; </script>";
		}
	break;


	case 'aprobar':
			$lobjTvisita->modificar_desde_analista(3);
			print "<script> location.href='vistaTlistaanalisis.php?aprobado=si'; </script>";
	break;

	case 'desaprobar':
			$lobjTvisita->modificar_desde_analista(1);
			print "<script> location.href='vistaTlistaanalisis.php?aprobado=no'; </script>";
	break;
}

?>