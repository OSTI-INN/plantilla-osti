<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class S extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
   
	public function index(){
		//redirect(site_url().'/modulo_bdc/pregunta_c', 'location');
		$this->consultar_articulos(); 
	}

	public function articulo(){
		redirect(site_url().'/modulo_bdc/articulo_c', 'location');
	}

	public function respuesta(){
		redirect(site_url().'/modulo_bdc/respuesta_c', 'location');
	}	
	
	public function consultar_articulos () {
		redirect(site_url().'/modulo_bdc/articulo_c/consultar_articulos', 'location');
	}	
}