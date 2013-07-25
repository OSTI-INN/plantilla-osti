<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket_m extends CI_Model {

    function __construct(){
         parent::__construct();
    }
    
    public function insertar_ticket($id , $datos = array() ){
	    $insertar = $this->db->insert('modulo_gtk.t_tickets', $datos);
        return $insertar;
    }
	 public function listar_tickets(){
	 	$salida = array();

	    $this->db->select('*');
	    $this->db->from('modulo_gtk.t_tickets');
	    
	    $rs = $this->db->get();
	    
	    $salida = $rs->result_array();
        return $salida;
    }

	 public function listar_categoria(){
		$this->db->select('codigo_categoria, descripcion_categoria');
		$this->db->from('comun.t_categorias');
		$this->db->where('codigo_categoria_padre', '');
		
	    $listar = $this->db->get();
	    $listar = $listar->result_array();
        return $listar;
    }

	public function listar_sub_categoria(){
	    $this->db->select('codigo_categoria, descripcion_categoria');
	    $this->db->from('comun.t_categorias');
	    $this->db->where('codigo_categoria_padre !=', '');
		
	    $listar = $this->db->get();
	    $listar = $listar->result_array();
        return $listar;
    }
	
}


