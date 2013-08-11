<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelo_base_m extends CI_Model {

    function __construct(){
         parent::__construct();
    }
    
    public function metodo_demo ( $parametros = array() ){
    	//parametros esperados y sus valores por omisión ... jjy
    	$var1 = '';
    	$var2 = 0;
    	//se extraen los parametros recibidos ... jjy
    	extract ( $parametros ); // esto reemplaza los valores por omisión en los parámetros recibidos con mismo nombre ... jjy
    	//se validan los parámetros recibidos y se ajustan para evitar errores ... jjy
    	$var2 = (integer) $var2; // ej, para asegurarse que var2 sea entero! ... jjy
    	//se define la variable o estructura de retorno del método ... jjy
    	$salida = '';

    	// inicia el código del método ... jjy

    	// se definen los parámetros del ActiveRecord ... !
     	$this->db->select  ( '*' );
		$this->db->from    ( 'esquema.tabla' );
		$this->db->where   ( 'campo', $condicion || false );
		
	    $rs 	= $this->db->get(); // se ejecuta la extracción de datos ... jjy
	    $datos 	= $rs->result(); 	// se extraen los resultados ... jjy

	    $salida = $datos; // se prepara la salida
	    
	    return $salida; // se retorna el valor o estructura sólo al final ... jjy
    }

}