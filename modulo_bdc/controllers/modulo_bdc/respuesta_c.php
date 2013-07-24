<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Respuesta_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	
	public function index(){
		$this->load->view("modulo_bdc/respuesta_v");
	}

	public function mostrar_respuesta(){
		$this->load->view("modulo_bdc/mostrar_respuesta_v");
	}

}