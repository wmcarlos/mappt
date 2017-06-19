<!--tablas transaccionles para cada produccion-->
	<!--produccion vegetal-->
	<style type="text/css">
		tr.tr_padre td.eliminar{
			display: none;
		}
		#transaccion_produccion_vegetal tbody tr,#transaccion_produccion_apicola tbody tr,#transaccion_produccion_cunicula tbody tr{
			background-color: #E3ECD8 !important;
		}

		#transaccion_produccion_vegetal tbody tr.tr_padre,	#transaccion_produccion_apicola tbody tr.tr_padre,	#transaccion_produccion_cunicula tbody tr.tr_padre{
			background-color: white !important;
		}
	</style>
	<table id="transaccion_produccion_vegetal"  width="90%" style="background-color: white;" class="transaccion_mascara"  align="center">
		<caption style="background-color: #8CAD5F; color:white;">Produccion Vegetal</caption>
		<!-- Cabecera de la tabla -->
		<thead>
			<tr>
				<th colspan="2" style="background-color: #F3F3F3; padding-top: 5px; padding-bottom: 5px;">
				<span style="float: left; font-size: 20px; margin-top: 10px; margin-left: 10px;">Llenar registro y añadirlo al detalle de producción</span>
				<input type="button" class="agregar" value="+"" style="float:right; margin-right: 20px; border:none; background-color: #8CAD5F; color:white; padding: 10px 15px; font-size: 25px; cursor: pointer;" />
				</th>
			</tr>
		</thead>
		<!-- Cuerpo de la tabla con los campos -->
		<tbody>
			<!-- fila base a tomar en cuenta-->
			<tr class="tr_padre" style="display: block;">
				<td style="padding:10px; border-bottom: 1px solid #ccc;"><!--aqui se crea el formulario-->
				
					<span>
						Ciclo:
						<br>
						<select name="ciclo_vegetal[]" class="select-change"> 
						<option value="">Ciclo</option>
						<?php for($i=0; $i<count($data_ciclos);$i++){ ?> 
							<option value="<?php echo $data_ciclos[$i]['idciclo']; ?>"><?php echo $data_ciclos[$i]['nombre_ciclo']; ?></option>
						<?php }?>
						</select>
					</span>
					<span>
						Año:
						<input type="text" maxlength="4" name="anio_vegetal[]">
					</span>
					<span>
						Grupo Rubro:
						<select class="select_change" operacion="listar_rubros" load_data="rubros">
							<option value=''>Seleccione</option>
							<?php  print $objFunciones->crear_combo("tgrupo_rubro","id","nombre",""); ?>
						</select>
					</span>
					<span>
						Rubro:
						<select name="rubros_vegetal[]" id="rubros" class="select-change">
							<option value=''>Seleccione</option>
						</select>
					</span>
					<span>
						Superficie:
						<input type="text" name="superficie_vegetal[]">
					</span>
					<br>
					<br>
					<span>
						Superficie de cosecha:
						<input type="text" name="superficie_vegetal_cosecha[]">
					</span>
					<span>
						Rendimiento:
						<input type="text" name="rendimiento_vegetal[]">
					</span>
					<span>
						Produccion:
						<input type="text" name="produccion_vegetal[]">
					</span>
					<br>
					<br>
					<span>Riego:
						<input type="text" name="riego_vegetal[]">
					</span>
					<span>
						Superficie Bajo Riego:
						<input type="text" name="superficie_bajoriego_vegetal[]">
					</span>
					<span>
						Superficie Regada:
						<input type="text" name="superficie_regada_vegetal[]">
					</span>
					<br>
					<br>
					<span>
						Tipo de ambiente:
						<input type="text" name="tipo_ambiente_vegetal[]">
					</span>
					<span>
						Fuente de agua:
						<input type="text" name="fuente_agua_vegetal[]">
					</span>
					<span>
						Metodo de riego:
						<input type="text" name="metodo_riego_vegetal[]">
					</span>
					<br>
					<br>
					
				</td>
				<td class="eliminar"><input type="button" value="-"></td>
			</tr>
			<!-- fin de código: fila base --> 
		</tbody>
	</table>
	<!--cierre de la produccion vegetal-->





	<!--- TABLA PARA LA PRODUCCION APICOLA-->
	<table id="transaccion_produccion_apicola"  width="90%" style="background-color: white;" class="transaccion_mascara"  align="center">
		<caption style="background-color: #8CAD5F; color:white;">Produccion Apicola</caption>
		<!-- Cabecera de la tabla -->
		<thead>
			<tr>
				<th colspan="2" style="background-color: #F3F3F3; padding-top: 5px; padding-bottom: 5px;">
				<span style="float: left; font-size: 20px; margin-top: 10px; margin-left: 10px;">Llenar registro y añadirlo al detalle de producción</span>
				<input type="button" class="agregar" value="+"" style="float:right; margin-right: 20px; border:none; background-color: #8CAD5F; color:white; padding: 10px 15px; font-size: 25px; cursor: pointer;" />
				</th>
			</tr>
		</thead>
		<!-- Cuerpo de la tabla con los campos -->
		<tbody>
			<!-- fila base a tomar en cuenta-->
			<tr class="tr_padre" style="display: block;">
				<td style="padding:10px; border-bottom: 1px solid #ccc;"><!--aqui se crea el formulario-->
				
					<span>
						Cantidad
						<input type="text" maxlength="4" name="cantidad_apicola[]">
					</span>
					<span>
						Grupo Rubro:
						<select class="select_change" operacion="listar_rubros" load_data="rubros_apicola">
							<option value=''>Seleccione</option>
							<?php  print $objFunciones->crear_combo("tgrupo_rubro","id","nombre",""); ?>
						</select>
					</span>
					<span>
						Rubro:
						<select name="rubros_apicola[]" id="rubros_apicola" class="select-change">
							<option value=''>Seleccione</option>
						</select>
					</span>
					<span>
						Producción Mensual:
						<input type="text" name="produccion_mensual_apicola[]">
					</span>
					<br>
					<br>
					
					<span>
						Unidad de medida:
						<select name="unidad_medida_apicola[]" class="select-change"> 
						<option value="">Unidad de medida</option>
						<?php for($i=0; $i<count($data_unidad_medida);$i++){ ?> 
							<option value="<?php echo $data_unidad_medida[$i]['idunidad_medida']; ?>"><?php echo $data_unidad_medida[$i]['siglas_unidad_medida']; ?></option>
						<?php }?>
						</select>
					</span>
					<br>
					<br>
					
				</td>
				<td class="eliminar"><input type="button" value="-"></td>
			</tr>
			<!-- fin de código: fila base --> 
		</tbody>
	</table>
	<!--cierre de la produccion apicola-->





	<!---CREANDO TABLA DETALLE PARA PRODUCCION PORCINO CUNICULA-->
		<table id="transaccion_produccion_cunicula"  width="90%" style="background-color: white;" class="transaccion_mascara"  align="center">
		<caption style="background-color: #8CAD5F; color:white;">Produccion Porcino Cunicula</caption>
		<!-- Cabecera de la tabla -->
		<thead>
			<tr>
				<th colspan="2" style="background-color: #F3F3F3; padding-top: 5px; padding-bottom: 5px;">
				<span style="float: left; font-size: 20px; margin-top: 10px; margin-left: 10px;">Llenar registro y añadirlo al detalle de producción</span>
				<input type="button" class="agregar" value="+"" style="float:right; margin-right: 20px; border:none; background-color: #8CAD5F; color:white; padding: 10px 15px; font-size: 25px; cursor: pointer;" />
				</th>
			</tr>
		</thead>
		<!-- Cuerpo de la tabla con los campos -->
		<tbody>
			<!-- fila base a tomar en cuenta-->
			<tr class="tr_padre" style="display: block;">
				<td style="padding:10px; border-bottom: 1px solid #ccc;"><!--aqui se crea el formulario-->
				
					<span>
						Cantidad
						<input type="text" maxlength="4" name="cantidad_cunicula[]">
					</span>
					<span>
						Grupo Rubro:
						<select class="select_change" operacion="listar_rubros" load_data="rubros_cunicula">
							<option value=''>Seleccione</option>
							<?php  print $objFunciones->crear_combo("tgrupo_rubro","id","nombre",""); ?>
						</select>
					</span>
					<span>
						Rubro:
						<select name="rubros_cunicula[]" id="rubros_cunicula" class="select-change">
							<option value=''>Seleccione</option>
						</select>
					</span>
					<br>
					<br>
					
				</td>
				<td class="eliminar"><input type="button" value="-"></td>
			</tr>
			<!-- fin de código: fila base --> 
		</tbody>
	</table>




