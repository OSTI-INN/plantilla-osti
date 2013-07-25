<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class S extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
		$this->listar_tickets();
    }  

	public function ticket(){
		redirect(site_url().'/modulo_gtk/ticket_c', 'location');
	}

	public function listar_tickets(){
		redirect(site_url().'/modulo_gtk/ticket_c/listar_tickets', 'location');
	}
}
