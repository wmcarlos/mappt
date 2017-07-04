<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTunidad_produccion.php');

$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
	$id = $objFunciones->ultimo_id_plus1('tunidad_produccion','id');
}else{
	//$municipios = $objFunciones->combo_segun_combo("tmunicipio","id","nombre","id_estado",$estado,$municipio);
	//$parroquias = $objFunciones->combo_segun_combo("tparroquia","id","nombre","id_municipio",$municipio,$parroquia);
	//$sectores = $objFunciones->combo_segun_combo("tsector","id","nombre","id_parroquia",$parroquia,$lcId_sector);
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title>Gestion Unidad de Produccion</title>
	<?php print($objFunciones->librerias_generales); ?>
	<script>
		function cargar()
		{
			var operacion = '<?php print($operacion);?>';
			var listo = '<?php print($listo);?>';
			mensajes(operacion,listo);
			cargar_select(operacion,listo);
		}
	</script>
</head>
<body onload='cargar();'>
	<?php print($objFunciones->cuadro_busqueda); ?>
<!--
	Codigo
	Antes del
	Formulario
	antes_form.php
-->
<?php @include('antes_form.php'); ?>
<div id='mensajes_sistema'></div><br />
<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>
</br>
<form name='form1' id='form1' autocomplete='off' method='post'/>
<div class='cont_frame' style="width: 96%;">
	<h1>Unidad de Produccion</h1>
	<table border='1' class='datos' align='center'>
		<tr style='display:none;'>
			<td align='right'><span class='rojo'>*</span> id:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtid' value='<?php print($lcId);?>' id='txtid' class='validate[required]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Nombre:</td>
			<td colspan="3"><input type='text' disabled='disabled' maxlength='50' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required],maxSize[50],minSize[5]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Estado:</td>
			<td><select disabled='disabled' name='txtid_estado' id='txtid_estado' operacion="listar_municipios" load_data="txtid_municipio" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $objFunciones->crear_combo("testado","id","nombre",$estado); ?>
			</select></td>
			<td align='right'><span class='rojo'>*</span> Municipio:</td>
			<td><select disabled='disabled' name='txtid_municipio' id='txtid_municipio' operacion="listar_parroquias" load_data="txtid_parroquia" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $municipios; ?>
			</select></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Parroquia:</td>
			<td><select disabled='disabled' name='txtid_parroquia' id='txtid_parroquia' operacion="listar_sectores" load_data="txtid_sector" class='validate[required] select_change'>
				<option value="">Seleccione</option>
				<?php print $parroquias; ?>
			</select></td>
			<td align='right'><span class='rojo'>*</span> Sector:</td>
			<td><select disabled='disabled' name='txtid_sector' id='txtid_sector' class='validate[required]'>
				<option value="">Seleccione</option>
				<?php print $sectores; ?>
			</select></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Dirección:</td>
			<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
			<td align='right'><span class='rojo'>*</span> UTM Norte:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtutm_norte' value='<?php print($lcUtm_norte);?>' id='txtutm_norte' class='validate[required],custom[integer]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> UTM Este:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtutm_este' value='<?php print($lcUtm_este);?>' id='txtutm_este' class='validate[required],custom[integer]'/></td>
			<td align='right'><span class='rojo'>*</span> Superficie Total:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_total' value='<?php print($lcSuperficie_total);?>' id='txtsuperficie_total' class='validate[required],custom[integer]'/></td>
		</tr>
		<tr>
			<td align='right'><span class='rojo'>*</span> Superficie Aprovechable:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechable' value='<?php print($lcSuperficie_aprovechable);?>' id='txtsuperficie_aprovechable' class='validate[required],custom[integer]'/></td>
			<td align='right'><span class='rojo'>*</span> Superficie Aprovechada:</td>
			<td><input type='text' disabled='disabled' maxlength='' name='txtsuperficie_aprovechada' value='<?php print($lcSuperficie_aprovechada);?>' id='txtsuperficie_aprovechada' class='validate[required],custom[integer]'/></td>
		</tr>
		<input type='hidden' name='txtoperacion' value='des'>
		<input type='hidden' name='txtvar_tem' value='<?php print($lcId); ?>'>
	</table>
	</div>
	<div class="cont_frame" style="width: 96%;">
	<h1>Producciones de la Unidad</h1>
		<div id="tabs" style="font-size: 14px;">
			  <ul>
			    <li><a href="#tabs-1">Vegetal</a></li>
			    <li><a href="#tabs-2">Pecuaria</a></li>
			    <li><a href="#tabs-3">Porcino / Cunicula</a></li>
			    <li><a href="#tabs-4">Avicola</a></li>
			    <li><a href="#tabs-5">Apicola</a></li>
			    <!--<li><a href="#tabs-6">Pesquera / Aquicola</a></li>-->
			  </ul>
			  <div id="tabs-1">
			    <table class="datos" id="load_detail_vegetal" width="100%" align="center">
			    	<tr>
			    		<td>Ano</td>
			    		<td>Ciclo</td>
			    		<td>Rubro</td>
			    		<td>Superficie</td>
			    		<td>Superficie Cosecha</td>
			    		<td>Rendimiento</td>
			    	</tr>
			    	<tr>
			    		<td><input type="text" size="4" id="ano"></td>
			    		<td><select id='ciclo'>
			    			<option>-</option>
			    			<?php print $objFunciones->crear_combo("tciclo","id","nombre",null); ?>
			    		</select></td>
			    		<td><select id='rubro'>
			    			<option>-</option>
			    			<?php print $objFunciones->crear_combo("trubro","id","nombre",null); ?>
			    		</select></td>
			    		<td><input type="text" size="4" id="superficie"></td>
			    		<td><input type="text" size="4" id="scosechada"></td>
			    		<td><input type="text" size="4" id="rendimiento"></td>
			    	</tr>
			    	<tr>
			    		<td>Produccion Total</td>
			    		<td>Fuente de Agua</td>
			    		<td>Metodo de Riego</td>
			    		<td>Superficie Bajo Riego</td>
			    		<td>Superficie Regada</td>
			    		<td>Tipo de Ambiente</td>
			    	</tr>
			    	<tr>
			    		<td><input type="text" size="4" id="produccion"></td>
			    		<td><select id='fuente_agua'>
			    			<option>-</option>
			    			<?php print $objFunciones->crear_combo("tfuente_agua","id","nombre",null); ?>
			    		</select></td>
			    		<td><select id='metodo_riego'>
			    			<option>-</option>
			    			<?php print $objFunciones->crear_combo("tmetodo_riego","id","nombre",null); ?>
			    		</select></td>
			    		<td><input type="text" size="4" id="sbajoriego"></td>
			    		<td><input type="text" size="4" id="sregada"></td>
			    		<td><select id='tipo_ambiente'>
			    			<option>-</option>
			    			<option value="1">Casa de Cultivo</option>
			    			<option value="2">Cielo Abierto</option>
			    		</select>
			    		<button type="button" onclick="add_vegetal();">+</button>
			    		</td>
			    	</tr>
			    	<?php print $cad_vegetal; ?>
			    </table>
			  </div>
			  <div id="tabs-2">
			    <table class="datos" id="load_detail_pecuaria" width="100%" align="center">
			    	<tr>
			    		<td>Sistema Produccion</td>
			    		<td>Rubro</td>
			    		<td>Nro. Cbzas Machos</td>
			    		<td>Nro. Cbzas Hembras</td>
			    		<td>Tipo Orde&ntilde;eo</td>
			    	</tr>
			    	<tr>
			    		<td><select id='sistema_produccion'>
			    			<option>-</option>
			    			<?php print $objFunciones->crear_combo("tsistema_produccion","id","nombre",null); ?>
			    		</select></td>
			    		<td><select id='rubro_pecuaria'>
			    			<option>-</option>
			    			<?php print $objFunciones->crear_combo("trubro","id","nombre",null); ?>
			    		</select></td>
			    		<td><input type="text" size="4" id="nrocabmacho"></td>
			    		<td><input type="text" size="4" id="nrocabhembra"></td>
			    		<td>
			    			<select id='tipo_ordeneo'>
			    				<option>-</option>
			    				<option value="1">Mecanico</option>
			    				<option value="2">Manual</option>
			    			</select>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td>Modo Orde&ntilde;eo</td>
			    		<td>Cant. Anim. Orde&ntilde;eo</td>
			    		<td>Cant. Leche(Lts/Dia)</td>
			    		<td>Cant. Beneficios(Cabezas)</td>
			    		<td>-</td>
			    	</tr>
			    	<tr>
			    		<td>
			    			<select id='modo_ordeneo'>
			    				<option>-</option>
			    				<option value="1">Con Cria</option>
			    				<option value="2">Sin Cria</option>
			    			</select>
			    		</td>
			    		<td><input type="text" size="4" id="cant_anim_ordeneo"></td>
			    		<td><input type="text" size="4" id="cant_leche"></td>
			    		<td><input type="text" size="4" id="cant_beneficio"></td>
			    		<td><button type="button" onclick="add_pecuaria();">+</button></td>
			    	</tr>
			    </table>
			  </div>
			  <div id="tabs-3">
			    <table class="datos" id="load_detail_porcino_cunicula" width="100%" align="center">
			    	<tr>
			    		<td>Grupo</td>
			    		<td>Rubro</td>
			    		<td>Cantidad</td>
			    		<td>-</td>
			    	</tr>
			    	<tr>
			    		<td>
			    			<select id='grupo'>
			    				<option>-</option>
			    				<?php print $objFunciones->crear_combo("tgrupo_rubro","id","nombre",null); ?>
			    			</select>
			    		</td>
			    		<td>
			    			<select id='rubro_porcino_cunicula'>
			    				<option>-</option>
			    				<?php print $objFunciones->crear_combo("trubro","id","nombre",null); ?>
			    			</select>
			    		</td>
			    		<td><input type="text" size="4" id="cantidad_porcino_cunicula"></td>
			    		<td><button type="button" onclick="add_porcino_cunicula();">+</button></td>
			    	</tr>
			    </table>
			  </div>
			  <div id="tabs-4">
			    <table class="datos" id="load_detail_avicola" width="100%" align="center">
			    	<tr>
			    		<td>Especie</td>
			    		<td>Rubro</td>
			    		<td>Total. Aves en Prduccion</td>
			    		<td>Produccion Mensual</td>
			    		<td>Unidad de Medida</td>
			    		<td>-</td>
			    	</tr>
			    	<tr>
			    		<td>
			    			<select id='especie'>
			    				<option>-</option>
			    				<?php print $objFunciones->crear_combo("tespecie_ave","id","nombre",null); ?>
			    			</select>
			    		</td>
			    		<td>
			    			<select id='rubro_especie_ave'>
			    				<option>-</option>
			    				<?php print $objFunciones->crear_combo("trubro","id","nombre",null); ?>
			    			</select>
			    		</td>
			    		<td><input type="text" size="4" id="cant_aves_produccion"></td>
			    		<td><input type="text" size="4" id="produccion_mensual"></td>
			    		<td>
			    			<select id='unidad_medida'>
			    				<option>-</option>
			    				<?php print $objFunciones->crear_combo("tunidad_medida","id","nombre",null); ?>
			    			</select>
			    		</td>
			    		<td><button type="button" onclick="add_avicola();">+</button></td>
			    	</tr>
			    </table>
			  </div>
			  <div id="tabs-5">
			    <table class="datos" id="load_detail_apicola" width="100%" align="center">
			    	<tr>
			    		<td>Tipo Colmena</td>
			    		<td>Cant. Colmenas</td>
			    		<td>Rubro</td>
			    		<td>Produccion Mensual</td>
			    		<td>Unidad de Medida</td>
			    		<td>-</td>
			    	</tr>
			    	<tr>
			    		<td>
			    			<select id='tipo_colmena'>
			    				<option>-</option>
			    				<option value="1">Modernas</option>
			    				<option value="2">Rusticas</option>
			    			</select>
			    		</td>
			    		<td><input type="text" size="4" id="cant_colmenas"></td>
			    		<td>
			    			<select id='rubro_apicola'>
			    				<option>-</option>
			    				<?php print $objFunciones->crear_combo("trubro","id","nombre",null); ?>
			    			</select>
			    		</td>
			    		<td><input type="text" size="4" id="produccion_mensual_apicola"></td>
			    		<td>
			    			<select id='unidad_medida_apicola'>
			    				<option>-</option>
			    				<?php print $objFunciones->crear_combo("tunidad_medida","id","nombre",null); ?>
			    			</select>
			    		</td>
			    		<td><button type="button" onclick="add_apicola();">+</button></td>
			    	</tr>
			    </table>
			  </div>
			  <!--<div id="tabs-6">
			    
			  </div>-->
		</div>
	<?php $objFunciones->botonera_general('Tunidad_produccion','total',$id); ?>
</div>
</form>
<!--
	Codigo
	Despues del
	Formulario
	despues_form.php
-->
<?php @include('despues_form.php'); ?>
  <script>
  $(document).ready(function(){
  	 $( "#tabs" ).tabs();
  });
   	

  function add_vegetal(){

  	//Linea 1
  	var ano = get("ano").value;

  	var ciclo = get("ciclo").value;
  	var ciclodes = get("ciclo").options[get("ciclo").selectedIndex].text;

  	var rubro = get("rubro").value;
  	var rubrodes = get("rubro").options[get("rubro").selectedIndex].text;

  	var superficie = get("superficie").value;
  	var superficie_cosecha = get("scosechada").value;
  	var rendimiento = get("rendimiento").value;

  	//Linea 2

  	var produccion = get("produccion").value;

  	var fuente_agua = get("fuente_agua").value;
  	var fuente_aguades = get("fuente_agua").options[get("fuente_agua").selectedIndex].text;

  	var metodo_riego = get("metodo_riego").value;
  	var metodo_riegodes = get("metodo_riego").options[get("metodo_riego").selectedIndex].text;

  	var sbajoriego = get("sbajoriego").value;
  	var sregada = get("sregada").value;

  	var tipo_ambiente = get("tipo_ambiente").value;
  	var tipo_ambientedes = get("tipo_ambiente").options[get("tipo_ambiente").selectedIndex].text;

  	var cad = "";
  		cad += "<tbody>";
	  		cad += "<tr>";
	  			cad += "<td>"+ano+"<input type='hidden' name='anos[]' value='"+ano+"'/></td>";
	  			cad += "<td>"+ciclodes+"<input type='hidden' name='ciclos[]' value='"+ciclo+"'/>";
	  			cad += "<td>"+rubrodes+"<input type='hidden' name='rubros[]' value='"+rubro+"'/></td>";
	  			cad += "<td>"+superficie+"<input type='hidden' name='superficies[]' value='"+superficie+"'/></td>";
	  			cad += "<td>"+superficie_cosecha+"<input type='hidden' name='superficie_cosechas[]' value='"+superficie_cosecha+"'/></td>";
	  			cad += "<td>"+rendimiento+"<input type='hidden' name='rendimientos[]' value='"+rendimiento+"'/></td>";
	  		cad += "</tr>";

	  		cad += "<tr>";
	  			cad += "<td>"+produccion+"<input type='hidden' name='producciones[]' value='"+produccion+"'/></td>";
	  			cad += "<td>"+fuente_aguades+"<input type='hidden' name='fuente_aguas[]' value='"+fuente_agua+"'/></td>";
	  			cad += "<td>"+metodo_riegodes+"<input type='hidden' name='metodo_riegos[]' value='"+metodo_riego+"'/></td>";
	  			cad += "<td>"+sbajoriego+"<input type='hidden' name='sbajoriegos[]' value='"+sbajoriego+"'/></td>";
	  			cad += "<td>"+sregada+"<input type='hidden' name='sregadas[]' value='"+sregada+"'/></td>";
	  			cad += "<td>"+tipo_ambientedes+"<input type='hidden' name='tipo_ambientes[]' value='"+tipo_ambiente+"'/><button type='button' onclick='delete_detail(this)'>X</button></td>";
	  		cad += "</tr>";
	  	cad += "</tbody>";

  	get("load_detail_vegetal").innerHTML += cad;

  }



  function add_pecuaria(){

  	//Linea 1
  	var sistema_produccion = get("sistema_produccion").value;
  	var sistema_producciondes = get("sistema_produccion").options[get("sistema_produccion").selectedIndex].text;

  	var rubro = get("rubro_pecuaria").value;
  	var rubrodes = get("rubro_pecuaria").options[get("rubro_pecuaria").selectedIndex].text;

  	var nrocabmacho = get("nrocabmacho").value;
  	var nrocabhembra = get("nrocabhembra").value;

  	var tipo_ordeneo = get("tipo_ordeneo").value;
  	var tipo_ordeneodes = get("tipo_ordeneo").options[get("tipo_ordeneo").selectedIndex].text;

  	//Linea 2

  	var modo_ordeneo = get("modo_ordeneo").value;
  	var modo_ordeneodes = get("modo_ordeneo").options[get("modo_ordeneo").selectedIndex].text;

  	var cant_anim_ordeneo = get("cant_anim_ordeneo").value;
  	var cant_leche = get("cant_leche").value;
  	var cant_beneficio = get("cant_beneficio").value;



  	var cad = "";
  		cad += "<tbody>";
	  		cad += "<tr>";
	  			cad += "<td>"+sistema_producciondes+"<input type='hidden' name='sistema_producciones[]' value='"+sistema_produccion+"'/></td>";
	  			cad += "<td>"+rubrodes+"<input type='hidden' name='rubro_pecuarias[]' value='"+rubro+"'/>";
	  			cad += "<td>"+nrocabmacho+"<input type='hidden' name='nrocabmachos[]' value='"+nrocabmacho+"'/></td>";
	  			cad += "<td>"+nrocabhembra+"<input type='hidden' name='nrocabhembras[]' value='"+nrocabhembra+"'/></td>";
	  			cad += "<td>"+tipo_ordeneodes+"<input type='hidden' name='tipo_ordeneos[]' value='"+tipo_ordeneo+"'/></td>";
	  		cad += "</tr>";

	  		cad += "<tr>";
	  			cad += "<td>"+modo_ordeneodes+"<input type='hidden' name='modo_ordeneos[]' value='"+modo_ordeneo+"'/></td>";
	  			cad += "<td>"+cant_anim_ordeneo+"<input type='hidden' name='cant_anim_ordeneos[]' value='"+cant_anim_ordeneo+"'/></td>";
	  			cad += "<td>"+cant_leche+"<input type='hidden' name='cant_leches[]' value='"+cant_leche+"'/></td>";
	  			cad += "<td>"+cant_beneficio+"<input type='hidden' name='cant_beneficios[]' value='"+cant_beneficio+"'/></td>";
	  			cad += "<td><button type='button' onclick='delete_detail(this)'>X</button></td>";
	  		cad += "</tr>";
	  	cad += "</tbody>";

  	get("load_detail_pecuaria").innerHTML += cad;

  }

  function add_porcino_cunicula(){

  	//Linea 1
  	var grupo = get("grupo").value;
  	var grupodes = get("grupo").options[get("grupo").selectedIndex].text;

  	var rubro = get("rubro_porcino_cunicula").value;
  	var rubrodes = get("rubro_porcino_cunicula").options[get("rubro_porcino_cunicula").selectedIndex].text;

  	var cantidad_porcino_cunicula = get("cantidad_porcino_cunicula").value;


  	var cad = "";
  		cad += "<tbody>";
	  		cad += "<tr>";
	  			cad += "<td>"+grupodes+"<input type='hidden' name='grupos[]' value='"+grupo+"'/></td>";
	  			cad += "<td>"+rubrodes+"<input type='hidden' name='rubro_porcino_cuniculas[]' value='"+rubro+"'/></td>";
	  			cad += "<td>"+cantidad_porcino_cunicula+"<input type='hidden' name='cantidad_porcino_cuniculas[]' value='"+cantidad_porcino_cunicula+"'/></td>";
	  			cad += "<td><button type='button' onclick='delete_detail(this)'>X</button></td>";
	  		cad += "</tr>";
	  	cad += "</tbody>";

  	get("load_detail_porcino_cunicula").innerHTML += cad;

  }

   function add_avicola(){
   
  	//Linea 1
  	var especie = get("especie").value;
  	var especiedes = get("especie").options[get("especie").selectedIndex].text;

  	var rubro = get("rubro_especie_ave") .value;
  	var rubrodes = get("rubro_especie_ave") .options[get("rubro_especie_ave") .selectedIndex].text;

  	var cant_aves_produccion = get("cant_aves_produccion").value;
  	var produccion_mensual = get("produccion_mensual").value;

  	var unidad_medida = get("unidad_medida").value;
  	var unidad_medidades = get("unidad_medida").options[get("unidad_medida").selectedIndex].text;


  	var cad = "";
  		cad += "<tbody>";
	  		cad += "<tr>";
	  			cad += "<td>"+especiedes+"<input type='hidden' name='especies[]' value='"+especie+"'/></td>";
	  			cad += "<td>"+rubrodes+"<input type='hidden' name='rubros_avicolas[]' value='"+rubro+"'/></td>";
	  			cad += "<td>"+cant_aves_produccion+"<input type='hidden' name='cant_aves_producciones[]' value='"+cant_aves_produccion+"'/></td>";
	  			cad += "<td>"+produccion_mensual+"<input type='hidden' name='produccion_mensuales[]' value='"+produccion_mensual+"'/></td>";
	  			cad += "<td>"+unidad_medidades+"<input type='hidden' name='unidad_medidas[]' value='"+unidad_medida+"'/></td>";
	  			cad += "<td><button type='button' onclick='delete_detail(this)'>X</button></td>";
	  		cad += "</tr>";
	  	cad += "</tbody>";

  	get("load_detail_avicola").innerHTML += cad;

  }

   function add_apicola(){
   				    	
   	var tipo_colmena  = get("tipo_colmena").value;
   	var tipo_colmenades = get("tipo_colmena").options[get("tipo_colmena").selectedIndex].text;

	var cant_colmenas = get("cant_colmenas").value;

	var rubro_apicola = get("rubro_apicola").value;
	var rubro_apicolades = get("rubro_apicola").options[get("rubro_apicola").selectedIndex].text;

	var produccion_mensual = get("produccion_mensual_apicola").value;

	var unidad_medida = get("unidad_medida_apicola").value;
	var unidad_medidades = get("unidad_medida_apicola").options[get("unidad_medida_apicola").selectedIndex].text;

  	var cad = "";
  		cad += "<tbody>";
	  		cad += "<tr>";
	  			cad += "<td>"+tipo_colmenades+"<input type='hidden' name='tipo_colmenas[]' value='"+tipo_colmena+"'/></td>";
	  			cad += "<td>"+cant_colmenas+"<input type='hidden' name='cant_colmenas[]' value='"+cant_colmenas+"'/></td>";
	  			cad += "<td>"+rubro_apicolades+"<input type='hidden' name='cant_colmenas[]' value='"+rubro_apicola+"'/></td>";
	  			cad += "<td>"+produccion_mensual+"<input type='hidden' name='produccion_mensuales_apicola[]' value='"+produccion_mensual+"'/></td>";
	  			cad += "<td>"+unidad_medidades+"<input type='hidden' name='unidad_medidades_apicola[]' value='"+unidad_medida+"'/></td>";
	  			cad += "<td><button type='button' onclick='delete_detail(this)'>X</button></td>";
	  		cad += "</tr>";
	  	cad += "</tbody>";

  	get("load_detail_apicola").innerHTML += cad;

  }

  function get(id){
  	var r = document.getElementById(id);
  	return r;
  }

  function delete_detail(e){
  	var td = e.parentNode;
  	var tr = td.parentNode;
  	var tbody = tr.parentNode;
  	var table = tbody.parentNode;

  	table.removeChild(tbody);
  }

  </script>
</body>
</html>