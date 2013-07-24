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
				background-image:url(http://172.30.0.83/mantis%28BETA%29/imgs/acciones.png); 
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
	<script type="text/javascript">
		
		function enviar(){
			document.formulario.submit();

		}

		function limpiar(){
			document.formulario.reset();

		}
		
		</script>
</head>

<body>
	<center><h1> GENERAR TICKET</h1><br><br></center>
	<form class="formulario" id="formulario" name="formulario" action="<?=site_url()?>/modulo_gtk/ticket_c/insertar_ticket" method="post">
	

		<hr width="100%">
			<div class="ancho-120 seguido"></div>
			<a href='<?=site_url()?>/..'
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
				
			<hr width="100%">
		<label class="ancho-120 seguido alinear-derecha">Categorías:</label>
		    <select class="ancho-200" width="50%" id="codigo_categoria" name="codigo_categoria">
		        <option selected value="">Seleccione Categoría</option>
			<?php foreach($categoria as $registro) {?>
			<option value="<?=$registro['codigo_categoria']?>"><?=$registro['descripcion_categoria']?></option>
		        <?php }?>
		    </select>
<br>
		<label class="ancho-120 seguido alinear-derecha">Sub Categorías:</label>	
		<select class="ancho-200" width="50%" id="codigo_categoria_padre" name="codigo_categoria_padre">
		  <option value="01">Seleccione Sub Categoría</option>
		 <?php foreach($sub_categoria as $registro) {?>
			<option value="<?=$registro['codigo_categoria']?>"><?=$registro['descripcion_categoria']?></option>
		        <?php }?>
</select>
<br>
		<label class="ancho-120 seguido alinear-derecha">Asunto: </label> <input type="text" class="ancho-400" name="asunto_ticket" id="asunto_ticket" size="40" maxlength="100">
<br>
		<label class="ancho-120 seguido alinear-derecha alinear-arriba">Descripción:</label>
		<textarea name="descripcion_ticket" id="descripcion_ticket" rows="5" class="ancho-400" onClick='descripcion_ticket.value=""'>Agregue aquí una descripción...</textarea>
<br>
		<label class="ancho-120 seguido alinear-derecha">Prioridad:</label>
		<select class="ancho-200" width="50%" id="codigo_prioridad" name="codigo_prioridad">
		  <option>Seleccione Prioridad</option>
		  <option value="01">Alta</option>
		  <option value="02">Normal</option>
		  <option value="03">Baja</option>
</select>
<br>
	<!-- <input type="checkbox" name="copia_correo" >Recibir copia al correo<br>-->


</form>
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
</body>
</html>

