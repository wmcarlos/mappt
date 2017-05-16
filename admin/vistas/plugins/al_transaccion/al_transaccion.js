jQuery(document).ready(function(){
	var tagmask = '';
	function all_tra_centro($alltable){
	   var window_height = $(window).height();
	   var window_width = $(window).width();
	   var div_height = $alltable.height();
	   var div_width = $alltable.width();
	   $alltable.css('margin-top',(window_height/2)-(div_height/2)).css('margin-left',(window_width /2)-(div_width/2) );
	}

	// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
	jQuery(".agregar").on('click', function(){
		//vamos ahacerlo dinamico
		dinamic_id = jQuery(this).parent().parent().parent().parent().attr("id");
		jQuery("#"+dinamic_id+" tbody tr:eq(0)").clone().removeClass('tr_padre').appendTo("#"+dinamic_id+" tbody");
	});



	// Evento que selecciona la fila y la elimina 
	jQuery(document).on("click",".eliminar",function(){
		var parent = jQuery(this).parents().get(0);
		jQuery(parent).remove();
	});
	//esta es otra forma de hacer la transaccion mas elegante	
	jQuery(document).on('click','.button-all-transaccion',function(){
		tagmask = jQuery(this).attr("tagmask");
		$(".mask_Transaccion").remove();
		$('body').append('<div class="mask_Transaccion"></div>');
		$(".mask_Transaccion").fadeIn(500,function(){
			$("#"+tagmask).slideDown(500);
			all_tra_centro($("#"+tagmask));
		});
		//hacemos aparecer nuestra tabla transaccional
	});
	//cerrar la mascara transaccional
	jQuery(document).on('click','.transaccion_mascara caption',function(){
		$("#"+tagmask).slideUp(500,function(){
			$(".mask_Transaccion").fadeOut(500,function(){
				$(".mask_Transaccion").remove();
				tagmask = '';
			});
		});
	});





	//_----------------NOREPEAT FUNCTION_____________--
	function norepeat(object){
		//obtenemos datos
		bigName = object.attr("name");
		m_errors = object.attr("msjerror");
		tmp = object.val();
		cont = 0;
		//obtenemos los names
		check = jQuery(':input[name^="'+bigName+'"]');
		//recorremos los name a ver si no hay repetidos
		for(i = 1; i<check.length;i++) if(check[i].value == tmp && tmp!="") cont++;
		if(cont>=2){
			if(m_errors){
				alert(m_errors);
			}else{
				alert("Repeat");
			}
			object.val("");
		}

	}



	//----------CLASS no repeat------------------------------------------------------------
	jQuery(document).on("blur",".no-repeat",function(){
		norepeat(jQuery(this));
		
	});
	//change select , an element change
	jQuery(document).on("change",".no-repeat",function(){
		norepeat(jQuery(this));
	});
	//------------------------------------------------------------------------------------------------------







	///-----------------FUNCION PARA GENERAR EL DETALLE DE LA SQL-------------------------
	function details_sql_generate(mytable,mytable_sql){
		sql = "INSERT INTO "+mytable_sql+"(";
		tam_col_temp=0;
		//creamos la primera concatenacion la cual es los campos a evaluar
		mytable.find("tr:eq(1) td").each(function(i){
			if(jQuery(this).find(">").attr("colbd")){
				colbd = jQuery(this).find(">").attr("colbd");
				tam_col_temp++;
				if(tam_col_temp==1){
					sql+=colbd;
				}else{
					sql+=","+colbd;
				}
			}
		});
		sql+=")";
		

		mytable.find("tr").each(function(j){
			//este if se debe por que en la transaccion esta la cabecera y la fila a 
			if(j>=2){
				if(j<3){
					sql+="VALUES(";
				}else{
					sql+=",VALUES("
				}
				jQuery(this).find('td').each(function(k){
					if(jQuery(this).find(">").attr("colbd")){
						if(k==0){
							sql+="'"+jQuery(this).find('>').val()+"'";
						}else{
							sql+=",'"+jQuery(this).find('>').val()+"'";
						}
					}
				});
				sql+=")";
				sql+"\n";
			}
		});
		alert(sql);
		//ahora guardaremos los valores

	}


	//------------CLASS NO-REPEAT-COMBINE----
	jQuery(document).on("change",".no-repeat-combine",function(){
		combine_dad = jQuery(this).parent().parent();
		//obtenemos la id de la tabla padre
		mytable = jQuery(this).parent().parent().parent().parent().attr("id");
		mycombine = jQuery(this).attr("combine");
		concat_combine = "";
		concat_combine_temp = "";
		cont_combine = 0;
		//obtendremos la conbinacion del concat para luego hacer la busqueda completa
		combine_dad.find("td").each(function(i){
			if(jQuery(this).find(">").attr("combine") == mycombine){
				concat_combine+=jQuery(this).find(">.no-repeat-combine").val() + jQuery(this).find(">.no-repeat-combine").attr("name"); 
			}
		});


		//haremos el for para sacar la combinacion completa
		//recorremos las filas
		jQuery("table#"+mytable+" ").find("tr").each(function(i){
			//este if se debe por que en la transaccion esta la cabecera y la fila a 
			if(i>=2){
				concat_combine_temp = "";
				//recorremos las columnas
				jQuery(this).find('td').each(function(j){
					if(jQuery(this).find(">").attr("combine") == mycombine){
						concat_combine_temp +=jQuery(this).find(">.no-repeat-combine").val() + jQuery(this).find(">.no-repeat-combine").attr("name"); 
						ult_dom = jQuery(this).find(">.no-repeat-combine");
					}
				});
				//una ves salido de la columna verificamos que la combinacion se cumpla
				if(concat_combine == concat_combine_temp){
					cont_combine++;
			
				}
			}
		});

		//una ves echo el for preguntamos si hay columnas combinadas repetidas
		if(cont_combine >=2){
			alert("repeat combine");
			ult_dom.val("");
		}




		//ahora crearemos una funcion general para  generar el sql detalle de la tabla
		table_sql = jQuery("table#"+mytable);
		if(table_sql.hasClass("table_sql")){
			details_sql_generate(table_sql, table_sql.attr("tdsql"));
		}


	});	
	//------------------------funcion para el repeat combine--------------------------------


	//funcion para abrir la transaccion como popup

});
