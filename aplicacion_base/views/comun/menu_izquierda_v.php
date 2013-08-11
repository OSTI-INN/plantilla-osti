<?php
global $menus_izquierda_activos; // definicion de menús de la izquierda  .... jjy
if ( array_key_exists( $seccion, $menus_izquierda_activos ) ) {
	$tipo_menu = 'menu-izquierda';
	$estilo_menu = "panel-1 ancho-minimo-150 ancho-menu-izquierdo flotado-izquierda fijo";
	if ( isset( $menus_izquierda_activos [$seccion][0] ) ){
		$tipo_menu = $menus_izquierda_activos [$seccion][0];
		$estilo_menu = $tipo_menu;
	}
/** 
SOLO CONTINUA ADELANTE GENERANDO EL MENU, SI LA SECCION HA SIDO DEFINIDA ARRIBA ... jjy
**/
?>

<div class="<?=$estilo_menu?>">
	
	<ul class="<?=$tipo_menu?>">

	<?php switch ($seccion) {
	 
	 	case "modulo_bdc": ?>

			<?php $this->load->view('../../modulo_bdc/views/menu_izquierda_v'); ?>

		<?php break; ?>

		<?php case "modulo_gtk": ?>

			<?php $this->load->view('../../modulo_gtk/views/menu_izquierda_v'); ?>

		<?php break; ?>

		<?php case "modulo_imc": ?>

			<?php $this->load->view('../../modulo_imc/views/menu_izquierda_v'); ?>

		<?php break; ?>

		<?php case "modulo_base": ?>

			<?php $this->load->view('../../modulo_base/views/menu_izquierda_v'); ?>

		<?php break; ?>

		<?php case "modulo_formulario": ?>

			<?php $this->load->view('../../modulo_formulario/views/menu_izquierda_v'); ?>

		<?php break; ?>

		<?php /*case "inicio": ?>

				<li class="activo">Iniciar Sesión</li>
				<hr>
				<li>

					<form method="post" action="" class="formulario alinear-centro" style="margin:0;">
						<label><div class="alinear-centro centrado ancho-100">Usuario </div></label>
						<input type="text" class="ancho-100" value="admin">
						<br>
						<label><div class="alinear-centro centrado ancho-100">Contraseña </div></label>
						<input type="password" class="ancho-100" value="123123123123">
					</form>

				</li>
				<hr>
				<li>
					<input type="submit" name="btnAcceder" id="btnAcceder" class="" value="Acceder"/>
				</li>					
		
		<?php break; */ ?>

	<?php } ?>
	</ul>
</div>

<?php } /**
	FIN MENU
**/ ?>