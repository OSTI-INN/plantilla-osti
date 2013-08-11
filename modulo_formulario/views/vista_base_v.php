<?php 
	$this->load->view('encabezado_comun_modulo_v') 
	// continual en el bloque <head> ... ..jy ?>
<?php /**
	A PARTIR DE AQUI INICIA EL CONTENIDO EXCLUSIVO DE ESTA VISTA ... jjy 
**/?>

</head>
<body>
<h2 class = "titulo-seccion seguido margen-inferior-4">Intrumento 1. <span class="normal">Evaluación del Suministro de Alimentos por Programa PAE y Cantinas Escolares</span></h2>
<hr>
	<?php
		$parametros = array(
						//'descripcion' 	 => 'Buscar',
						'enlace'		 => site_url().'',
						'destino'		 => '_self',
						'tipo'           => 'boton_icono',
						//'icono'          => 'icono_inicio',
						'tooltip'        => 'Ir al Inicio',
						'posicion_icono' => '5 2',
					);
	?>
	<?=html_enlace_boton( 'bt_buscar', $parametros )?>
	<?php
		$parametros = array(
						'descripcion' 	 => 'Buscar',
						'enlace'		 => site_url().'',
						'destino'		 => '_self',
						'tipo'           => 'boton_icono',
						//'icono'          => 'icono_inicio',
						'tooltip'        => 'Ir al Inicio',
						'posicion_icono' => '-48px 0px',
					);
	?>
	<?=html_enlace_boton( 'bt_buscar', $parametros )?>
	<?php
		$parametros = array(
						'enlace'		 => site_url().'',
						'destino'		 => '_self',
						'tipo'           => 'boton_icono',
						//'icono'          => 'icono_inicio',
						'tooltip'        => 'Ir al Inicio',
						//'posicion_icono' => '-48px 0',
					);
	?>
	<?=html_enlace_boton( 'bt_buscar', $parametros )?>
<hr>
<form action='?' class="formulario-tabla ancho-99-porciento">
<?php 
	$definicion_tabla_formulario = array(
		'id'	   => 'seccion_1',
		'columnas' => 3,
		'filas'	   => array(
			array(
				'_titulo' => array(
					'_span' 		=> 2,
					'_texto'		=> 'Sección 1. IDENTIFICACIÓN DE LA INSTITUCIÓN',
				),
				'fecha_encuesta'  	=> array( '1. Fecha de la encuesta:', 'fecha' ),
			),
			array(
				'entidad_federal' 	=> '2. Entidad Federal:',
				'municipio'       	=> '3. Municipio:',
				'parroquia'			=> '4. Parroquia:',
			),
			array(
				'direccion' 		=> '5. Dirección de la Institución Educativa:',
				'_span' => array(
					'_columnas'		     => 2,
					'nombre_institucion' => '6. Nombre de la Institución Educativa:',
				),
			),
			array(
				'director_plantel' 	=> '7. Nombre del director del Plantel:',
				'cdeula_director'  	=> '8. Cédula de Identidad del Director del Plantel:',
				'tipo_institucion' => array(
					'9. Tipo de Institución Educativa:', 'lista_radios', 
					array(
						'nacional'		=> array('1. Nacional',  'n'),
						'estadal'		=> array('2. Estadal', 	 'e'),
						'municipal'		=> array('3. Municipal', 'm'),
					),
				),
			),
			array(
				'posee_cantina' => array(
					'10. ¿Posee Cantina escolar?', 'lista_radios', 
					array(
						'cantina_si'	=> array('1. Si',  's'),
						'cantina_no'	=> array('2. No', 	 'n'),
					),
				),
				'_span' => array(
					'_columnas' => 2,
					'posee_programa_pae' => array(
						'11. ¿Posee Programa de Alimentación Escolar (P.A.E.)?', 'lista_radios', 
						array(
							'pae_si'	=> array('1. Si',  's'),
							'pae_no'	=> array('2. No', 	 'n'),
						),
					),

				),
			),
		),
	);
?>
<?=html_tabla_formulario( '', $definicion_tabla_formulario )?>
<br>
<?php 
	$definicion_tabla_formulario = array(
		'id'	   => 'seccion_2',
		'columnas' => 5,
		'filas'	   => array(
			array(
				'_titulo' => array(
					'_span' 		=> 4,
					'_texto'		=> 'Sección 2. CANTINAS ESCOLARES',
				),
				'etq_1'  	=> array( '13. Nombre los diez (10) alimentos de<br>mayor venta', 'etiqueta' ),
			),
			array(
				'_span' => array(
					'_columnas' 	=> 4,
					'etq_2' => array( '12. Marque con una X los alimentos que con frecuencia tienen ', 'etiqueta' ),
				),
				'alimento_1_de_10' 	=> '1.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'alimento_12_1' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_2' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_3' 	=> array('1. Empanadas', 'radio'),
				'alimento_12_4' 	=> array('1. Empanadas', 'radio'),
				'alimento_2_de_10' 	=> '2.',
			),
			array(
				'director_plantel' 	=> '7. Nombre del director del Plantel:',
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque con una X los ', 'etiqueta' ),
				),
				'alimento_2_de_10' 	=> '2.',
			),
		),
	);
?>
<?=html_tabla_formulario( '', $definicion_tabla_formulario )?>

<br>
<?php 
	$definicion_tabla_formulario = array(
		'id'	   => 'seccion_3',
		'columnas' => 3,
		'filas'	   => array(
			array(
				'_titulo' => array(
					'_span' 		=> 4,
					'_texto'		=> 'Sección 3. CONDICIONES HIGIÉNICAS DE LA CANTINA ESCOLAR',
				),
			),
			array(
				'_span' => array(
					'_columnas' 	=> 4,
					'etq_2' => array( '12. Marque con una X los alimentos que con frecuenci', 'etiqueta' ),
				),
			),
			array(
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque  existencia con frecuencia tienen en existencia', 'lista_radios' ),
				),
				'posee_cantina' => '10. ¿Posee Cantina escolar?',			),
			array(
				'_span' => array(
					'_columnas' 	=> 4,
					'linea_vacia' => '',
				),
			),
			array(
				'posee_cantina' => '10. ¿Posee Cantina escolar?',
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque con una X los alimentos que con frecuencia tienen en existencia', 'etiqueta' ),
				),
			),
			array(
				'posee_cantina' => '10. ¿Posee Cantina escolar?',
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque con una X los alimea tienen en existencia', 'etiqueta' ),
				),
			),
			array(
				'posee_cantina' => '10. ¿Posee Cantina escolar?',
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque con una X los aliia tienen en existencia', 'etiqueta' ),
				),
			),
			array(
				'posee_cantina' => '10. ¿Posee Cantina escolar?',
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque con una X los frecuencia tienen en existencia', 'etiqueta' ),
				),
			),
			array(
				'posee_cantina' => '10. ¿Posee Cantina escolar?',
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque con unecuencia tienen en existencia', 'etiqueta' ),
				),
			),
			array(
				'posee_cantina' => '10. ¿Posee Cantina escolar?',
				'_span' => array(
					'_columnas' 	=> 3,
					'etq_2' => array( '12. Marque con una X los alimenen en existencia', 'etiqueta' ),
				),
			),
			array(
				'_span' => array(
					'_columnas' 	=> 2,
					'etq_2' => array( '12. Marque con una X los aen en existencia', 'etiqueta' ),
				),
				'_span' => array(
					'_columnas' 	=> 2,
					'etq_2' => array( '12. Marque con una X los alimentos que coencia', 'etiqueta' ),
				),
			),

		),
	);
?>
<?=html_tabla_formulario( '', $definicion_tabla_formulario )?>

<input type='submit'>
</form>





<div class="ayuda-teclas teclas-ctrl">
	<ul>
		<li>Ctrl+<big><big><b>&uarr;</b></big></big> = Sección Anterior</li>
		<li>Ctrl+<big><big><b>&darr;</b></big></big> = Sección Siguiente</li>
		<li>Ctrl+<big><big><b>&rarr;</b></big></big> = Buscar</li>
		<li>Ctrl+<big><big><b>&larr;</b></big></big> = Mostrar Lista</li>
		<li>Ctrl+<big><big><b>&nbsp;</b></big></big><small>ENTER</small> = Guardar</li>
	</ul>
</div>

<div class="ayuda-teclas teclas-alt">
	<ul>
		<li>Alt+<big><big><b>&uarr;</b></big></big> = Registro Anterior</li>
		<li>Alt+<big><big><b>&darr;</b></big></big> = Registro Siguiente</li>
		<li>Alt+<big><big><b>&rarr;</b></big></big> = Primer Registro</li>
		<li>Alt+<big><big><b>&larr;</b></big></big> = Ultimo Registro</li>
		<li>Alt+<big><big><b>&nbsp;</b></big></big><small>ENTER</small> = Guardar</li>
	</ul>
</div>


<script type="text/javascript" language="javascript">
$(document).ready(function(){

	$('input, select, textarea').on('focus', function(){
		$(this).parent().parent().addClass('celda-seleccionada');
		$(this).select();
	});
	$('input, select, textarea').on('blur', function(){
		$(this).parent().parent().removeClass('celda-seleccionada');
	});
	$('input, select, textarea').on('keyup',function(e){
		var keyCode = e.keyCode || e.which;
	    if ( e.ctrlKey ) {
	    	$('.teclas-ctrl').fadeOut(75);
	    } else if ( e.altKey ) {
	    	$('.teclas-alt').fadeOut(75);
	    }
	});
	$('input, select, textarea').on('keydown',function(e){
	    var keyCode = e.keyCode || e.which;
	    //alert(e.keyCode);
		if ( e.shiftKey ) {
			return keyCode;
		}

	    if ( e.ctrlKey ) {
	    	$('.teclas-ctrl').fadeIn(75);
	    } else if ( e.altKey ) {
	    	$('.teclas-alt').fadeIn(75);
	    }

		if( keyCode === 13 || keyCode === 39 || keyCode === 40 || keyCode === 37 || keyCode === 38 ) {

			if ( e.altKey ) {

				e.preventDefault();
				//alert("Ctrl" + keyCode);

				switch (keyCode){
					case 13: alert('Guardar Información'); break;
					case 37: alert('Mostrar Lista'); break;
					case 38: alert('Sección Anterior'); break;
					case 39: alert('Buscar'); break;
					case 40: alert('Siguiente Sección'); break;
				}

			} else if ( e.ctrlKey ) {

				e.preventDefault();
				//alert("Ctrl" + keyCode);

				switch (keyCode){
					case 13: alert('Guardar Información'); break;
					case 37: alert('Mostrar Lista'); break;
					case 38: alert('Sección Anterior'); break;
					case 39: alert('Buscar'); break;
					case 40: alert('Siguiente Sección'); break;
				}

			} else {

			    if( keyCode === 13 || keyCode === 39 || keyCode === 40 ) {
					e.preventDefault();
					$obj = $('input, select, textarea')[$('input, select, textarea').index(this)+1];
					try {
						$obj.focus();
					} catch(e){
						//
					}
			    } else if( keyCode === 37 || keyCode === 38 ) {
					e.preventDefault();
					$obj = $('input, select, textarea')[$('input, select, textarea').index(this)-1];
					try {
						$obj.focus();
					} catch(e){
						//
					}
			    }
			}
		}
	});
	$('input:first').focus();
});
</script>










<?php /**
	HASTA AQUI LLEGA EL CONTENIDO EXCLUSIVO DE ESTA VISTA ... jjy
**/?>
<?php 
	$this->load->view('pie_comun_modulo_v') 
	// finaliza los bloques </body> y </head> ... ..jy 
?>