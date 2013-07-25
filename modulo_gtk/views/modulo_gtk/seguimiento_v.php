<!DOCTYPE html>
<html>
	<head>
	<meta charset='UTF-8'>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/estilo.css">
	<center><h1> SEGUIMIENTO DE MIS TICKETS</h1><br><br></center>
	
<form class="formulario" action="ticket" method="post" enctype="text/plain">

		<input type="submit" value="" name="enviar" id="guardar" title="Guardar"><input type="submit" value="" name="enviar" id="anexar" title="Anexar"><br><br>
		<label>Categoría: <input type="text" name="asunto" size="40" maxlength="100"> </label>
<br>
<br>
		<label>Sub categoría: <input type="text" name="asunto" size="40" maxlength="100"> </label>
</select>
<br><br>
		Asunto: <input type="text" name="asunto" size="40" maxlength="100">
<br><br>
		Descripción: <br><br>
		<textarea name="descripcion" rows="10" cols="40">Agregue aquí una descripción...</textarea>
<br><br>
		Prioridad: <select>
		  <option>Seleccione Prioridad</option>
		  <option>Alta</option>
		  <option>Normal</option>
		  <option>Baja</option>
<br><br>
		<input type="checkbox" name="copia_correo" >Recibir copia al correo<br>

</form>
