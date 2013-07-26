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
		
		function enviar(id){
			document.formulario.submit();
			//listar(id);
		}
		function limpiar(){
			document.formulario.reset();
		}
		function listar(id){
			switch(id){
				case 'boton_buscar':
				document.getElementById('lista').setAttribute("class", "visible");
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
		<?php /* <form class="formulario" id="formulario" name="formulario" action="<?=site_url()?>/modulo_bdc/articulo_c/listar_respuestas" method="post"> */ ?>

			<a href='<?=site_url()?>/..' target = "_top"
			   title="Inicio"
			><div class="boton_accion" id="boton_inicio" name="boton_inicio"></div></a>
			
			<a href='javascript:void(0);' 
			   title="Limpiar" 
			   onclick="javascript:limpiar();"
			><div class="boton_accion" id="boton_limpiar" name="boton_limpiar"></div></a>
			
			<a href='javascript:void(0);'
			   title="Adjuntar"
			   onclick="javascript:alert('Adjuntar');"
			><div class="boton_accion" id="boton_adjuntar" name="boton_adjuntar"></div></a>
				
			<hr>
			<form class="formulario" id="formulario" name="formulario" action="<?=site_url()?>/modulo_bdc/articulo_c/listar_respuestas" method="post"> 
				<label class="ancho-100 seguido alinear-derecha">Quiero saber ...&nbsp;</label>
				<input type="text" class="ancho-400" id="busqueda" name="busqueda">
				<a  href='javascript:void(0);' 
					title="Buscar" 
					onclick="javascript:enviar('boton_buscar');"
				><div class="boton_accion" id="boton_buscar" name="boton_buscar"></div></a>
				<p>
					<div class="seguido ancho-100"></div>
					<label class = "etq_radio">Buscar en: </label>

					<?php foreach ($categorias as $categoria) { ?>
						
						<input id = "buscar_en" name = "buscar_en" value = "<?=$categoria['codigo_categoria']?>" type = "radio"> <label class = "etq_radio"><?=$categoria['descripcion_categoria']?></label>
					
					<?php } ?>

					<input checked="checked" id = "buscar_en" name = "buscar_en" value = "ta" type = "radio"> <label class = "etq_radio">Todos los art&iacute;culos</label>
				</p>
				<br />
			<?php /* </form> */ ?>
			<hr>

			<? /* .... jjy **********************
			<label class="ancho-120 seguido alinear-derecha">¿Cual es su Duda?</label> <input class="ancho-400" type="text" name="busqueda" id="busqueda" size="15" maxlength="50">
			<a  href='javascript:void(0);' 
				title="Buscar" 
				onclick="javascript:enviar('boton_buscar');"
			><div class="boton_accion" id="boton_buscar" name="boton_buscar"></div></a>
			<div class="invisible" id="lista" name="lista">
				<hr width="100%">
				<h2>Posibles dudas...</h2>
				<hr width="100%">
				<A HREF='<?=site_url()?>/modulo_bdc/respuesta_c/mostrar_respuesta'><h3 >El monitor no enciende.</h3></A>
				<p>Hola, me interesan mucho todo lo que estan preguntando... 
				</p>
			</div>
			*/?>

		</form>

		<?php 
				if(isset($articulo)){
				foreach ($articulo as $registro) {
				?>	
				
			<a href='<?=site_url()?>/modulo_bdc/articulo_c/mostrar_articulo/<?=$registro['codigo_articulo']?>'><h2><?=$registro['titulo']?></h2></a>
		
		<p>
			<?=$registro['descripcion_pregunta']?>
		</p>
		<hr>
				
				<?php	
				}
			}
		 		?>

		<table class="ancho-full">
			<tr>
				<td class="alinear-arriba">
					<h3><a href="#">Artículos recientes ...</a></h3>
					<hr>
					<p>
						Mantis ha identificado que la solución a tu duda pudiera encontrarse en alguno de los siguientes artículos de nuestra Base de Conocimientos ...
					</p>
					<ul>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
					</ul>

				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td class="alinear-arriba">
					<h3><a href="#">Consultas populares ...</a></h3>
					<hr>
					<p>
						Mantis ha identificado que la solución a tu duda pudiera encontrarse en alguno de los siguientes artículos de nuestra Base de Conocimientos ...
					</p>
					<ul>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
						<li><a href="javascript:alert('mostrar artìculo N');">¿ Cómo crear un ticket ?</a></li>
					</ul>

				</td>
			</tr>
		</table>

		<A HREF='<?=site_url()?>/s/articulo'>Controlador Pregunta</A>
	</body>
</html>
