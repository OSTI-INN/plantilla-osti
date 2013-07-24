<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguimiento_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	public function index(){
		$vars=array(
		'categoria'=> 'SISCOD',
		'asunto' => 'SISCOD',
		'usuario' => array(
			'id_usuario' => 'jmunoz',
			'nombre_usuario' => 'Jessica',
			),
		);
		$this->load->view('modulo_gtk/seguimiento_v', $vars);
	}
}
