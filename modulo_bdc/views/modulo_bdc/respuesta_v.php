<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>BDC</title>
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/estilo.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>/modulo_bdc/css/estilos_bdc.css">
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
		
		<form class="formulario" id="formulario" name="formulario" action="<?=site_url()?>/modulo_bdc/articulo_c/listar_respuestas" method="post">
			<h1>DUF</h1>
			<hr width="100%">
			<div class="ancho-120 seguido"></div>
			<a href='<?=site_url()?>/..'
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
				
			<hr width="100%">

			<label class="ancho-120 seguido alinear-derecha">¿Cual es su Duda?</label><input class="ancho-400" type="text" name="busqueda" id="busqueda" size="15" maxlength="50">
			
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
		</form>
		<A HREF='<?=site_url()?>/s/articulo'>Controlador Pregunta</A>
	</body>
</html>
