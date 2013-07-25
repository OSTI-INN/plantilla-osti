
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/estilo.css">

	<style>

	</style>
</head>

<body>
	<h2 class = "titulo-seccion">Listar Tickets</h2>
	<hr>
	<?php
		prp($tickets);

		$campos = array(
			'titulo_ticket',
			'descripcion_ticket',
		);
		$columnas = array(
			'titulo'	=>'Título',
			'asunto'	=>'Asunto',
		);

		$datos = $tickets;

		$parametros = array (
			'codigo_tabla'		=>'', //$info_tabla['codigo_tabla'],
			'campos' 			=> $campos,
			'columnas'			=> $columnas, //visibles en grid .. jjy
			//'funcion_guardar' 	=> 'guardar_cambios', //para js
			'editable'			=> false,
			'nuevo_registro'	=> false, //true,
		);

	?>
	<?=simple_html_grid('', $datos, $parametros) ?>


	<table width = "100%">
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
	</table>
</body>
</html>