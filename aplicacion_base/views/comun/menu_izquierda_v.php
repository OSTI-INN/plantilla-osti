<div class="panel-1 ancho-150 flotado-izquierda fijo">
	<ul class="menu-izquierda">

	<?php switch ($seccion) { 

		case "inicio": ?>

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
		
		<?php break; ?>

		<?php case "modulo_bdc": ?>

			<?php $this->load->view('../../modulo_bdc/views/menu_izquierda_v'); ?>

		<?php break; ?>

		<?php case "modulo_gtk": ?>

			<?php $this->load->view('../../modulo_gtk/views/menu_izquierda_v'); ?>

		<?php break; ?>

	<?php } ?>
	</ul>
</div>