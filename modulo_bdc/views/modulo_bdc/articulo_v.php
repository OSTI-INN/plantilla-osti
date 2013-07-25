<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>BDC</title>
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/estilo.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>/modulo_bdc/css/estilos_bdc.css">
		
		<style>
			div.boton_accion {
				background-image:url(<?=base_url()?>/imgs/acciones.png);
			} 
		</style>

		<script type="text/javascript">
		
		function enviar(){
			document.formulario.submit();
		}

		function limpiar(){
			document.formulario.reset();
		}

		function seleccionar_tab(id_tab){

			document.getElementById('tab_pregunta').setAttribute("class", "invisible");
			document.getElementById('tab_respuesta').setAttribute("class", "invisible");
			
			switch(id_tab){
				case 'tab_pregunta':
				document.getElementById('tab_pregunta').setAttribute("class", "visible");
				break;
				case 'tab_respuesta':
				document.getElementById('tab_respuesta').setAttribute("class", "visible");
				break;

			}
		}
		</script>
	</head>
	<body>
		<h2 class="titulo-seccion seguido">
			Dudas Frecuentes
		</h2>
		<hr>
		
		<form class="formulario sin-margenes" name="formulario" id="formulario"  action="<?=site_url()?>/modulo_bdc/articulo_c/insertar_articulo" method="post" >

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

			<label class="ancho-120 seguido alinear-derecha">Categorias:</label>
            <select class="ancho-200" width="50%" id="categoria" name="categoria">
                <option selected value="">Seleccione Categoría</option>
                <?php 
				foreach ($categorias as $registro) {
				?>	
				
					<option value="<?=$registro['codigo_categoria']?>"><?=$registro['descripcion_categoria']?></option>
				
				<?php	
				}
		 		?>
            </select>
			<br/>

			<label class="ancho-120 seguido alinear-derecha">Sub-Categorías:</label>
            <select class="ancho-200" width="50%" id="subcategoria" name="subcategoria">
            	<option selected value="">Seleccione Subcategoría</option>

                <?php foreach ($subcategorias as $registro) { ?>	
				
					<option value="<?=$registro['codigo_categoria']?>"><?=$registro['descripcion_categoria']?></option>
				
				<?php } ?>
				
            </select>
			<br/>

			<label class="ancho-120 seguido alinear-derecha">Título:</label> <input class="ancho-400" type="text" name="titulo" id="titulo" size="15" maxlength="50">
			<br/>

			<?php 
				$parametros ['pestanas'] = array (
					"tab_pregunta" 	=> "Pregunta",
					"tab_respuesta" => "Respuesta",
				);
			?>

			<?=html_pestanas('',$parametros)?>


			<ul class="tabs">
				<li>
					<a href="javascript:void(0);" onclick="javascript:seleccionar_tab('tab_pregunta')" >Pregunta</a>
				</li>	
				<li>
					<a href="javascript:void(0);" onclick="javascript:seleccionar_tab('tab_respuesta')">Respuesta</a>
				</li>
			</ul>
			<div id="tab_pregunta" name="tab_pregunta">
				<label class="ancho-120 seguido alinear-derecha alinear-arriba">Pregunta:</label>
				<textarea class="ancho-400" cols="40" rows="5" name="pregunta" id="pregunta">Escriba aquí...</textarea>
				<br/>
			</div>

			<div class="invisible" id="tab_respuesta" name="tab_respuesta">
				<label class="ancho-120 seguido alinear-derecha alinear-arriba">Respuesta:</label>
				<textarea class="ancho-400" cols="40" rows="5" name="respuesta" id="respuesta">Escriba aquí...</textarea>
				<br/>
			</div>

			<label class="ancho-120 seguido alinear-derecha">Palabras claves:</label> <input class="ancho-200" type="text" name="palabras_claves" id="palabras_claves" size="15" maxlength="50">
			<?php /**
			NIVEL PRIVACIDAD
			<label class="ancho-80 seguido alinear-derecha">Privacidad:</label>
			<select class="ancho-120" width="50%" id="privacidad" name="privacidad">
                <option selected value="">Seleccione privacidad</option>
                <option value="1">Usuarios</option>
                <option value="2">Soporte</option>
                <option value="3">Sistemas</option>
                <option value="4">Redes</option>
            </select>
			**/?>
		</form>
		<a href='<?=base_url()?>modulo_bdc.php'>Controlador Respuesta</a>
		
	</body>
</html>