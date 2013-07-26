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
		<h2 class = "titulo-seccion">Dudas Frecuentes</h2>
		<hr>
			<a href='<?=site_url()?>/modulo_bdc/articulo_c/consultar_articulos'  title="DUF"
			><div class="boton_accion" id="boton_inicio" name="boton_inicio"></div></a>
			
			<a href='javascript:void(0);' 
			   title="Limpiar" 
			   onclick="javascript:limpiar();"
			><div class="boton_accion" id="boton_limpiar" name="boton_limpiar"></div></a>
		<hr>
		<h2><?=$articulo['titulo']?></h2>
		<hr width="100%">
		<p>
			<?=$articulo['descripcion_respuesta']?>

		</p>
		<hr>
		<label>Clasificacíon:<label>
		<br>
		<input type="radio" name="clasicicacion" id="clasificacion" value="1">Malo
		<br>
		<input type="radio" name="clasicicacion" id="clasificacion" value="2">Bueno
		<br>
		<input type="radio" name="clasicicacion" id="clasificacion" value="3">Muy Bueno
		<br>
		<A HREF='<?=site_url()?>/s/respuesta'>Controlador Respuesta</A>
	</body>
</html>