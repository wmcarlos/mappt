<?php
	
	//primero obtendremos los datos del productor
	require_once("../modelos/clsTproductor.php");
	$objFuncionescontroller =  new clsFunciones;
	$lobjTproductor = new clsTproductor();
	$lobjTproductor->acId=$_REQUEST['txtid_productor'];
	$lobjTproductor->acTipo=$_POST['txttipo'];
	$lobjTproductor->acCed_rif=$_POST['txtced_rif'];
	$lobjTproductor->acNom_rso=$_POST['txtnom_rso'];
	$lobjTproductor->acId_sector=$_POST['txtid_productor_sector'];
	$lobjTproductor->acDireccion=$_POST['txtdireccion'];
	$lobjTproductor->acTelefono=$_POST['txttelefono'];
	$lobjTproductor->acCorreo=$_POST['txtcorreo'];
	$lobjTproductor->acAsociacionesjs=$objFuncionescontroller->transform_detail_checkbox($_POST['txtasociacionesjs']);	



	if(isset($_POST['btnguardar']))
	{

		echo "si estas guardando".$_REQUEST['txtid_productor'];
		echo "<br>";
		echo 'TIPO'.$_POST['txttipo'];
		echo '<br>';
		echo 'cedula'.$_POST['txtced_rif'];
		echo '<br>';
		echo 'sector'.$_POST['txtid_productor_sector'];
		echo '<br>';
		echo 'correo'.$_POST['txtcorreo'];
		echo '<br>';
		echo 'Telefono'.$_POST['txttelefono'];
		echo '<br>';
		echo 'Direccion'.$_POST['txtdireccion'];
		echo '<br>';
	}



?>