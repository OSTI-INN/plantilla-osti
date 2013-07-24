<html>
	<head>
	<meta charset='UTF-8'>
	</head>
<table border="1">
		<tr>
		<td>
		TÍTULO
		</td>
		<td>
		ASUNTO	
		</td>
		</tr>
		<?php foreach($tickets as $registro) {?>
			<tr>
			<td>
				<?=$registro['asunto_ticket']?>
			</td>	
			<td>
				<?=$registro['descripcion_ticket']?>
			
			</td>
			</tr>
			
		<?php
		}
		?>
</table>
