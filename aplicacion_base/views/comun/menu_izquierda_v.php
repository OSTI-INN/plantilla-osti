<div class="panel-1 ancho-150 flotado-izquierda fijo">
	<ul class="menu-izquierda">

	<?php switch ($seccion) { 

		case "inicio": ?>

				<li class="activo" >Iniciar Sesión</li>
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

		<?php case "recetas": ?>

				<li class="activo" ><a href="<?=site_url().'/s/recetas'?>">Recetas</a></li>
				<hr>
				<li><a href="#">Por Categorias</a></li>
				<ul>
					<li><a href="#">Entradas</a></li>
					<li><a href="#">Plato principal</a></li>
					<li><a href="#">Sopas</a></li>
					<li><a href="#">Postres</a></li>
				</ul>

		<?php break; ?>
		
		<?php case "programas": ?>

				<li class="activo" ><a href="#">Programas</a></li>
				<hr>
				<li><a href="#">Organizar por</a></li>
				<ul>
					<li><a href="#">Fecha</a></li>
					<li><a href="#">Código de CD</a></li>
					<li><a href="#">Cocinero Adulto</a></li>
					<li><a href="#">Cocinerito</a></li>
				</ul>

		<?php break; ?>

		<?php case "tablas": ?>

				<li class="activo"><a href="<?=site_url().'/s/tablas'?>">Tablas</a></li>
				<hr>
				<li class="activo"><a href="<?=site_url().'/s/tablas'?>">Principales</a></li>
				<ul>
					<li><a href="<?=site_url().'/s/tablas'?>">Ingredientes</a></li>
					<li><a href="<?=site_url().'/s/tablas'?>">Implementos</a></li>
					<li><a href="<?=site_url().'/s/tablas'?>">Equipos</a></li>
					<li><a href="<?=site_url().'/s/tablas'?>">Nutri Tips</a></li>
					<li><a href="<?=site_url().'/s/tablas'?>">Productos</a></li>
					<li><a href="<?=site_url().'/s/tablas'?>">Trivias</a></li>
				</ul>
				<hr>
				<li class="activo"><a href="<?=site_url().'/s/tablas'?>">Tablas de Apoyo</a></li>
				<ul>
					<li><a href="<?=site_url().'/s/tablas/t/n'?>">Nueva Tabla</a></li>
				</ul>


		<?php break; ?>

		<?php case "tablas_t": ?>

				<li class="activo" >Operaciones</li>
				<hr>
				<li><a href="<?=site_url().'/s/tablas'?>">Tablas de Apoyo</a></li>
				<ul>
					<li><a href="javascript:guardar_cambios();">Guardar cambios</a></li>
					<li><a href="#">Eliminar Tabla</a></li>
				</ul>

		<?php break; ?>

		<?php case "inicio": ?>

				<li class="activo" >Iniciar Sesión</li>
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


		<?php case "personas": ?>

				<li class="activo" ><a href="#">Personas</a></li>
				<hr>
				<li><a href="#">Personas</a></li>
				<ul>
					<li><a href="#">Nueva</a></li>
					<li><a href="#">Buscar</a></li>
					<li><a href="#">Consultar</a></li>
				</ul>
				<hr>
				<li><a href="#">Cocineros Adultos</a></li>

				<li><a href="#">Cocineritos</a></li>

		<?php break; ?>

		<? case "administracion": ?>

				<li class="activo" ><a href="#">Administraci&oacute;n</a></li>
				<hr>
				<li><a href="#">Usuarios</a></li>
				<hr>
				<li class="activo" ><a href="#">Configuraciones</a></li>
				<ul>
					<li><a href="#">Preferencias</a></li>
					<li><a href="#">Apariencia</a></li>
				</ul>

		<?php break; ?>
	<?php } ?>
	</ul>
</div>