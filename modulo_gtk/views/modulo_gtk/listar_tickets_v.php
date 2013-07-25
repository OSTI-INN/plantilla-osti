<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/estilo.css">

	<style type="text/css">
		div.boton_accion{
			border: 1px solid #ddd !important;
			border-radius: 3px;
			width: 30px;
			height: 18px;
			background-image:url(<?=base_url()?>/imgs/acciones.png);
	  		background-repeat: no-repeat no-repeat;
	  		display: inline-block;
		}
		
		div#boton_guardar  { background-position:50% -18px;  }
		div#boton_inicio   { background-position:50% -391px; }
		div#boton_limpiar  { background-position:50% -194px; }
		div#boton_adjuntar { background-position:50% -256px; } 

		ul.tabs{
			list-style-type: none;
		}
		ul.tabs li{
			display: inline-block;
			border: 1px solid #ddd !important;
			padding: 5px;
		}
	</style>
</head>

<body>
	<h2 class = "titulo-seccion">Listar Tickets</h2>
	<hr>

	<a href='<?=site_url()?>/..' target = "_top"
	   title="Inicio"
	><div class="boton_accion" id="boton_inicio" name="boton_inicio"></div></a>

	<a  href='javascript:void(0);' 
		title="Guardar" 
		onclick="javascript:enviar();"
	><div class="boton_accion" id="boton_guardar" name="boton_guardar"></div></a>

	<a href='javascript:void(0);' 
	   title="Limpiar" 
	   onclick="javascript:limpiar();"
	><div class="boton_accion" id="boton_limpiar" name="boton_limpiar"></div></a>
	
	<a href='javascript:void(0);'
	   title="Adjuntar"
	   onclick="javascript:alert('Adjuntar');"
	><div class="boton_accion" id="boton_adjuntar" name="boton_adjuntar"></div></a>
		
	<hr>

	<?php

		$columnas = array(
			'codigo_ticket' =>'Código',
			'asunto_ticket' =>'Asunto',
			'descripcion_ticket' => 'Fecha',
		);
		$campos = array(
			'codigo_ticket' => "<a href='javascript:alert(\"mostrar ticket {@valor}\");'>{@valor}</a>",
			'asunto_ticket',
			'descripcion_ticket',
		);
		$datos = $tickets;

		$parametros = array (
			'codigo_tabla'		=>'', //$info_tabla['codigo_tabla'],
			'campos' 			=> $campos,
			'columnas'			=> $columnas, //visibles en grid .. jjy
			'funcion_guardar' 	=> 'guardar_cambios', //para js
			'editable'			=> false,
			'nuevo_registro'	=> false, //true,
		);
	?>
	<?=simple_html_grid('lista_tickets', $datos, $parametros) ?>

	<?php
		//prp($tickets);
	?>

	<?php /* <table width = "100%">
		<tr>
			<th class = "alinear-izquierda">
				TÍTULO
			</th>
			<th class = "alinear-izquierda">
				ASUNTO	
			</th>
		</tr>
		<?php foreach($tickets as $registro) { ?>

			<tr>
			<td>
				<?=$registro['asunto_ticket']?>
			</td>	
			<td>
				<?=$registro['descripcion_ticket']?>
			</td>
			</tr>
			
		<?php } ?>
	<?php */ ?>
	</table>
</body>
</html>