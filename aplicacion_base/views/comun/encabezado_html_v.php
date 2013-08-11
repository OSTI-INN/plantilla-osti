<?php global $config; ?>
<?php if ( ! isset($config['sesion']['iniciada'] ) ){
		/**
			ADAPTAR A UN PROCESO DE AUTENTICACION Y LOGIN verdadero .. jjy !!!
		**/
		if ( isset($_POST['btnAcceder'] ) ){
			$config['sesion']['iniciada']=true;;
			$sesion_iniciada=true;
		} else {
			$sesion_iniciada=false;
		}

} else {
	/**
		ADAPTAR A UN PROCESO DE AUTENTICACION Y LOGIN verdadero .. jjy !!!
	**/
	$sesion_iniciada=true;
} 
/**
	ADAPTAR A UN PROCESO DE AUTENTICACION Y LOGIN verdadero .. jjy !!!
**/
$sesion_iniciada=true; //fijo para poder avanzar ! ... jjy
?>
<?php 
	if(!isset($config['sesion']['seccion_activa'])){
		$config['sesion']['seccion_activa'] = "inicio";
	}
	$seccion_activa = $config['sesion']['seccion_activa'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>

	<title><?=$config['aplicacion']['nombre_corto']?> - <?=$pestanas[$seccion_activa]?></title>
	<link rel="stylesheet" type="text/css" href="<?=base_url().'css/estilos.css'?>">

	<script src="<?=base_url()?>libs/jquery/jquery.min.js"></script>

</head>

<body>

<?php if ( $config['aplicacion']['mostrar_encabezado_gobierno'] ) { ?>
  	<style>
	  	.contenedor-principal{top: 140px;}
	  	.contenedor-encabezado{top: 50px;}
  	</style>
	<div class="encabezado_gobierno">
		<div class="logo_gobierno seguido"></div>
		<div class="logo_especial seguido"></div>
	</div>	

<?php } ?>

<div class="contenedor-encabezado">

		<div class="cintillo-sup">

			<div class="centrado ancho-maximo">

				<div class="titulo-cintillo flotado-izquierda"><?=$config['aplicacion']['nombre_corto']?> - beta <?=$config['aplicacion']['version_mayor']?>.<?=$config['aplicacion']['version_menor']?></div>
				<div class="flotado-derecha">
					<div style="display:inline-block"><a href="<?=site_url()?>">Inicio</a></div>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<div style="display:inline-block"><a href="#">Cerrar sesi&oacute;n</a></div>
				</div>

			</div>

		</div>

		<nav>

			<div class="barra-botones">

				<ul class="botones-barra">
					
					<?php
						$parametros['pestanas']          = $pestanas;
						$parametros['enlaces']           = $url_enlaces;
						$parametros['clases-pestanas']   = "seguido"; // ancho-120
						$parametros['estilo-pestanas']   = "font-size: 1em; min-width:100px;";
						$parametros['id_pestana_activa'] = $seccion_activa;
					?>
					<?=html_pestanas('',$parametros)?>

				</ul>

			</div>

		</nav>

	</div>

	<div class="contenedor-principal">
