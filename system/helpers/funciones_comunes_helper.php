<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists( 'html_campo_celda_con_etiqueta' ) ) {

	function html_campo_celda_con_etiqueta($id = '', $parametros = array()){

		$tipo 	  = "texto";
		$etiqueta = "etiqueta";
		$placeholder = '';
		extract($parametros);
		$salida = '';
		$salida = '<table width="100%"><tr>'
					.'<td><label style="white-space:nowrap;" for="'.$id.'">'.$etiqueta.'</label></td>'
					.'<td width="100%">';
		switch ($tipo){
			case "fecha":
				if ( $placeholder == '' ) $placeholder = 'dd/mm/aaaa';
				$html_campo = '<input placeholder="'.$placeholder.'" type="text" style="width:100%" id="'.$id.'" name="'.$id.'"/>';
			break;

			case "list-a_radios":
				//print_r($parametros);
				$html_campo = '<select>';
				foreach ($valores as $id => $datos) {
					//$html_campo .= '<input id="'.$id.'" name="'.$id.'" type="radio" value="'.$datos[1].'"><label for="'.$id.'">'.$datos[0]."</label>\n";
					$html_campo .= '<option value="'.$datos[1].'">'.$datos[0]."</option>\n";
				}
				$html_campo .= "</select>\n";
				//$html_campo = '<input placeholder="'.$placeholder.'" type="text" style="width:100%" id="'.$id.'" name="'.$id.'"/>';
			break;

			case "texto":
			default:
				$html_campo = '<input placeholder="'.$placeholder.'"" type="text" style="width:100%" id="'.$id.'" name="'.$id.'"/>';
			break;
		}
		$salida .= $html_campo;
		$salida .= '</td>'
				  .'</tr></table>';
		return $salida;

	}

}

if ( ! function_exists( 'html_tabla_formulario' ) ) {

	function html_tabla_formulario( $id = '', $parametros = array() ){

		extract( $parametros );
		$salida = '';

		$salida .= "<div id='$id' name '$id'>\n";
		$salida .= "<table width='100%'>\n";
		
		foreach ($filas as $fila) {
			$salida .= "<tr>\n";

			foreach ( $fila as $indice => $contenido ) {

				$tipo = 'texto';
				if ( is_array( $contenido ) && $indice != '_titulo' && $indice != '_span') {
					$tipo = $contenido [1];
					$contenido = $contenido [0];
				}

				switch ( $indice ) {
					case '_titulo': 
						$salida .= '<th ';
						if (isset ( $contenido['_span'] ) ) {
							$salida .= 'colspan="'.$contenido['_span'].'"';
						}
						$salida .= '>'.$contenido['_texto']."</th>\n";
					break;

					case '_span':
						$salida .= '<td ';
						foreach ( $contenido as $sub_indice => $sub_contenido ) {

							switch ( $sub_indice ) {
								case '_columnas':
									$salida .= 'colspan="'.$sub_contenido.'">';
									break;
								
								default:

									if ( is_array( $sub_contenido ) ) {

										$valores = array();
										
										$etiqueta = $sub_contenido[0];
										$tipo = $sub_contenido[1];
										if ( isset( $sub_contenido [2] ) ){
											$valores = $sub_contenido [2];
										}

										$sub_parametros = array( 'id'       => $indice,
																 'tipo' 	=> $tipo,
																 'etiqueta' => $etiqueta,
																 'valores'	=> $valores,
															); 
										$salida .= html_campo_celda_con_etiqueta( '', $sub_parametros );

									} else {

										$salida .= '<span>';
										$sub_parametros = array( 'id'       => $sub_indice,
																 'tipo' 	=> $tipo,
																 'etiqueta' => $sub_contenido ); 
										$salida .= html_campo_celda_con_etiqueta( '', $sub_parametros );
										$salida .= '</span>';
									}
									break;
							}
						}
						$salida .= "</td>\n";
					break;

					default:
					
						$salida .= '<td>';
						if ( is_array( $contenido ) ) {

							$etiqueta = $contenido[0];
							$tipo = $contenido[1];
							$valores = $contenido [2];

							$sub_parametros = array( 'id'       => $indice,
													 'tipo' 	=> $tipo,
													 'etiqueta' => $etiqueta,
													 'valores'	=> $valores,
												); 
							$salida .= html_campo_celda_con_etiqueta( '', $sub_parametros );

						} else {

							$sub_parametros = array( 'id'       => $indice,
													 'tipo' 	=> $tipo,
													 'etiqueta' => $contenido ); 
							$salida .= html_campo_celda_con_etiqueta( '', $sub_parametros );
						}
						$salida .= "</td>\n";
					break;
				}
			}
			$salida .= "</tr>\n";
		}
		$salida .= "</table>\n";
		$salida .= "</div>\n";
		
//		echo "<pre>", print_r($parametros);

		return $salida;
	}

}

if ( ! function_exists( 'html_enlace_boton' ) ) {

	function html_enlace_boton ($id = '', $parametros = array() ) {
		$descripcion    = '';
		$tipo           = 'boton_icono';
		$icono          = 'glyph_inicio';
		$enlace 			= "javascript:alert('definir enlace');";
		$destino 		= '_self';
		$posicion_icono = '';
		$tooltip 		= '';
		$clase 			= '';
		$clase_adicional= '';
		$estilo_adicional='';

		extract( $parametros );

		if ( trim( $tooltip == '' ) ) $tooltip = $enlace;

		if ( trim( $posicion_icono !== '') ) {
			$coordenadas        = explode(' ', trim( $posicion_icono ) );
			$coordenadas_salida = $coordenadas;
			foreach ( $coordenadas as $i => $valor) {
				if ( strpos( $valor, 'px' ) === FALSE ) {
					$coordenadas_salida[$i] = (string) 
						( ( ( intval( $valor ) - 1 ) * 24 ) * (-1) ). 'px';
				}
			}
			$posicion_icono = implode( ' ', $coordenadas_salida );
		}

		$salida = '';

		if ( trim ( $descripcion ) !== '' ){
			$clase .= ' icono-con-texto';
		}

		if ( $tipo == 'boton_icono' && trim( $icono ) != '') {
			$salida .= '<a style="'.$estilo_adicional.'" '
					. 'class="a-sin-borde seguido '.$clase.'" '
					. 'href="' 		. $enlace 	. '" '
					. 'target="' 	. $destino 	. '" '
					. 'title="' 	. $tooltip 	. '"'
					. '><div class = "' . $tipo . " " . $clase_adicional . '" '
					. 'id="' . $id . '" name="' . $id . '">'
					. '<div class="icono ' . $icono . '" '
					. 'style="background-position:' . $posicion_icono . ';">'
					. '</div>';
			if ( trim ( $descripcion ) !== '' ){
				$salida .= "<div class='descripcion-boton'>$descripcion</div>";
			}
			$salida .= '</div></a>';
		} elseif ( $tipo == 'solo_icono' && trim( $icono ) != '') {
			$salida .= '<a style="'.$estilo_adicional.'" '
					. 'class="a-sin-borde seguido '.$clase.'" '
					. 'href="' 		. $enlace 	. '" '
					. 'target="' 	. $destino 	. '" '
					. 'title="' 	. $tooltip 	. '"'
					. '><div class = "' . $tipo . " " . $clase_adicional
					. '" id="' . $id . '" name="' . $id . '">'
					. '<div class="icono ' . $icono . '" '
					. 'style="background-position:' . $posicion_icono . ';">'
					. '</div>'
					. '</div></a>';
		}

		return $salida;
	}
}

if ( ! function_exists( 'simple_html_lista' ) ){

	//crea una lista-grid simple basada en html .. jjy
	function simple_html_lista ( $id, $arreglo_datos, $parametros=array() ) {
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

		$html_salida= "<table id='$id' name='$id' class='html-lista'>";

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
							if ( isset ( $parametros['campos'][$campo] ) ) { //si viene con formato
								$valor = str_replace( '{@valor}', $valor, $parametros['campos'][$campo] );
							}
							$html_salida.= $valor;
						}
						$html_salida.= "</td>";
					} else {
						$html_campos_hidden.= "<input id='{$campo}[]' name='{$campo}[]' type='hidden' class='ancho-full' value='{$valor}' rel='$fila' />\n";
					}
				}
				$html_acciones="<img title='Eliminar' class='boton_ico_eliminar' src='".base_url()."/imgs/ico_eliminar.gif'/>";

				$html_campos_hidden.="<input class='registro_editado' id='registro_editado[]' name='registro_editado[]' type='hidden' rel='$fila'/>";
				$html_salida.= '<td class="invisible">'.$html_campos_hidden.'</td>';
				$html_salida.= '<td class="alinear-centro" style="padding:0px !important;">'.$html_acciones.'</td>';
				$html_salida.= "</tr>\n";
			}

		} else {

			$mensaje="La tabla está vacia actualmente.";
			$tipo_mensaje="advertencia";
		}
		$reg=array();
		if(isset($parametros['campos'])){
			foreach($parametros['campos'] as $campo=>$formato){
				if( !is_integer($campo) ) {
					$reg[$campo]="";
				} else {
					$reg[$formato]="";
				}
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

if ( ! function_exists( 'simple_html_paginacion' ) ){

	//crea los links de paginacion según los parámetros dados ... aplica para cualquier vista ... jjy
	function simple_html_paginacion ( $id = '', $parametros = array() ) {
		
		//valores por omisión ... jjy
		$enlace               = '#';
		$total_registros      = 10;
		$registros_por_pagina = 5;

		// extracción de parámetros para sobreescribir valores por omisión ... jjy
		extract ( $parametros );

		// validación de parámetros ... jjy
		$enlace = ( substr( trim( $enlace ), -1 ) == '/')
				  ? substr( trim( $enlace ), 0, -1)
				  : trim( $enlace );

		// variable de salida de la función ... jjy
		$salida = "";

		$CI =& get_instance();
		$CI->load->library('pagination');

		$config = array(
					'full_tag_open'  => '<div id="'.$id.'" name = "'.$id.'" class="paginacion seguido">',
					'base_url'       => $enlace,
					'total_rows'     => $total_registros,
					'per_page'       => $registros_por_pagina,
					// la página actual debe venir siempre como último parámetro de la uri ... jjy
					'uri_segment'    => count ( explode('/', str_replace ( site_url(), '', $enlace ) ) ),
					// el parametro anterior debe ser revisado y probado para muchos otros casos .... jjy
					'full_tag_close' => '</div>',
					'num_links'      => round ( $total_registros / $registros_por_pagina ),
				);

		$CI->pagination->initialize($config); // aplica los parametros ... jjy
		
		$salida = $CI->pagination->create_links();

		return $salida;
	}
}

if ( ! function_exists( 'simple_html_grid' ) ){

	//crea un grid simple basado en html .. jjy
	function simple_html_grid ( $id, $arreglo_datos, $parametros=array() ) {
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
							if ( isset ( $parametros['campos'][$campo] ) ) { //si viene con formato
								$valor = str_replace( '{@valor}', $valor, $parametros['campos'][$campo] );
							}
							$html_salida.= $valor;
						}
						$html_salida.= "</td>";
					} else {
						$html_campos_hidden.= "<input id='{$campo}[]' name='{$campo}[]' type='hidden' class='ancho-full' value='{$valor}' rel='$fila' />\n";
					}
				}
				$html_acciones="<img title='Eliminar' class='boton_ico_eliminar' src='".base_url()."/imgs/ico_eliminar.gif'/>";

				$html_campos_hidden.="<input class='registro_editado' id='registro_editado[]' name='registro_editado[]' type='hidden' rel='$fila'/>";
				$html_salida.= '<td class="invisible">'.$html_campos_hidden.'</td>';
				$html_salida.= '<td class="alinear-centro" style="padding:0px !important;">'.$html_acciones.'</td>';
				$html_salida.= "</tr>\n";
			}

		} else {

			$mensaje="La tabla está vacia actualmente.";
			$tipo_mensaje="advertencia";
		}
		$reg=array();
		if(isset($parametros['campos'])){
			foreach($parametros['campos'] as $campo=>$formato){
				if( !is_integer($campo) ) {
					$reg[$campo]="";
				} else {
					$reg[$formato]="";
				}
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

if(!function_exists('html_mensaje')){

	function html_mensaje($id="",$mensaje="", $tipo="info", $parametros=array()){
		$salida="";
		if($mensaje!=""){
			$salida='
			<div id="'.$id.'" name="'.$id.'" class="mensaje mensaje-'.$tipo.'">
				'.$mensaje.'
			</div>
			<script>
				setTimeout("desvanecer_mensaje()",2000);
				function desvanecer_mensaje(){$(".mensaje").fadeOut("slow");}
			</script>';
		}
		return $salida;
	}
}

if (!function_exists('html_pestanas')){

	function html_pestanas($id="", $parametros=array()){
		$html_salida     ="";
		$clases          =(isset($parametros['clases-pestanas']) && $parametros['clases-pestanas']!="")?$parametros['clases-pestanas']:"";
		$estilos         =(isset($parametros['estilo-pestanas']) && $parametros['estilo-pestanas']!="")?$parametros['estilo-pestanas']:"";
		$estilo_general  =(isset($parametros['estilo-general']) && $parametros['estilo-general']!="")?$parametros['estilo-general']:"";
		
		$seccion_activa  =$parametros['id_pestana_activa'];

		foreach($parametros['pestanas'] as $seccion => $titulo){
			eval('$tab_'.$seccion.' = "";');
		}
		eval('$tab_'.$seccion_activa.' = "activo";');

		$html_salida.='<div id="'.$id.'" name="'.$id.'" class="contenedor-pestanas">
				<ul class="pestanas ancho-full" style="'.$estilo_general.'">
					&nbsp;';
					
					$estilo_id_tab = "";
					foreach ( $parametros['pestanas'] as $id_tab => $titulo_tab ) {
						
						eval ( '$estilo_id_tab = $tab_'.$id_tab.';' );

						$html_salida.='<li class="tab '.$clases.' '.$estilo_id_tab.'" style=" '.$estilos.' ">';
						$html_salida.='<a href="';

						$html_salida.=( ( isset ( $parametros ['enlaces'][$id_tab] ) ) 
										? $parametros ['enlaces'][$id_tab] 
										: "#"
									);
						$html_salida.='" rel="'.$id_tab.'">'
									.$titulo_tab
									.'</a>'
									."</li>\n";
					}
		$html_salida.='</ul></div>';
		$html_salida.=	"\n
			<script>
				$(document).ready(function(){
					$('.pestanas li.tab a').click(function(){
						$('.pestanas li.activo').removeClass('activo');
						$(this).parent().addClass('activo');

						$('div#'+$(this).attr('rel')).removeClass('invisible');
						$('div.tab_activo').addClass('invisible').removeClass('tab_activo');
						$('div#'+$(this).attr('rel')).addClass('tab_activo');

						$('.detalle_paso_colapsable').toggle();
						$('#detalle_paso_1').toggle();
					});
					$('.barra-botones').css({
						'background':'url(" . base_url() . "/imgs/fondo.jpg)',
						'background-position':'center center',
						'background-size':'1280px auto'
					});
				});
			</script>
			\n";
		return $html_salida;
	}
}

if(!function_exists('html_lista_segun_tabla')){
	function html_lista_segun_tabla($id, $parametros=array()){
		//Parámetros esperados ... jjy
		$clases="";
		$estilos="";
		$texto_por_defecto="-- Seleccione --";
		$valor_por_defecto="0";
		$texto_seleccionado="";
		$valor_seleccionado="";

		// los parametros correctos remplazaran a los inicializados en "" .. jjy
		extract($parametros);

		$CI =& get_instance();
		$CI->load->model('comun/comun_m');

		$datos=$CI->comun_m->valores_lista_segun_tabla($parametros);

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

/**
	FUNCIONES COMUNES! .. ns
**/
	if( ! function_exists('prp'))
	{
		function prp( $arg=array(), $die = FALSE )
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
			if ($die) die('<pre><br>ejecuci&oacute;n terminada ...</pre>');
		}
	}

}