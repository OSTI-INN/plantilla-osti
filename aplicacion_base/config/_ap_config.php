<?php

/* ****************************************************
| Datos sobre la aplicación ...
|
/* ****************************************************/
global $config;
$config['aplicacion']=array(
	'id'              => 'id_sistema',
	'nombre_completo' => 'Aquí se debe colocar el nombre completo del sistema',
	'nombre_corto'    => 'NombreCorto',
	'version_mayor'   => 'N',
	'version_menor'   => 'n',

  'mostrar_encabezado_gobierno' => TRUE,

  'descripcion'     => 'En esta variable de configuración debe indicarse o definirse la descripción del sistema, si fuera el caso de que no existe la información en la base de datos.',
  'mostrar_logo'    => TRUE,
  'mostrar_titulo'  => TRUE,
  'mostrar_portada' => TRUE,

);
// LO NUEVO en la versión 0.1  
//---------------
// CAMBIOS MAYORES ...
// ..... TODOS :-) .. jjy
//----------------
// CAMBIOS menores
// ------------------
$config['sesion']=array(
  'usuario' => ''
);

?>