<?php 
	$this->load->view('encabezado_comun_modulo_v') 
	// continual en el bloque <head> ... ..jy ?>
<?php /**
	A PARTIR DE AQUI INICIA EL CONTENIDO EXCLUSIVO DE ESTA VISTA ... jjy 
**/?>

	<script type="text/javascript">
		// algun código aqui ..... jjy
	</script>

</head>
<?php //************************************* </head><body> ********************************* ?>
<body>

	<h2 class = "titulo-seccion">T&iacute;tulo</h2>
	<hr>
		<?php
			$parametros = array(
							'enlace'		 => site_url().'',
							'destino'		 => '_self',
							'tipo'           => 'boton_icono',
							'icono'          => 'icono_inicio',
							'tooltip'        => 'Ir al Inicio',
							//'posicion_icono' => '-48px 0',
						);
		?>
		<?=html_enlace_boton( 'bt_buscar', $parametros )?>

		<?php
			$parametros = array(
							'enlace'		 => '#',
							'destino'		 => '_self',
							'tipo'           => 'boton_icono',
							'icono'          => 'glyph_buscar',
							'posicion_icono' => '-48px 0',
							'tooltip'		 => 'Buscar'
						);
		?>
		<?=html_enlace_boton( 'bt_buscar', $parametros )?>
		
	<hr>
	<div>
		Aquí debe ir el código principal de la vista
	</div>




















<?php /**
	HASTA AQUI LLEGA EL CONTENIDO EXCLUSIVO DE ESTA VISTA ... jjy
**/?>
<?php 
	$this->load->view('pie_comun_modulo_v') 
	// finaliza los bloques </body> y </head> ... ..jy 
?>