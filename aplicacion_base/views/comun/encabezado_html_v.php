<?php global $config; ?>
<?php if(!isset($config['sesion']['iniciada'])){

		if(isset($_POST['btnAcceder'])){
			$config['sesion']['iniciada']=true;;
			$sesion_iniciada=true;
		} else {
			$sesion_iniciada=false;
		}

} else {

	$sesion_iniciada=true;

} 
$sesion_iniciada=true; //fijo para poder avanzar ! ... jjy
?>
<?php 
	if(!isset($config['sesion']['seccion_activa'])){
		$config['sesion']['seccion_activa']="inicio";
	}
	$seccion_activa=$config['sesion']['seccion_activa'];
	foreach($tabs as $seccion => $titulo){
		eval('$tab_'.$seccion.' = "";');
	}
	eval('$tab_'.$seccion_activa.' = "activo";');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title><?=$config['aplicacion']['nombre_corto']?> - <?=$tabs[$seccion_activa]?></title>

	<link rel="stylesheet" type="text/css" href="<?=base_url().'css/estilo.css'?>">
	<script src="<?=base_url()?>libs/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>libs/zebra-datepicker/js/zebra_datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>libs/zebra-datepicker/css/bootstrap.css">	
	<?php /* en revision ---- jjy
	<script>
		$(document).ready(function(){
			$('.barra-botones').css({
				"background":"url(<?=base_url()?>/imgs/fondo-<?=(ceil(mt_rand(1,10)))?>.jpg)",
				"background-position":"center center",
				"background-size":"150px auto"
			});
		});
	</script>
	*/?> 
</head>
<body>
	<div class="cintillo-sup">
		<div class="centrado ancho-800">
			<div class="flotado-izquierda negrita"><?=$config['aplicacion']['nombre_corto']?> - beta <?=$config['aplicacion']['version_mayor']?>.<?=$config['aplicacion']['version_menor']?></div>
			<div class="flotado-derecha">
				<div style="display:inline-block"><a href="<?=site_url()?>">Inicio</a></div>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<div style="display:inline-block"><a href="#">Cerrar sesi&oacute;n</a></div>
			</div>
		</div>
	</div>
	<div class="barra-botones">
		<ul class="botones-barra">
			
			<?php $mensaje = "Probando"; ?>

			<?php
				$parametros['pestanas']			= $tabs;
				$parametros['enlaces'] 			= $url_enlaces;
				$parametros['clases-pestanas']	= "seguido"; // ancho-120
				$parametros['estilo-pestanas']	= "font-size: 1em; min-width:120px;";
				$parametros['id_pestana_activa']	= $seccion_activa;
			?>
			<?=html_pestanas('',$parametros)?>

		</ul>
	</div>
	<div class="ancho-800" style="height:85px;"></div>
	<div class="centrado ancho-800">