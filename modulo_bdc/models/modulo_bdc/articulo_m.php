<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulo_m extends CI_Model {

    function __construct(){
         parent::__construct();
    }
    
    public function insertar_articulo($id , $parametros = array() ){
	    $salida = '';
		$registro = $this->db->insert('modulo_bdc.t_articulos', $parametros);
	    
	    if (  $registro == 1 ){
	    	$id              = $this->db->insert_id();
	    	$id_cadena       = ( string ) $id;
	    	$codigo_articulo = str_repeat('0',3 - strlen( $id_cadena ) ).$id_cadena;
	    	//echo $codigo_articulo; 
	    	$codigo_articulo = $parametros['codigo_categoria'].$codigo_articulo;
	    	$data = array(
               'codigo_articulo' => $codigo_articulo,
            );

			$this->db->where('id', $id);
			$this->db->update('modulo_bdc.t_articulos', $data);



	    }
	    return $salida;

    }

	
    public function listar_categorias(){
     	$this->db->select('codigo_categoria, codigo_categoria_padre, descripcion_categoria');
		$this->db->from('comun.t_categorias');
		$this->db->where('codigo_categoria_padre', ''); 
	    $datos = $this->db->get();
	    $datos = $datos->result_array();
	    return $datos;
    }

     public function listar_subcategorias(){
     	$this->db->select('codigo_categoria, codigo_categoria_padre, descripcion_categoria');
		$this->db->from('comun.t_categorias');
		$this->db->where('codigo_categoria_padre !=', ''); 
	    $datos = $this->db->get();
	    $datos = $datos->result_array();
	    return $datos;
    }

    public function listar_respuestas( $id, $parametros = array() ){

    	echo '<pre>',print_r($parametros),'</pre>';

    }
}