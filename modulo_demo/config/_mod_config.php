<?php

/* ****************************************************
| Datos sobre la aplicación ...
|
/* ****************************************************/
global $config;
$config['modulo']=array(
	'id'              => 'modulo_base',	
	'nombre_completo' => 'Aquí se debe colocar el nombre completo del modulo',
	'nombre_corto'    => 'NombreCortoMod',
	'descripcion'     => 'En esta variable de configuración debe indicarse o definirse la descripción del módulo, si fuera el caso de que no existe la información en la base de datos.',
	'version_mayor'   => 'N',
	'version_menor'   => 'n',
);

/**
  Esta variable fue mudada acá desde config.php -- para automatizar su definición en base a otra variable de configuración ... jjy
**/
$config['index_page'] = $config['modulo']['id'].'.php';

?>