<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	FUNCIONES PROPIAS DEL FRAMEWORK .. ns
**/
if(!function_exists('ns_html_mensaje'))
{
	function ns_html_mensaje($id="",$mensaje="", $tipo="info", $parametros=array()){
		$salida="";
		if($mensaje!=""){
			$salida='
			<div id="'.$id.'" name="'.$id.'" class="mensaje mensaje-'.$tipo.'">
				'.$mensaje.'
			</div>';
		}
		return $salida;
	}
}

if( ! function_exists('ns_html_etiqueta'))
{
	function ns_html_etiqueta ($texto="",$for="",$parametros=array())
	{
		//parámetros esperados .. ns
			$clases			="";
			$estilos		="";
			$id 			="";
			$clases_adicionales="";
		//se extraen las variables pasadas por parámetros .. ns
			extract($parametros);
		//se inicializan las variables .. ns
			$html_salida	="";
		//-----------------------------------------

		$html_salida="<label id='$id' name='$id' for='$for' class='$clases $clases_adicionales' style='$estilos'>$texto</label>";
		return $html_salida;
	}
}

if( ! function_exists('ns_html_input'))
{
	function ns_html_input ($tipo_ns_elemento="texto",$id="",$parametros=array())
	{
		//parámetros esperados .. ns
			$valor_inicial	="";
			$clases			="";
			$estilos		="";
			$parametros_html="";
			$clases_adicionales="";
			$texto_inicial="";
			$valor_inicial="";
			$items=array("0"=>"seleccione");
		//se extraen las variables pasadas por parámetros .. ns
			extract($parametros);
		//se inicializan las variables .. ns
			$html_salida	="";
		//-----------------------------------------
		switch ($tipo_ns_elemento) {
			case "texto":
			case "text":
				$html_salida="<input id='$id' name='$id' type='text' class='$clases' style='$estilos' value='$valor_inicial' $parametros_html >";
				break;
			case "contraseña":
			case "clave":
			case "password":
				$html_salida="<input id='$id' name='$id' type='password' class='$clases' style='$estilos' value='$valor_inicial' $parametros_html >";
				break;
			case "fecha":
			case "date":
					$parametros['parametros_html']="placeholder='Día' maxlength='2'";
					$parametros['estilos']='width:30px !important;margin-right:7px;';
				$html_salida =ns_html_input('texto',$id.'_dia',$parametros);
					$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre",);
					$parametros['items']=$meses;
					$parametros['texto_inicial']="Mes ...";
					$parametros['estilos']='width:100px !important;padding:2px;margin-right:7px;';
					$parametros['parametros_html']="placeholder='Mes'";
				$html_salida.=ns_html_input('lista',$id.'_mes',$parametros);
					$parametros['texto_inicial']="";
					$parametros['estilos']='width:45px !important;';
					$parametros['parametros_html']="placeholder='Año' maxlength='4'";
				$html_salida.=ns_html_input('texto',$id.'_ano',$parametros);
				break;
			case "lista":
			case "select":
				$html_salida="<select id='$id' name='$id' class='$clases $clases_adicionales' style='$estilos' $parametros_html >\n";
				if(trim($valor_inicial)===""&&trim($texto_inicial)!=="") $valor_inicial=$texto_inicial;
				$html_salida.="<option value='"
					.(($valor_inicial!=="")?$valor_inicial:"")
					."'>";
				$html_salida.=(($texto_inicial!=="")?$texto_inicial:"");
				$html_salida.="</option>\n";
				foreach($items as $valor=>$texto){
					if(trim($valor)===""&&$texto=="") $valor=$texto;
					$html_salida.="\t<option value='$valor'>";
					$html_salida.=$texto;
					$html_salida.="</option>\n";
				}
				$html_salida.="</select>";
				break;
			case "opcionmultiple":
				$parametros['clases']="";
				$html_salida="<div>\n";
				foreach($items as $valor=>$texto){
					if(trim($valor)==="") $valor=$texto;
					$html_salida.="<label style='vertical-align:top;white-space:nowrap;'>"
								 ."<input id='$id' name='$id' type='radio' value='$valor' style='margin:0px;margin-right:5px;'>";
					$parametros['estilos']='padding:0;vertical-align:top;margin-right: 7px;';
					$html_salida.=ns_html_etiqueta($texto,'',$parametros).'</label>';
				}
				$html_salida.="</div>";
				break;
			case "archivo":
			case "file":
			case "subirarchivo":
			case "subir_archivo":
				$html_salida="<input id='$id' name='$id' type='file' class='$clases' style='$estilos' $parametros_html >";
				break;
			case "imagen":
			case "image":
			case "img":
				$html_salida="<img src='$url_imagen' id='$id' name='$id' class='$clases' style='$estilos' $parametros_html >";
				break;
			case "texto_largo":
			case "memo":
			case "textolargo":
			case "textarea":
				$html_salida="<textarea id='$id' name='$id' type='password' class='$clases' style='$estilos' $parametros_html >$valor_inicial</textarea>";
				break;
			case "texto_enriquecido":
			case "editor_html":
			case "texto_wysiwyg":
			case "wysiwyg":
				//requiere!!! $html_includes = '<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>';
				$html_salida   = "<script>tinymce.init({selector:'#$id'});</script>";
				$html_salida  .= "<textarea id='$id' name='$id' type='password' class='$clases' style='$estilos' $parametros_html >$valor_inicial</textarea>";
				break;
			case "buleano":
			case "boolean":
			case "checkbox":
				$html_salida="<input id='$id' name='$id' type='checkbox' class='$clases' style='$estilos' value='$valor_inicial' $parametros_html >";
				break;
			case "oculto":
			case "escondido":
			case "hidden":
				$html_salida="<input id='$id' name='$id' type='hidden' class='$clases' style='$estilos' value='$valor_inicial' $parametros_html >";
				break;
			default:
				$clases="";
				$html_salida="<input id='$id' name='$id' type='$tipo_ns_elemento' class='$clases' style='$estilos' $parametros_html>";
				break;
		}
		return $html_salida."";
	}
}

/**
	INICIO ns_generar_formulario 
**/

if( ! function_exists('ns_generar_formulario'))
{
	function ns_generar_formulario($id="", $tabla="", $parametros=array())
	{
		$html_salida  ="";
		$html_ocultos ="";
		//parametros esperados .. ns
		$crear_formulario                       =array(true,'',array());
		$formulario_onsubmit					="";
		$mostrar_titulo                         =array(true,'');
		$mostrar_etiquetas                      =true;
		$mostrar_placeholders                   =false;
		$mostrar_dospuntos                      =true;
		$metadata_extendida                     =false;
		$target									="_self";
		$metodo                                 ="POST";
		$etiquetas                              =array();
		$posicion_etiquetas                     ="izquierda";
		$posicion_tooltips                      ="abajo-etiqueta";
		$posicion_msj_validacion                ="abajo-etiqueta";
		$posicion_requerido                     ="derecha-campo";
		$etiquetas_clases_adicionales           ="";
		$campos_clases_adicionales              ="";
		$tooltips_clases_adicionales            ="";
		$mensajes_validacion_clases_adicionales ="";
		$tabla_origen							=$tabla;
		$tabla_destino							=$tabla_origen;
		$mostrar_botones                        =array(true,false); // arriba, abajo .. ns
		$botones								=array(
													'b_primero'   =>array('registro_primero'),
													'b_anterior'  =>array('registro_anterior'),
													's1'          =>array('separador_h'),
													'b_enviar'    =>array('submit',array('Enviar')),
													'b_cancelar'  =>array('reset',array('Cancelar')),
													's2'          =>array('separador_h'),
													'b_siguiente' =>array('registro_siguiente'),
													'b_ultimo'    =>array('registro_ultimo')
												);
		//se extraen los parametros .. ns
		extract($parametros);
		//se reinicializa $parametros .. para cada usarlo con cada campo !! ... ns
		$parametros=array();
		//----------------------------------
		//se exrae la informacion de los CAMPOS que daran origen al formulario !!!!!! ... ns
		/* *************************************************************** */
		if($metadata_extendida===true) {
			//con datos adicionales ... ns
			$info_datos=ns_extraer_info_tabla_ext($tabla_origen);
		} else {
			//con datos básicos .. ns
			$info_datos=ns_extraer_info_tabla($tabla_origen); 
		}
		/* *************************************************************** */
		//se verifica que los campos obtenidos sean válidos ... ns
		if( ! isset($info_datos['campos']) OR count($info_datos['campos'])==0 ) {
			//no se han recibido campos o la tabla no existe o no tiene campos identificables! .. ns
			$mensaje="Err!: campos inválidos para $tabla_origen"; 
			$html_salida.=ns_html_mensaje('',$mensaje);
		} else {
			$parametros_html="target='$target' method='$metodo' ";
			if($crear_formulario[0]===true){
				$id              =(isset($crear_formulario[1])&&trim($crear_formulario[1])!="")?$crear_formulario[1]:$id;
				$parametros_html =(isset($crear_formulario[2]['parametros_html']))?$crear_formulario[2]['parametros_html']:$parametros_html;
				$html_salida    .="<form onsubmit='$formulario_onsubmit' class='ns_formulario' id='$id' name='$id' $parametros_html >\n";
			} else {
				$html_salida    .="<div class='ns_formulario'>\n";
			}
			//campos ocultos necesarios para luego realizar accions CRUD! ... ns NUGE
			$html_ocultos.=ns_html_input('oculto','tabla_origen',array('valor_inicial'=>$tabla_origen))."\n";
			$html_ocultos.=ns_html_input('oculto','tabla_destino',array('valor_inicial'=>$tabla_destino))."\n";
			//se inicia la tabla para la distribución de los campos y etiquetas ... ns
			$html_salida.="<table>\n";
			//se verifica el parametro para mostrar titulo del formulario .. nsx
			if($mostrar_titulo[0]===true) {
				$titulo=(trim($mostrar_titulo[1])==="")?$tabla:$mostrar_titulo[1];
				$html_salida.="<tr><th colspan='2' class='titulo'>$titulo<hr></th></tr>\n";
			}
			//se incorporan los botones de CRUD! arriba .. ns
			if($mostrar_botones[0] OR $mostrar_botones[1]){
				$tipos_botones_validos=array(
					//revisar para optimizar ... ns
					"submit",
					"reset",
					"button",
					"separador_v",
					"separador_h",
					"registro_primero",
					"registro_anterior",
					"registro_siguiente",
					"registro_ultimo",
				);
			}
			if($mostrar_botones[0]===true){
				//revisar para optimizar ... ns
				$html_salida.="<tr><td class='area-botones' colspan='2'>";
				if(isset($botones)){
					//revisar para optimizar ... ns
					foreach($botones as $id_boton => $parametros){
						$tipo_boton=(isset($parametros[0]))?$parametros[0]:"";
						if(array_search($tipo_boton,$tipos_botones_validos)===FALSE){
							$tipo_boton="button";
						}
						$html_salida.=ns_contenido_boton_aux($tipo_boton,$id_boton,$parametros);
					}
				}
				$html_salida.="<hr></td></tr>\n";
			}
			//se reordenan los campos usando las etiquetas provistas si las hay! .. ns
			$info_datos_reordenados = ns_reordenar_campos_segun_array($info_datos['campos'],$etiquetas);
			$info_datos['campos']=$info_datos_reordenados;

			// inicio del FOR que recorre TODOS los campos de la tabla para generar el formulario .. ns
			/* ********************************************************************************* */
			foreach($info_datos['campos'] as $campo => $info){
				$info=( ! is_array($info))?(array) $info:$info;
				//se extraen in asignan los valores de tipo y características de cada campo! .. ns
				if($metadata_extendida===true) {
					$id_campo	=$info['column_name'];
					$tipo_campo	=$info['udt_name'];
					$tipo_campo_ext	=$info['data_type'];
					$ancho_max	=$info['character_maximum_length'];
					$por_defecto=$info['column_default'];
					$es_requerido=$info['is_nullable'];
					$es_editable=$info['is_updatable'];
				} else {
					$id_campo	=$info['name'];
					$tipo_campo	=$info['type'];
					$ancho_max	=$info['max_length'];
					$por_defecto=$info['default'];
				}
				//parametros adicionales de configuracion para cada campo leido ... ns
				$info_config="";
				if(isset($config_campos[$id_campo])){
					//$config_campos => parametros adicionales de configuracion para cada campo leido ... ns
					// id_campo = id del campo objetivo .. ns
					//[0] = tipo de campo que se redefine ... ns
					$tipo_input	=$config_campos[$id_campo][0]; 
					//parametros adicionales de configuracion para cada campo leido ... ns
					if(isset($config_campos[$id_campo][1])){
						//detalles de campos para el select, el de value y el del texto .. ns
						$info_config=$config_campos[$id_campo][1];
					}
					//se redefine el tipo .. ns
					$tipo_campo=$tipo_input;
				}
				if($tipo_campo!="oculto" && $tipo_campo!="hidden"){
					//se crea el tr con la etiqueta y campo solo si el campo no es de tipo oculto o hidden !! ... ns
					$html_salida.='<tr>';
					if($mostrar_etiquetas===true && $posicion_etiquetas!="arriba"){
						if( ! isset($etiquetas[$id_campo]) OR trim($etiquetas[$id_campo])===""){
							$etiquetas[$id_campo]=$id_campo;
						}
						//se genera el html de la etiqueta asociada al campo ... ns
						$html_salida.="<td class='celda-etiqueta $etiquetas_clases_adicionales'>";
						$html_salida.=ns_html_etiqueta($etiquetas[$id_campo].(($mostrar_dospuntos===true)?":&nbsp;":""),$id_campo,array('clases_adicionales'=>$etiquetas_clases_adicionales));
						//informacion de tooltip y mensaje d validacion .. ns
						if(isset($tooltips[$id_campo])&&$tooltips[$id_campo]!==""&&$posicion_tooltips=="abajo-etiqueta"){
							$html_salida.="<br><div class='campo_tooltip $tooltips_clases_adicionales'>".$tooltips[$id_campo]."</div>\n";
						}
						if(isset($mensajes_validacion[$id_campo])&&$mensajes_validacion[$id_campo]!==""&&$posicion_msj_validacion=="abajo-etiqueta"){
							$html_salida.="<div class='mensaje_validacion $mensajes_validacion_clases_adicionales'>".$mensajes_validacion[$id_campo]."</div>\n";
						}
						$html_salida.="</td>";
						// se abre el td para los campos .. ns
						$html_salida.="<td class='celda-campo $campos_clases_adicionales'>";
					} else {
						//celda campo en caso de no mosrar etiqueta o mostrarla encima del campo .. ns
						$html_salida.="<td colspan='2' class='celda-campo $campos_clases_adicionales'>"; // el td de los campos abarca las dos columnas .. ns
						if($mostrar_etiquetas===true && $posicion_etiquetas=="arriba") {
							$html_salida.=ns_html_etiqueta($etiquetas[$id_campo],$id_campo,array('clases_adicionales'=>$etiquetas_clases_adicionales));
							$html_salida.='<br>';
							//informacion de tooltip y mensaje d validacion para etiquetas sobre el campo.. ns
							if(isset($tooltips[$id_campo])&&$tooltips[$id_campo]!==""&&$posicion_tooltips=="abajo-etiqueta"){
								$html_salida.="<div class='campo_tooltip $tooltips_clases_adicionales'>".$tooltips[$id_campo]."</div>\n";
							}
							if(isset($mensajes_validacion[$id_campo])&&$mensajes_validacion[$id_campo]!==""&&$posicion_msj_validacion=="abajo-etiqueta"){
								$html_salida.="<div class='mensaje_validacion $mensajes_validacion_clases_adicionales'>".$mensajes_validacion[$id_campo]."</div>\n";
							}
						}
					}
					//parametros html .. para cada campo ns_html_input!! ... ns
					$parametros['parametros_html']="";
					//metadata extendida se refiere a la info de CADA CAMPO de la tabla .. ns
					if($metadata_extendida===true && $ancho_max>0){
						$parametros['es_requerido']	=true; // revisar ??? .. ns
					}
					if($mostrar_placeholders===true){
						//se usa el valor de titulo de etiqueta para el placeholder .. ns
						$parametros['parametros_html'].=" placeholder='".$etiquetas[$id_campo]."'";
					}
					//estilo por defecto del campo .. text, password, select, textarea, etc ... ns
					$parametros['clases'] =' ns_campo_formulario '; // estilo por defecto de lso inputs de captura .. ns
					$parametros['clases'].=$campos_clases_adicionales;
				} //fin de si tipo_input == oculto! .. ns
				//se evalua el $tipo_campo ya sea que viene directo de la tabla o fue redefinido por parametros ... ns
				switch ($tipo_campo){
					//tipos de datos asociados a fecha enteros en postgresql .. ns
					case "date":
					case "datetime":
					case "fecha":
						$html_salida.=ns_html_input('fecha',$id_campo,$parametros);
						break;
					//tipos de datos asociados a números enteros en postgresql .. ns
					case "int":
					case "int2":
					case "int4":
					case "int8":
					case "integer":
					case "bigint":
					case "smallint":
					case "entero":
						$html_salida.=ns_html_input('texto',$id_campo,$parametros);
						break;
					//tipos de datos asociados a números decimales en postgresql .. ns
					case "double precision":
					case "float":
					case "float16":
					case "float8":
					case "float4":
					case "money":
					case "numeric":
					case "numerico":
						$html_salida.=ns_html_input('texto',$id_campo,$parametros);
						break;
					//tipos de datos asociados a textos largos / memo en postgresql .. ns
					case "text":
					case "memo":
					case "texto_largo":
						$html_salida.=ns_html_input('memo',$id_campo,$parametros);
						break;
					//tipos de datos asociados a valores booleanos (V,F|t,f) en postgresql .. ns
					case "bool":
					case "boolean":
					case "buleano":
						$html_salida.=ns_html_input('buleano',$id_campo,$parametros);
						break;
					/** personalizados ------------------------------------------ **/
					//tipos de datos PERSONALIZADOS que dependen de $config_campos!!!.. ns
					case "lista":
					case "select":
						if($info_config!==""){
							$parametros_lista=array('campo_lista_valor'=>$info_config[1],'campo_lista_texto'=>$info_config[2],'orden_salida'=>$info_config[2]);
							$tabla=$info_config[0];
							$rs=ns_valores_lista_segun_tabla($tabla,$parametros_lista);
							//$rs  devuelve $rs['datos'] y $rs['campos'] ... ns
							$parametros['items']=array();
							//sólo en este caso .. los DATOs se refieren a los CAMPOS de salida para el <select>... ns
							foreach ($rs['datos'] as $id=>$campos){
								$campos=(array) $campos;
								$parametros['items'][$campos[$info_config[1]]]=$campos[$info_config[2]];
							}
						} else {
							$parametros['items']=array('0'=>'seleccione');
						}
						$html_salida.=ns_html_input('lista',$id_campo,$parametros);
						break;
					case "opcionmultiple":
					case "radio":
					case "radiobuttons":
						if($info_config!==""){
							$parametros_lista=array('campo_lista_valor'=>$info_config[1],'campo_lista_texto'=>$info_config[2],'orden_salida'=>$info_config[2]);
							$tabla=$info_config[0];
							$rs=ns_valores_lista_segun_tabla($tabla,$parametros_lista);
							//$rs  devuelve $rs['datos'] y $rs['campos'] ... ns
							$parametros['items']=array();
							//sólo en este caso .. los DATOs se refieren a los CAMPOS de salida para el <select>... ns
							foreach ($rs['datos'] as $id=>$campos){
								$campos=(array) $campos;
								$parametros['items'][$campos[$info_config[1]]]=$campos[$info_config[2]];
							}
						} else {
							$parametros['items']=array('0'=>'seleccione');
						}
						$html_salida.=ns_html_input('opcionmultiple',$id_campo,$parametros);
						break;
					case "archivo":
					case "file":
					case "upload":
						$html_salida.=ns_html_input('archivo',$id_campo,$parametros);
						break;
					case "imagen":
					case "image":
					 	// se elimina clase ns_input .. ns
						$parametros['clases'] =' ns_imagen_formulario ';
						$parametros['clases'].=$campos_clases_adicionales;
						$parametros['url_imagen']=$info_config[0];
						$html_salida.=ns_html_input('imagen',$id_campo.'_img',$parametros);
						$html_salida.=ns_html_input('oculto',$id_campo,array('valor_inicial'=>$parametros['url_imagen']));
						break;
					case "oculto":
					case "hidden":
						$parametros['clases']="";
						$html_ocultos.=ns_html_input('oculto',$id_campo,$parametros)."\n";
						break;
					/** --------------------------------------------------------- **/
					//tipos de datos asociados a caracteres ó varchar en postgresql .. ns
					//si no se entiende el tipo, se asume texto por defecto .. ns

					case "texto_enriquecido":
					case "editor_html":
					case "texto_wysiwyg":
					case "wysiwyg":
						$html_salida.=ns_html_input('wysiwyg',$id_campo,$parametros);
						break;
					case "bpchar":
					case "char":
					case "varchar":
					case "character":
					case "character varying":
					case "texto":
					//demás tipos por defecto serán considerados texto ... nns
					default:
						//se fija el límite de caracteres si éste es válido ... ns
						if($ancho_max>0) $parametros['parametros_html'].=" maxlength='$ancho_max'";
						//se invoca ns_html_input ... ns
						$html_salida.=ns_html_input('texto',$id_campo,$parametros);
						break;
				}
				//se cierra el tr solo si no es un campo de tipo oculto! ... ns
				if($tipo_campo!="oculto" && $tipo_campo!="hidden"){
					//informacion de tooltip y mensaje d validacion .. ns
					if(isset($tooltips[$id_campo])&&$tooltips[$id_campo]!==""&&$posicion_tooltips=="abajo-campo"){
						$html_salida.="<div class='campo_tooltip $tooltips_clases_adicionales'>".$tooltips[$id_campo]."</div>\n";
					}
					if(isset($mensajes_validacion[$id_campo])&&$mensajes_validacion[$id_campo]!==""&&$posicion_msj_validacion=="abajo-campo"){
						$html_salida.="<div class='mensaje_validacion $mensajes_validacion_clases_adicionales'>".$mensajes_validacion[$id_campo]."</div>\n";
					}
					$html_salida.="</tr>\n";
				}
			} 
			// fin del for que recorre TODOS los campos suministrados
			/* ****************************************************************** */

			//se incorporan los botones de CRUD! .. ns
			if($mostrar_botones[1]===true){
				//revisar para optimizar ... ns
				$html_salida.="<tr><td class='area-botones' colspan='2'><br>";
				if(isset($botones)){
					//revisar para optimizar ... ns
					foreach($botones as $id_boton => $parametros){
						$tipo_boton=(isset($parametros[0]))?$parametros[0]:"";
						if(array_search($tipo_boton,$tipos_botones_validos)===FALSE){
							$tipo_boton="button";
						}
						$html_salida.=ns_contenido_boton_aux($tipo_boton,$id_boton,$parametros);
					}
				}
				$html_salida.="</td></tr>\n";
			}
			$html_salida.="</table>\n";
			//se verifica que se cree el formulario para poder cerrarlo ... ns
			$html_salida.=$html_ocultos;
			if($crear_formulario[0]===true){
				$html_salida.="</form>\n";
			} else {
				$html_salida.="</div>\n";
			}
		}
		return $html_salida;
	}
}

/**
	FIN ns_generar_formulario 
**/

if( ! function_exists('ns_contenido_boton_aux'))
{
	function ns_contenido_boton_aux($tipo_boton,$id_boton,$parametros)
	{
		$html_salida="";
		switch ($tipo_boton) {
			case "registro_primero":
				$texto_boton="&lt;&lt;";
				$accion_click_boton="";
				$tipo_boton="button";
				$html_salida.=ns_html_input($tipo_boton,$id_boton,array('parametros_html'=>"value='".$texto_boton."' onclick='".$accion_click_boton."' title='Primero'"));
				break;
			case "registro_anterior":
				$texto_boton="&lt;";
				$accion_click_boton="";
				$tipo_boton="button";
				$html_salida.=ns_html_input($tipo_boton,$id_boton,array('parametros_html'=>"value='".$texto_boton."' onclick='".$accion_click_boton."' title='Anterior'"));
				break;
			case "registro_siguiente":
				$texto_boton="&gt;";
				$accion_click_boton="";
				$tipo_boton="button";
				$html_salida.=ns_html_input($tipo_boton,$id_boton,array('parametros_html'=>"value='".$texto_boton."' onclick='".$accion_click_boton."' title='Siguiente'"));
				break;
			case "registro_ultimo":
				$texto_boton="&gt;&gt;";
				$accion_click_boton="";
				$tipo_boton="button";
				$html_salida.=ns_html_input($tipo_boton,$id_boton,array('parametros_html'=>"value='".$texto_boton."' onclick='".$accion_click_boton."' title='Último'"));
				break;
			case "separador_h":
				$html_salida.="&nbsp;&nbsp;&nbsp;";
				break;
			case "separador_v":
				$html_salida.="<br><br>";
				break;
			default:
				$texto_boton=(isset($parametros[1][0]))?$parametros[1][0]:$id_boton;
				$accion_click_boton=(isset($parametros[1][1]))?" onclick='".$parametros[1][1]."' ":"";
				$html_salida.=ns_html_input($tipo_boton,$id_boton,array('parametros_html'=>"value='".$texto_boton."' $accion_click_boton" ));
				break;
		}
		return $html_salida;
	}
}

if( ! function_exists('ns_extraer_info_tabla'))
{
	function ns_extraer_info_tabla($tabla="",$parametros=array())
	{
		//se instancia la clase Controller para poder extraer datos de la bd .. ns!
		$CI = & get_instance();
		//se inicializan variables .. ns
        $data_salida=array();
        //se extrae la informacion sobre los campos de la tabla .. ns
        if( ! table_exists($tabla)){
			$data_salida['campos']	=array();
        } else {
			$campos_arr            =$CI->db->field_data($tabla);	
			$data_salida['campos'] =$campos_arr;
	    }
	    //se cierra la conexion .. ns
        $CI->db->close();
        return $data_salida;
	}

	//version extendida basada n la tabla information_schema.columns de postgres .. ns
	function ns_extraer_info_tabla_ext($tabla="",$parametros=array())
	{
		//se instancia la clase Controller para poder extraer datos de la bd .. ns!
		$CI = & get_instance();
		//se inicializan variables .. ns
        $data_salida=array();
        //se extrae la informacion sobre los campos de la tabla .. ns
        $info_tabla=explode('.',$tabla);
        $CI->db->from('information_schema.columns');
        $esquema="public"; //por defecto .. ns
        if(isset($info_tabla[1])) {
        	$esquema=$info_tabla[0];
        	$tabla 	=$info_tabla[1];
        } else {
        	$tabla 	=$info_tabla[0];
        }
		$CI->db->where('table_schema',$esquema);
        $CI->db->where('table_name',$tabla);
        $CI->db->order_by('ordinal_position ASC');

        $rs=$CI->db->get();
        $campos_arr=$rs->result_array();
	        $data_salida['campos']  =$campos_arr;
        
	    //se cierra la conexion .. ns
        $CI->db->close();
        return $data_salida;
	}
}

if( ! function_exists('ns_html_lista_segun_tabla'))
{
	function ns_html_lista_segun_tabla($id, $parametros=array()){
		//se instancia la clase Controller para poder extraer datos de la bd .. ns!
		$CI = & get_instance();
		//se inicializan variables .. ns
        $html_salida="";
		//Parámetros esperados ... jjy
		$clases="";
		$estilos="";
		$texto_por_defecto="-- Seleccione --";
		$valor_por_defecto="0";
		$texto_seleccionado="";
		$valor_seleccionado="";
		$datos['campos']=array();
		$datos['datos']=array();
		// los parametros correctos remplazaran a los inicializados en "" .. jjy
		extract($parametros);
		//
		ns_valores_lista_segun_tabla($parametros);

        $html_salida="<select class='$clases' style='$estilos' id='$id' name='$id'>\n";
        	if($texto_por_defecto!=""){
		        $html_sub1="<option value='$valor_por_defecto' ";
		        if($valor_por_defecto==$valor_seleccionado){
		        	$html_sub1.=" selected='selected' ";
		        }
		        $html_sub2=">$texto_por_defecto</option>";
		        $html_salida.=$html_sub1.$html_sub2;
		    }

        foreach ($datos['datos'] as $reg) {
			foreach($reg as $campo=>$valor){
                if($campo==$campo_lista_valor){
                    $html_sub1="<option value='$valor' ";
					if($valor_seleccionado!="" && $valor==$valor_seleccionado){
			        	$html_sub1.=" selected='selected' ";
			        }
                }
		         //|| ($texto_seleccionado!="" && $valor==$texto_seleccionado))
                if($campo==$campo_lista_texto){
                	if($texto_seleccionado!="" && $valor==$texto_seleccionado){
		        		$html_sub1.=" selected='selected' ";
		        	}
                    $html_sub2=">$valor</option>\n";
                }
            }
            $html_salida.=$html_sub1.$html_sub2;
        }
        $html_salida.="</select>\n";

        return $html_salida;
	}
}

if( ! function_exists('ns_valores_lista_segun_tabla'))
{
	function ns_valores_lista_segun_tabla ($tabla,$parametros=array()){
		//se instancia la clase controller! .. ns
		$CI = & get_instance();
        //parametros esperados ... jjy
        $texto_por_defecto  ="";
        $valor_por_defecto  ="";
        $valor_seleccionado ="";
        $tabla_origen       =$tabla;
        $condicion_filtro   ="";
        $orden_salida       ="";
        $consulta_sql_origen="";
        $campo_lista_valor  ="id_o_codigo"; //pasar valor correcto .. ns
        $campo_lista_texto  ="descripcion"; //pasar valor correcto .. ns
        //se extraen los parámetros .. ns
        extract($parametros);
        //se prepara la extracción de los datos .. ns
        $CI->db->select($campo_lista_valor.','.$campo_lista_texto);
        $CI->db->from($tabla_origen);
        if(isset($condicion_filtro)&&$condicion_filtro!="") $CI->db->where($condicion_filtro);
        if(isset($orden_salida)&&$orden_salida!="") $CI->db->order_by($orden_salida);
        $rs = $CI->db->get();
        //
        $resultado['campos']=$rs->list_fields();
        $resultado['datos']=$rs->result();
        //
        $CI->db->close();
        return $resultado;
    }
}
/* End of file ns_fw_helper.php */
/* Location: ./application/helpers/ns_fw_helper.php */

/****** REVISAR .............................

if ( !function_exists('simple_html_grid')){

	//crea un grid simple basado en html .. jjy
	function simple_html_grid($id, $arreglo_datos, $parametros=array()){
		// echo"<pre>";
		// 	print_r($arreglo_datos);
		// 	print_r($parametros);
		// echo"</pre>";

		$editable=(isset($parametros['editable']) && $parametros['editable']);
		$nuevo_registro=(isset($parametros['nuevo_registro']) && $parametros['nuevo_registro']);

		//se hace una conversion del arreglo por si viene como obj_result de postgres .. jjy
		if(!is_array($arreglo_datos)) $arreglo_datos=(array) $arreglo_datos;

		$html_salida="";
		$n_registros=count($arreglo_datos);

		$html_salida= "<table id='$id' name='$id' class='html-grid'>";

		$fila=0;
		$n_campos=0;

		if(isset($parametros['columnas'])){
			$html_salida.= "<tr>";
			$html_salida.= "<th style='width:0px;'></th>\n";
			foreach($parametros['columnas'] as $campo=>$titulo){
				$mostrar_col[$campo]=$titulo;

				//se muestran las cabeceras de las columnas .. jjy
				//sólo la primera vez
				$n_campos++;
				if(isset($mostrar_col[$campo])) {
					$titulo=$mostrar_col[$campo];
					$html_salida.= "<th>".$titulo."</th>";
				}
			}
			$html_salida.= "<td class='invisible'></td>\n";
			$html_salida.= "<th style='width:0px;'></th>\n";
			$html_salida.= "</tr>\n";
		}

		$html="";
		$mensaje="";
		$tipo_mensaje="";

		if($n_registros>0){

			foreach($arreglo_datos as $reg){
				$fila++;

				$par_o_impar=(($fila%2)==0)?'par':'impar';
				$registro_editable=($editable==true)?'registro_editable':'';
				$html_campos_hidden="";
				$html_salida.= "<tr class='seleccionable {$par_o_impar} {$registro_editable}'>";
				$html_salida.= '<td class="alinear-abajo"></td>';
				foreach($reg as $campo=>$valor){
					if(isset($mostrar_col[$campo])) {
						$html_salida.= "\n<td>";
						if($editable) {
							$html_salida.= "<input class='{$par_o_impar} celda_grid' id='{$campo}[]' name='{$campo}[]' type='text' class='{$par_o_impar} ancho-full' value='$valor' title='$valor' rel='$fila'/>";
						} else {
							$html_salida.= $valor;
						}
						$html_salida.= "</td>";
					} else {
						$html_campos_hidden.= "<input id='{$campo}[]' name='{$campo}[]' type='hidden' class='ancho-full' value='{$valor}' rel='$fila' />\n";
					}
				}
				$html_acciones="<img title='Eliminar' class='boton_ico_eliminar' src='".base_url()."/imgs/ico_eliminar.gif'/>";

				$html_campos_hidden.="<input class='registro_editado' id='registro_editado[]' name='registro_editado[]' type='hidden' rel='$fila'/>";
				$html_salida.= '<td class="invisible">'.$html_campos_hidden;
				$html_salida.= '<td class="alinear-centro" style="padding:0px !important;">'.$html_acciones.'</td>';
				$html_salida.= "</tr>\n";
			}

		} else {

			$mensaje="La tabla está vacia actualmente.";
			$tipo_mensaje="advertencia";
		}
		$reg=array();
		if(isset($parametros['campos'])){
			foreach($parametros['campos'] as $campo){
				$reg[$campo]="";
			}
		}
		$reg['codigo_tabla']=$parametros['codigo_tabla'];

		//se muestran una fila vacía al final para un nuevo registro .. jjy
		$html="";
		if($nuevo_registro){
			$html_campos_hidden="";
			$html= 	'<script>';
			$html.= "var reg_nuevo={$fila};";
			$html.= 'var tr_nuevo="';
			$html.=	"<tr class='registro_nuevo'><td></td>";

			foreach($reg as $campo=>$valor){
				$valor_campo_defecto="";
				$hay_campo_nuevo=isset($parametros[$campo.'_nuevo']);
				if($hay_campo_nuevo){
					$valor_campo_defecto=$parametros[$campo.'_nuevo'];
				} else {
					if(!isset($mostrar_col[$campo])){
						$valor_campo_defecto=$valor;
					}
				}
				if(isset($mostrar_col[$campo])) {
					$html.= "<td>"
						   ."<input class='celda_grid' id='{$campo}[]' name='{$campo}[]' type='text' class='ancho-full' value='{$valor_campo_defecto}'  rel='$fila'/>"
						   ."</td>";
				} else {
					$html_campos_hidden.= "<input id='{$campo}[]' name='{$campo}[]' type='hidden' class='ancho-full' value='{$valor_campo_defecto}'  rel='$fila'/>";

				}
			}
			$html_campos_hidden.="<input class='registro_editado' id='registro_editado[]' name='registro_editado[]' type='hidden' rel='$fila'/>";
			$html.= "<td class='invisible'>$html_campos_hidden</td>";
			$html.= "<td></td>";
			$html.= '</tr>";';
			$html.="\n</script>\n";
		}	

		$html_salida.= "</table>\n";
		$html_salida.= $html;
		$html_salida.=html_mensaje('',$mensaje,$tipo_mensaje);

		if($nuevo_registro){
			$html_salida.= "<a href='javascript:void(0);' class='link_registro_nuevo_grid' rel='$id'>Agregar registro nuevo</a>";
			$html_salida.= "&nbsp;<a href='javascript:void(0);' class='link_guardar_registro' rel='$id'>Guardar cambios</a>";
			$html_salida.= "&nbsp;<a href='javascript:void(0);' class='link_cancelar_edicion' rel='$id'>Cancelar</a>";
			$script="
				<script>
					$(document).ready(function(){
						$('#'+$(this).attr('rel')+' tr:even td input').addClass('par');
						$('.link_guardar_registro , .link_cancelar_edicion').hide();
						$('.link_cancelar_edicion').click(function(){
							$('#'+$(this).attr('rel')+' tr:last').remove();
							$('.link_guardar_registro[rel=\"'+$(this).attr('rel')+'\"], .link_cancelar_edicion[rel=\"'+$(this).attr('rel')+'\"]').hide();
							$('.link_registro_nuevo_grid[rel=\"'+$(this).attr('rel')+'\"]').show();
							reg_nuevo--;
						});
						$('.link_registro_nuevo_grid').click(function(){
							reg_nuevo++;
							$('#'+$(this).attr('rel')).append(tr_nuevo);
							$('#'+$(this).attr('rel')+' tr:last input').attr('rel',reg_nuevo);
							$('#'+$(this).attr('rel')+' tr:even td input').addClass('par');
							$(this).hide();
							$('.link_guardar_registro[rel=\"'+$(this).attr('rel')+'\"], .link_cancelar_edicion[rel=\"'+$(this).attr('rel')+'\"]').show();

							$('.celda_grid').change(function(){
								$('.registro_editado[rel=\"'+$(this).attr('rel')+'\"]').val('SI');
							});
						});
						$('.link_guardar_registro').click(function(){
							{$parametros['funcion_guardar']}();
						});
						$('.celda_grid').change(function(){
							$('.registro_editado[rel=\"'+$(this).attr('rel')+'\"]').val('SI');
						});
					});
				</script>";
			$html_salida.= $script;
		}

		return $html_salida;
	}

}

if (!function_exists('html_pestanas')){

	function html_pestanas($id="", $parametros=array()){
		$html_salida="";
		$clases=(isset($parametros['clases-pestanas']) && $parametros['clases-pestanas']!="")?$parametros['clases-pestanas']:"";
		$estilos=(isset($parametros['estilo-pestanas']) && $parametros['estilo-pestanas']!="")?$parametros['estilo-pestanas']:"";
		$html_salida.='<div id="'.$id.'" name="'.$id.'" class="contenedor-pestanas">
				<ul class="pestanas ancho-full">
					&nbsp;';
					foreach($parametros['pestanas'] as $id_tab=>$titulo_tab){
						$html_salida.='<li class="tab '.$clases.' " style=" '.$estilos.' ">';
						$html_salida.='<a href="#" rel="'.$id_tab.'">'
									.$titulo_tab
									.'</a>'
									."</li>\n";
					}
		$html_salida.='</ul></div>';
		$html_salida.=	"\n
			<script>
				$(document).ready(function(){
					$('.pestanas li.tab:first').addClass('activo');
					$('.pestanas li.tab a').click(function(){
						$('.pestanas li.activo').removeClass('activo');
						$(this).parent().addClass('activo');

						$('div#'+$(this).attr('rel')).removeClass('invisible');
						$('div.tab_activo').addClass('invisible').removeClass('tab_activo');
						$('div#'+$(this).attr('rel')).addClass('tab_activo');

						$('.detalle_paso_colapsable').toggle();
						$('#detalle_paso_1').toggle();
					});
				});
			</script>
			\n";
		return $html_salida;
	}
}
*/
/**
	FUNCIONES COMUNES! .. ns
**/
if( ! function_exists('prp'))
{
	function prp($arg=array())
	{
		echo "\n<pre>\n";
		if( ! is_array($arg)) {
			if( ! is_object($arg)) {
				echo $arg;
			} else {
				print_r((array) $arg);
			}
		} else {
			print_r($arg);
		}
		echo "</pre>\n";
	}
}

if( ! function_exists('table_exists'))
{
	function table_exists($table="schema.table_name"){
		$frgmts =explode('.',$table);
		$schema =trim(strtolower((isset($frgmts[1]))?"LOWER(table_schema) like '%".$frgmts[0]."%' and ":" "));
		$table  =trim(strtolower((isset($frgmts[1]))?$frgmts[1]:$frgmts[0]));
		$CI     = & get_instance();
		$sql    ="SELECT count(*) as n FROM information_schema.tables WHERE $schema LOWER(table_name) = '$table' limit 1;";
		$rs     =$CI->db->query($sql);
		$rsx    =$rs->row_array();
		$salida =($rsx['n']=="1");
		return $salida;
	}
}

if( ! function_exists('ns_reordenar_campos_segun_array'))
{
	function ns_reordenar_campos_segun_array($arreglo_campos, $arreglo_orden){
		$arr_salida=array();
		$arr_ordenado=array();
		$arr_quitar=array();
		$arr_quedaron_sin_orden=array();
		foreach($arreglo_orden as $id_campo => $contenido){
			foreach($arreglo_campos as $id => $info_campo){
				$info_campo=(array) $info_campo;
				if($info_campo['name']==$id_campo){
					array_push($arr_ordenado,$info_campo);
					$arr_quitar[]=$id;
					break;
				}
			}
		}
		foreach($arreglo_campos as $id => $info_campo){
			$info_campo=(array) $info_campo;
			if(array_search($id,$arr_quitar)===false){
				array_push($arr_quedaron_sin_orden,$info_campo);
			}
		}
		$arr_salida=array_merge($arr_ordenado,$arr_quedaron_sin_orden);

		return $arr_salida;
	}
}
