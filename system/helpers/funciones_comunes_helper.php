<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( !function_exists('simple_html_grid')){

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
			</div>';
		}
		return $salida;
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
					//prp($parametros);
					foreach ( $parametros['pestanas'] as $id_tab => $titulo_tab ) {
						
						//echo $id_tab . '-' . (isset ( $parametros ['enlaces'][$id_tab] ) == true ). ' - ' .  $parametros ['enlaces'][$id_tab];

						$html_salida.='<li class="tab '.$clases.' " style=" '.$estilos.' ">';
						$html_salida.='<a href="';
						$html_salida.=( ( isset ( $parametros ['enlaces'][$id_tab] ) ) ? 
										$parametros ['enlaces'][$id_tab] 
										: ( ( file_exists ( base_url()."controllers/{$id_tab}/." ) !== '' )  ?
											site_url()."/s/{$id_tab}/{$id_tab}_c"
											: "#"
										)
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

}